<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_supplier')->insert([
            ['supplier_kode' => 'SUP001', 'supplier_nama' => 'PT Elektronik', 'created_at' => now(), 'updated_at' => now()],
            ['supplier_kode' => 'SUP002', 'supplier_nama' => 'CV Fashion', 'created_at' => now(), 'updated_at' => now()],
            ['supplier_kode' => 'SUP003', 'supplier_nama' => 'UD Makanan', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
