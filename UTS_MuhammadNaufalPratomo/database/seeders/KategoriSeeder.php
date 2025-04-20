<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// Seeder yang mengisi data awal untuk tabel m_kategori dengan kategori-kategori sepatu seperti CMP, ADS DLL.

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_kategori')->insert([
            ['kategori_id' => 1, 'kategori_kode' => 'CMP', 'kategori_nama' => 'Compass'],
            ['kategori_id' => 2, 'kategori_kode' => 'ADS', 'kategori_nama' => 'Adios'],
            ['kategori_id' => 3, 'kategori_kode' => 'NB', 'kategori_nama' => 'NB'],
            ['kategori_id' => 4, 'kategori_kode' => 'VTL', 'kategori_nama' => 'Ventela'],
            ['kategori_id' => 5, 'kategori_kode' => 'SKT', 'kategori_nama' => 'Sketcher'],
        ]);
    }
}
