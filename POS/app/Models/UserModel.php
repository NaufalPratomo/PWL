<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Monolog\Level;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable
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

    protected $hidden = ['password'];
    protected $casts = [
        'password' => 'hashed',
    ];

    /**
     * Relationship to the level table
     */
    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }

    /**
     * Get the role name
     */
    public function getRoleName(): string
    {
        return $this->level->level_nama;
    }

    /**
     * Check if the user has a specific role
     */
    public function hasRole($role): bool
    {
        return $this->level->level_kode == $role;
    }

    /**
     *Mendapatkan kode role
     */
    public function getRole()
    {
        return $this->level->level_kode;
    }
}
