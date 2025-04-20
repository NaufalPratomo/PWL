<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration yang membuat tabel 'm_kategori' untuk menyimpan data kategori sepatu dengan kolom-kolom:
// - kategori_id (primary key)
// - kategori_kode (kode kategori, unique, max 10 karakter)
// - kategori_nama (nama kategori, max 100 karakter)
// - timestamps (created_at dan updated_at)

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('m_kategori', function (Blueprint $table) {
            $table->id('kategori_id');
            $table->string('kategori_kode', 10)->unique();
            $table->string('kategori_nama', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_kategori');
    }
};
