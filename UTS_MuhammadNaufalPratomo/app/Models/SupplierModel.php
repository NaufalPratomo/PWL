<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
