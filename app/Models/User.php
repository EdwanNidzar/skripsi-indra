<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

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
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function mahasiswaAktif()
    {
        return $this->hasMany(MahasiswaAktif::class, 'mahasiswa_id');
    }

    public function verifier()
    {
        return $this->hasMany(MahasiswaAktif::class, 'verified_by');
    }

    public function pkl()
    {
        return $this->hasMany(PKL::class, 'mahasiswa_id');
    }

    public function verifierPKL()
    {
        return $this->hasMany(PKL::class, 'verified_by');
    }

    public function penelitian()
    {
        return $this->hasMany(Penelitian::class, 'mahasiswa_id');
    }

    public function verifierPenelitian()
    {
        return $this->hasMany(Penelitian::class, 'verified_by');
    }

    public function peminjamanAula()
    {
        return $this->hasMany(PeminjamanAula::class, 'peminjam_id');
    }

    public function verifierPeminjamanAula()
    {
        return $this->hasMany(PeminjamanAula::class, 'verified_by');
    }
}
