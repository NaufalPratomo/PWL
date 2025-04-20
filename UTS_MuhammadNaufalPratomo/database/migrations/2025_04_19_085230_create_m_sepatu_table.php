<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration yang membuat tabel 'm_sepatu' untuk menyimpan data sepatu dengan kolom-kolom:
// - sepatu_id (primary key)
// - sepatu_kode (kode sepatu, unique, max 10 karakter)
// - sepatu_nama (nama sepatu, max 100 karakter)
// - harga_beli (harga beli sepatu)
// - harga_jual (harga jual sepatu)
// - kategori_id (foreign key ke tabel m_kategori)
// - supplier_id (foreign key ke tabel m_supplier)
// - timestamps (created_at dan updated_at)

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('m_sepatu', function (Blueprint $table) {
            $table->id('sepatu_id');
            $table->string('sepatu_kode', 10)->unique();
            $table->string('sepatu_nama', 100);
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('supplier_id');
            $table->timestamps();

            // Foreign keys
            $table->foreign('kategori_id')->references('kategori_id')->on('m_kategori');
            $table->foreign('supplier_id')->references('supplier_id')->on('m_supplier');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_sepatu');
    }
};
