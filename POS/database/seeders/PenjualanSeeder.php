<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t_penjualan')->insert([
            ['penjualan_id' => 1, 'tanggal_penjualan' => now(), 'total_harga' => 750000],
            ['penjualan_id' => 2, 'tanggal_penjualan' => now(), 'total_harga' => 850000],
            ['penjualan_id' => 3, 'tanggal_penjualan' => now(), 'total_harga' => 500000],
            ['penjualan_id' => 4, 'tanggal_penjualan' => now(), 'total_harga' => 700000],
            ['penjualan_id' => 5, 'tanggal_penjualan' => now(), 'total_harga' => 400000],
            ['penjualan_id' => 6, 'tanggal_penjualan' => now(), 'total_harga' => 300000],
            ['penjualan_id' => 7, 'tanggal_penjualan' => now(), 'total_harga' => 900000],
            ['penjualan_id' => 8, 'tanggal_penjualan' => now(), 'total_harga' => 1000000],
            ['penjualan_id' => 9, 'tanggal_penjualan' => now(), 'total_harga' => 450000],
            ['penjualan_id' => 10, 'tanggal_penjualan' => now(), 'total_harga' => 800000],
        ]);        
    }
}
