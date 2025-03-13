<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_barang')->insert([
            // Barang milik supplier 1
            ['barang_id' => 1, 'kategori_id' => 1, 'supplier_id' => 1, 'barang_kode' => 'BRG001', 'barang_nama' => 'TV LED', 'harga_beli' => 3000000, 'harga_jual' => 3500000],
            ['barang_id' => 2, 'kategori_id' => 1, 'supplier_id' => 1, 'barang_kode' => 'BRG002', 'barang_nama' => 'Kulkas', 'harga_beli' => 2500000, 'harga_jual' => 3000000],
            ['barang_id' => 3, 'kategori_id' => 1, 'supplier_id' => 1, 'barang_kode' => 'BRG003', 'barang_nama' => 'AC', 'harga_beli' => 2000000, 'harga_jual' => 2500000],
            ['barang_id' => 4, 'kategori_id' => 1, 'supplier_id' => 1, 'barang_kode' => 'BRG004', 'barang_nama' => 'Smartphone', 'harga_beli' => 1500000, 'harga_jual' => 2000000],
            ['barang_id' => 5, 'kategori_id' => 1, 'supplier_id' => 1, 'barang_kode' => 'BRG005', 'barang_nama' => 'Laptop', 'harga_beli' => 7000000, 'harga_jual' => 7500000],
        
            // Barang milik supplier 2
            ['barang_id' => 6, 'kategori_id' => 2, 'supplier_id' => 2, 'barang_kode' => 'BRG006', 'barang_nama' => 'Kaos', 'harga_beli' => 50000, 'harga_jual' => 100000],
            ['barang_id' => 7, 'kategori_id' => 2, 'supplier_id' => 2, 'barang_kode' => 'BRG007', 'barang_nama' => 'Kemeja', 'harga_beli' => 70000, 'harga_jual' => 150000],
            ['barang_id' => 8, 'kategori_id' => 2, 'supplier_id' => 2, 'barang_kode' => 'BRG008', 'barang_nama' => 'Jaket', 'harga_beli' => 120000, 'harga_jual' => 200000],
            ['barang_id' => 9, 'kategori_id' => 2, 'supplier_id' => 2, 'barang_kode' => 'BRG009', 'barang_nama' => 'Celana Jeans', 'harga_beli' => 150000, 'harga_jual' => 300000],
            ['barang_id' => 10, 'kategori_id' => 2, 'supplier_id' => 2, 'barang_kode' => 'BRG010', 'barang_nama' => 'Sepatu Sneaker', 'harga_beli' => 250000, 'harga_jual' => 400000],
        
            // Barang milik supplier 3
            ['barang_id' => 11, 'kategori_id' => 3, 'supplier_id' => 3, 'barang_kode' => 'BRG011', 'barang_nama' => 'Keripik Kentang', 'harga_beli' => 10000, 'harga_jual' => 15000],
            ['barang_id' => 12, 'kategori_id' => 3, 'supplier_id' => 3, 'barang_kode' => 'BRG012', 'barang_nama' => 'Biskuit', 'harga_beli' => 15000, 'harga_jual' => 20000],
            ['barang_id' => 13, 'kategori_id' => 3, 'supplier_id' => 3, 'barang_kode' => 'BRG013', 'barang_nama' => 'Minuman Soda', 'harga_beli' => 8000, 'harga_jual' => 12000],
            ['barang_id' => 14, 'kategori_id' => 3, 'supplier_id' => 3, 'barang_kode' => 'BRG014', 'barang_nama' => 'Cokelat', 'harga_beli' => 20000, 'harga_jual' => 30000],
            ['barang_id' => 15, 'kategori_id' => 3, 'supplier_id' => 3, 'barang_kode' => 'BRG015', 'barang_nama' => 'Teh Kemasan', 'harga_beli' => 5000, 'harga_jual' => 10000],
        ]);
        
    }
}
