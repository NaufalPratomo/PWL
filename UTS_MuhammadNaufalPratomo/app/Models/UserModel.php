<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Monolog\Level;

// Model kustom untuk pengguna aplikasi dengan fungsi-fungsi sebagai berikut:
// - Menggunakan trait HasFactory untuk factory pattern dalam testing.
// - Terhubung ke tabel 'm_user' dengan primary key 'user_id'.
// - Memiliki fillable fields 'level_id', 'username', 'nama', dan 'password' untuk mass assignment.
// - Memiliki relasi belongsTo dengan LevelModel, yang berarti setiap pengguna memiliki satu level akses.

class UserModel extends Model
{
    use HasFactory;
    protected $table = 'm_user';
    protected $primaryKey = 'user_id';
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['level_id', 'username', 'nama', 'password'];

    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }
    
}
