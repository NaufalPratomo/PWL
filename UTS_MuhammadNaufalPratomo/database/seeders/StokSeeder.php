<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t_stok')->insert([
            ['stok_id' => 1, 'sepatu_id' => 1, 'user_id' => 1, 'stok_tanggal' => now(), 'stok_jumlah' => 50],
            ['stok_id' => 2, 'sepatu_id' => 2, 'user_id' => 1, 'stok_tanggal' => now(), 'stok_jumlah' => 30],
            ['stok_id' => 3, 'sepatu_id' => 3, 'user_id' => 1, 'stok_tanggal' => now(), 'stok_jumlah' => 20],
            ['stok_id' => 4, 'sepatu_id' => 4, 'user_id' => 1, 'stok_tanggal' => now(), 'stok_jumlah' => 15],
            ['stok_id' => 5, 'sepatu_id' => 5, 'user_id' => 1, 'stok_tanggal' => now(), 'stok_jumlah' => 10],
        ]);
        
    }
}
