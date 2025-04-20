<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Seeder utama yang memanggil seeder-seeder lain untuk mengisi data awal ke dalam database. 
// Seeder ini berfungsi sebagai entry point untuk semua seeder lainnya.

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LevelSeeder::class,
            KategoriSeeder::class,
            SupplierSeeder::class,
            UserSeeder::class,
            SepatuSeeder::class,
        ]);
    }
}
