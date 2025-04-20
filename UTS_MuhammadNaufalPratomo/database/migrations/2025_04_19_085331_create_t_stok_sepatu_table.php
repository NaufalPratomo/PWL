<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration yang membuat tabel 't_stok' untuk menyimpan data stok sepatu dengan kolom-kolom:
// - stok_id (primary key)
// - sepatu_id (foreign key ke tabel m_sepatu)
// - user_id (foreign key ke tabel m_user)
// - stok_tanggal (tanggal stok)
// - stok_jumlah (jumlah stok)
// - timestamps (created_at dan updated_at)

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('t_stok', function (Blueprint $table) {
            $table->id('stok_id');
            $table->unsignedBigInteger('sepatu_id');
            $table->unsignedBigInteger('user_id');
            $table->dateTime('stok_tanggal');
            $table->integer('stok_jumlah');
            $table->timestamps();

            $table->foreign('sepatu_id')->references('sepatu_id')->on('m_sepatu');
            $table->foreign('user_id')->references('user_id')->on('m_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_stok');
    }
};
