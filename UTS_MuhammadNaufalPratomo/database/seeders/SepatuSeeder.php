<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SepatuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_sepatu')->insert([
            ['sepatu_id' => 1, 'sepatu_kode' => 'SEP001', 'sepatu_nama' => 'Sepatu CMP', 'kategori_id' => 1, 'created_at' => now(), 'updated_at' => now(), 'harga_beli' => 1000000, 'harga_jual' => 1500000, 'supplier_id' => 1],
            ['sepatu_id' => 2, 'sepatu_kode' => 'SEP002', 'sepatu_nama' => 'Sepatu ADS', 'kategori_id' => 2, 'created_at' => now(), 'updated_at' => now(), 'harga_beli' => 1200000, 'harga_jual' => 1800000, 'supplier_id' => 2],
            ['sepatu_id' => 3, 'sepatu_kode' => 'SEP003', 'sepatu_nama' => 'Sepatu NB', 'kategori_id' => 3, 'created_at' => now(), 'updated_at' => now(), 'harga_beli' => 600000, 'harga_jual' => 1200000, 'supplier_id' => 3],
            ['sepatu_id' => 4, 'sepatu_kode' => 'SEP004', 'sepatu_nama' => 'Sepatu VTL', 'kategori_id' => 4, 'created_at' => now(), 'updated_at' => now(), 'harga_beli' => 250000, 'harga_jual' => 400000, 'supplier_id' => 4],
            ['sepatu_id' => 5, 'sepatu_kode' => 'SEP005', 'sepatu_nama' => 'Sepatu SKT', 'kategori_id' => 5, 'created_at' => now(), 'updated_at' => now(), 'harga_beli' => 1000000, 'harga_jual' => 2100000, 'supplier_id' => 5],
        ]);
        
    }
}
