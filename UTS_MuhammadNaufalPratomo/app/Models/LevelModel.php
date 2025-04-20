<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model yang merepresentasikan tabel level pengguna dalam database dengan fungsi-fungsi sebagai berikut:
// - Menggunakan trait HasFactory untuk factory pattern dalam testing.
// - Terhubung ke tabel 'm_level' dengan primary key 'level_id'.
// - Memiliki fillable fields 'level_id', 'level_kode', dan 'level_nama' untuk mass assignment.

class LevelModel extends Model
{
    use HasFactory;
    protected $table = 'm_level';
    protected $primaryKey = 'level_id';
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['level_id', 'level_kode', 'level_nama'];
}
