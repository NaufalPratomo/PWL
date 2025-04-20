<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model yang merepresentasikan tabel kategori sepatu dalam database dengan fungsi-fungsi sebagai berikut:
// - Menggunakan trait HasFactory untuk factory pattern dalam testing.
// - Terhubung ke tabel 'm_kategori' dengan primary key 'kategori_id'.
// - Memiliki fillable fields 'kategori_kode' dan 'kategori_nama' untuk mass assignment.
// - Memiliki relasi hasMany dengan SepatuModel, yang berarti satu kategori dapat memiliki banyak sepatu.

class KategoriModel extends Model
{
    use HasFactory;

    protected $table = 'm_kategori';
    protected $primaryKey = 'kategori_id';
    protected $fillable = ['kategori_kode', 'kategori_nama'];

    public function sepatu()
    {
        return $this->hasMany(SepatuModel::class, 'kategori_id', 'kategori_id');
    }
}
