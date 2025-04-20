<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

// Model bawaan Laravel untuk autentikasi pengguna dengan fungsi-fungsi sebagai berikut:
// - Menggunakan trait HasApiTokens untuk pengelolaan token API.
// - Menggunakan trait HasFactory untuk factory pattern dalam testing.
// - Menggunakan trait HasProfilePhoto untuk pengelolaan foto profil (dari Jetstream).
// - Menggunakan trait Notifiable untuk pengiriman notifikasi.
// - Menggunakan trait TwoFactorAuthenticatable untuk autentikasi dua faktor.
// - Memiliki fillable fields 'name', 'email', dan 'password' untuk mass assignment.
// - Memiliki hidden fields 'password', 'remember_token', 'two_factor_recovery_codes', dan 'two_factor_secret' untuk keamanan.
// - Memiliki casts untuk 'email_verified_at' sebagai datetime.
// - Memiliki appends 'profile_photo_url' untuk URL foto profil.

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
