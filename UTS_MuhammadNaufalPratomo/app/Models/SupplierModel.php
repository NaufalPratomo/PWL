<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Model yang merepresentasikan tabel supplier dalam database dengan fungsi-fungsi sebagai berikut:
// - Menggunakan trait HasFactory untuk factory pattern dalam testing.
// - Terhubung ke tabel 'm_supplier' dengan primary key 'supplier_id'.
// - Memiliki fillable fields 'supplier_nama' dan 'supplier_kode' untuk mass assignment.
// - Memiliki relasi hasMany dengan SepatuModel, yang berarti satu supplier dapat menyediakan banyak sepatu.

class SupplierModel extends Model
{
    use HasFactory;

    protected $table = 'm_supplier';
    protected $primaryKey = 'supplier_id';
    protected $fillable = [
        'supplier_nama',
        'supplier_kode'
    ];
    public function sepatu()
    {
        return $this->hasMany(SepatuModel::class, 'supplier_id', 'supplier_id');
    }
}
