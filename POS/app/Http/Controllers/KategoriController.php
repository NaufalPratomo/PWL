<?php

namespace App\Http\Controllers;

use Database\Seeders\KategoriSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        // $data = [
        //     'Kategori_kode' => 'SNK',
        //     'Kategori_Nama' => 'Snack/Makanan Ringan',
        //     'created_at' => now(),
        // ];
        // DB::table('m_kategori')->insert($data);
        // return 'Insert data baru berhasil';

        // $row=DB::table('m_kategori')->where('Kategori_kode','SNK')->update([
        //     'Kategori_Nama' => 'Camilan'
        // ]);
        // return 'Update data berhasil, Jumlah data yang diupdate: '.$row. 'baris';

        // $row = DB::table('m_kategori')->where('Kategori_kode', 'SNK')->delete();
        // return 'Delete data berhasil, Jumlah data yang dihapus: ' . $row . 'baris';

        $data = DB::table('m_kategori')->get();
        return view('kategori',['data'=>$data]);
    }
}
