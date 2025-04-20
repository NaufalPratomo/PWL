<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration yang membuat tabel 'm_user' untuk menyimpan data pengguna aplikasi dengan kolom-kolom:
// - user_id (primary key)
// - level_id (foreign key ke tabel m_level)
// - username (username pengguna, unique, max 20 karakter)
// - nama (nama pengguna, max 100 karakter)
// - password (password terenkripsi)
// - timestamps (created_at dan updated_at)

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('m_user', function (Blueprint $table) {
            $table->id('user_id');
            $table->unsignedBigInteger('level_id')->index();
            $table->string('username', 20)->unique();
            $table->string('nama', 100);
            $table->string('password');
            $table->timestamps();

            $table->foreign('level_id')->references('level_id')->on('m_level');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_user');
    }
};
