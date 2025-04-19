<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KategoriModel;
use App\Models\SupplierModel;

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
