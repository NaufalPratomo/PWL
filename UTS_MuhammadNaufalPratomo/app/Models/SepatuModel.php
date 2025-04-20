<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KategoriModel;
use App\Models\SupplierModel;

// Model yang merepresentasikan tabel sepatu dalam database dengan fungsi-fungsi sebagai berikut:
// - Menggunakan trait HasFactory untuk factory pattern dalam testing.
// - Terhubung ke tabel 'm_sepatu' dengan primary key 'sepatu_id'.
// - Memiliki fillable fields 'kategori_id', 'sepatu_kode', 'sepatu_nama', 'harga_beli', 'harga_jual', dan 'supplier_id' untuk mass assignment.
// - Memiliki relasi belongsTo dengan KategoriModel, yang berarti setiap sepatu termasuk dalam satu kategori.
// - Memiliki relasi belongsTo dengan SupplierModel, yang berarti setiap sepatu disediakan oleh satu supplier.

class SepatuModel extends Model
{
    use HasFactory;

    protected $table = 'm_sepatu';
    protected $primaryKey = 'sepatu_id';
    protected $fillable = [
        'kategori_id',
        'sepatu_kode',
        'sepatu_nama',
        'harga_beli',
        'harga_jual',
        'supplier_id'
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_id', 'kategori_id');
    }

    public function supplier()
    {
        return $this->belongsTo(SupplierModel::class, 'supplier_id', 'supplier_id');
    }
}
