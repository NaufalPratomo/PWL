<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration yang membuat tabel 'm_supplier' untuk menyimpan data supplier dengan kolom-kolom:
// - supplier_id (primary key)
// - supplier_kode (kode supplier, unique, max 20 karakter)
// - supplier_nama (nama supplier, max 100 karakter)
// - timestamps (created_at dan updated_at)

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('m_supplier', function (Blueprint $table) {
            $table->id('supplier_id'); 
            $table->string('supplier_kode', 20)->unique();
            $table->string('supplier_nama', 100);
            $table->timestamps();
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_supplier');
    }
};
