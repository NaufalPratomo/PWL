<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class UserController extends Controller
{
    //Menampilkan halaman daftar pengguna dengan breadcrumb, informasi halaman, dan data level untuk filter.
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar User',
            'list'  => ['Home', 'User']
        ];

        $page = (object) [
            'title' => 'Daftar user yang terdaftar dalam sistem'
        ];

        $activeMenu = 'user'; // set menu yang sedang aktif

        $level = LevelModel::all(); //ambil data level untuk filter level

        return view('user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    //Menyediakan data pengguna dalam format JSON untuk DataTables dengan relasi level dan filter berdasarkan level.
    public function list(Request $request)
    {
        $users = UserModel::select('user_id', 'username', 'nama', 'level_id')
            ->with('level');

        // Filter data user berdasarkan level_id
        if ($request->level_id) {
            $users->where('level_id', $request->level_id);
        }

        return DataTables::of($users)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($user) { // menambahkan kolom aksi
                // membuat tombol aksi untuk edit, delete, dan detail
                $btn = '<button onclick="modalAction(\'' . url('/user/' . $user->user_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/user/' . $user->user_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/user/' . $user->user_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    //Menampilkan form untuk membuat pengguna baru melalui AJAX dengan data level.
    public function create_ajax()
    {
        $level = LevelModel::select('level_id', 'level_nama')->get();

        return view('user.create_ajax')
            ->with('level', $level);
    }

    //Menyimpan data pengguna baru dari form AJAX dengan validasi.
    public function store_ajax(Request $request)
    {
        // cek apakah request berupa ajax
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'level_id' => 'required|integer',
                'username' => 'required|string|min:3|unique:m_user,username',
                'nama'     => 'required|string|max:100',
                'password' => 'required|min:6'
            ];

            // use Illuminate\Support\Facades\Validator;
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false, // response status, false: error/gagal, true: berhasil
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors(), // pesan error validasi
                ]);
            }

            UserModel::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Data user berhasil disimpan'
            ]);
        }
        redirect('/');
    }

    //Menampilkan form untuk mengedit pengguna melalui AJAX dengan data level.
    public function edit_ajax($id)
    {
        $user = UserModel::find($id);
        $level = LevelModel::select('level_id', 'level_nama')->get();
        return view('user.edit_ajax')
            ->with('user', $user)
            ->with('level', $level);
    }

    //Memperbarui data pengguna dari form AJAX dengan validasi.
    public function update_ajax(Request $request, $id)
    {
        // Cek apakah request berasal dari AJAX atau JSON
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'level_id' => 'required|integer',
                'username' => 'required|max:20|unique:m_user,username,' . $id . ',user_id',
                'nama' => 'required|max:100',
                'password' => 'nullable|min:6|max:20' // Password opsional, dengan validasi panjang
            ];

            // Validasi input dengan Validator
            $validator = Validator::make($request->all(), $rules);

            // Tanggapi jika validasi gagal
            if ($validator->fails()) {
                return response()->json([
                    'status' => false, // Status false jika validasi gagal
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors() // Menampilkan pesan error
                ]);
            }

            // Cari data user berdasarkan ID
            $user = UserModel::find($id);
            if ($user) {
                // Jika password tidak diisi, hapus dari request untuk mencegah overwrite field di database
                if (!$request->filled('password')) {
                    $request->request->remove('password');
                } else {
                    // Jika password diisi, enkripsi terlebih dahulu
                    $request->merge(['password' => bcrypt($request->password)]);
                }

                // Update data user
                $user->update($request->all());

                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil diupdate.'
                ]);
            } else {
                // Jika data user tidak ditemukan
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan.'
                ]);
            }
        }

        // Jika bukan request AJAX, redirect ke halaman utama
        return redirect('/');
    }

    //Menampilkan form konfirmasi penghapusan pengguna melalui AJAX.
    public function confirm_ajax($id)
    {
        $user = UserModel::find($id);
        return view('user.confirm_ajax')
            ->with('user', $user);
    }

    //Menghapus data pengguna berdasarkan ID melalui AJAX.
    public function delete_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $user = UserModel::find($id);
            if ($user) {
                try {
                    $user->delete();
                    return response()->json([
                        'status' => true,
                        'message' => 'Data berhasil dihapus'
                    ]);
                } catch (QueryException $e) {
                    // Cek jika kesalahan karena foreign key constraint violation
                    if ($e->getCode() == 23000) { // 23000 adalah kode error untuk integrity constraint violation
                        return response()->json([
                            'status' => false,
                            'message' => 'Data user gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini'
                        ]);
                    }
                    // Jika kesalahan lainnya
                    return response()->json([
                        'status' => false,
                        'message' => 'Gagal menghapus data: ' . $e->getMessage()
                    ]);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }
        return redirect('/');
    }

    //Menampilkan detail pengguna dalam format AJAX.
    public function show_ajax(string $id)
    {
        $user = UserModel::find($id);
        $level = LevelModel::select('level_id', 'level_nama')->get();

        return view('user.show_ajax', [
            'user' => $user,
            'level' => $level
        ]);
    }
}
