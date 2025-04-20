<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// Seeder yang mengisi data awal untuk tabel m_supplier dengan data supplier sepatu.

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_supplier')->insert([
            ['supplier_kode' => 'SUP001', 'supplier_nama' => 'CMP INC', 'created_at' => now(), 'updated_at' => now()],
            ['supplier_kode' => 'SUP002', 'supplier_nama' => 'ADIOS CORP', 'created_at' => now(), 'updated_at' => now()],
            ['supplier_kode' => 'SUP003', 'supplier_nama' => 'NB PERSERO', 'created_at' => now(), 'updated_at' => now()],
            ['supplier_kode' => 'SUP004', 'supplier_nama' => 'VENTELA GROUP', 'created_at' => now(), 'updated_at' => now()],
            ['supplier_kode' => 'SUP005', 'supplier_nama' => 'SKT AJA', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
