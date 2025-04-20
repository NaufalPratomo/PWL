<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use App\Models\SupplierModel;
use App\Models\SepatuModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class SepatuController extends Controller
{
    //Menampilkan halaman daftar sepatu dengan breadcrumb, informasi halaman, dan data kategori untuk filter.
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Sepatu',
            'list'  => ['Home', 'Sepatu']
        ];

        $page = (object) [
            'title' => 'Daftar sepatu yang terdaftar dalam sistem'
        ];

        $activeMenu = 'sepatu'; // set menu yang sedang aktif

        $kategori = KategoriModel::all(); //ambil data kategori untuk filter kategori

        $sepatu = SepatuModel::with(['kategori', 'supplier'])->get();

        return view('sepatu.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu, 'sepatu' => $sepatu]);
    }

    // Menyediakan data sepatu dalam format JSON untuk DataTables dengan relasi kategori dan supplier, serta filter berdasarkan kategori.
    public function list(Request $request)
    {
        $sepatu = SepatuModel::select('sepatu_id', 'kategori_id', 'sepatu_kode', 'sepatu_nama', 'harga_beli', 'harga_jual', 'supplier_id')
            ->with(['kategori', 'supplier']); // Menggunakan array untuk multiple with

        // Filter data sepatu berdasarkan kategori_id
        if ($request->kategori_id) {
            $sepatu->where('kategori_id', $request->kategori_id);
        }

        return DataTables::of($sepatu)
            // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addIndexColumn()
            ->addColumn('aksi', function ($sepatu) { // menambahkan kolom aksi
                // membuat tombol aksi untuk edit, delete, dan detail
                $btn = '<button onclick="modalAction(\'' . url('/sepatu/' . $sepatu->sepatu_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/sepatu/' . $sepatu->sepatu_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/sepatu/' . $sepatu->sepatu_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    //Menampilkan form untuk membuat data sepatu baru melalui AJAX dengan data kategori dan supplier.
    public function create_ajax()
    {
        $kategori = KategoriModel::all();
        $supplier = SupplierModel::all();

        return view('sepatu.create_ajax', [
            'kategori' => $kategori,
            'supplier' => $supplier
        ]);
    }

    //Menampilkan form untuk membuat data sepatu baru melalui AJAX dengan data kategori dan supplier.
    public function store_ajax(Request $request)
    {
        // cek apakah request berupa ajax
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'kategori_id' => 'required|integer',
                'sepatu_kode' => 'required|string|min:3|unique:m_sepatu,sepatu_kode',
                'sepatu_nama' => 'required|string|max:100',
                'harga_beli'  => 'required|integer',
                'harga_jual'  => 'required|integer',
                'supplier_id' => 'required|integer'
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

            SepatuModel::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Data sepatu berhasil disimpan'
            ]);
        }
        redirect('/');
    }

    //Menampilkan form untuk mengedit data sepatu melalui AJAX dengan data kategori dan supplier.
    public function edit_ajax(string $id)
    {
        $sepatu = SepatuModel::find($id);
        $kategori = KategoriModel::all();
        $supplier = SupplierModel::all();

        return view('sepatu.edit_ajax', [
            'sepatu' => $sepatu,
            'kategori' => $kategori,
            'supplier' => $supplier
        ]);
    }

    //Memperbarui data sepatu dari form AJAX dengan validasi.
    public function update_ajax(Request $request, $id)
    {
        // cek apakah request dari ajax
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'kategori_id' => 'required|integer',
                'sepatu_kode' => "required|string|min:3|unique:m_sepatu,sepatu_kode,{$id},sepatu_id",
                'sepatu_nama' => 'required|string|max:100',
                'harga_beli'  => 'required|integer',
                'harga_jual'  => 'required|integer',
                'supplier_id' => 'required|integer'
            ];

            // use Illuminate\Support\Facades\Validator;
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false, // respon json, true: berhasil, false: gagal
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors() // menunjukkan field mana yang error
                ]);
            }

            $check = SepatuModel::find($id);
            if ($check) {
                $check->update($request->all());
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil diupdate'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }
        return redirect('/');
    }

    //Menampilkan konfirmasi sebelum menghapus data sepatu.
    public function confirm_ajax(string $id)
    {
        $sepatu = SepatuModel::find($id);
        return view('sepatu.confirm_ajax', ['sepatu' => $sepatu]);
    }

    //Menghapus data sepatu berdasarkan ID melalui AJAX.
    public function delete_ajax(Request $request, $id)
    {
        // cek apakah request dari ajax
        if ($request->ajax() || $request->wantsJson()) {
            $sepatu = SepatuModel::find($id);
            if ($sepatu) {
                $sepatu->delete();
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil dihapus'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }
        return redirect('/');
    }

    //Menampilkan detail sepatu dalam format AJAX.
    public function show_ajax(string $id)
    {
        $sepatu = SepatuModel::find($id);

        return view('sepatu.show_ajax', [
            'sepatu' => $sepatu
        ]);
    }
}
