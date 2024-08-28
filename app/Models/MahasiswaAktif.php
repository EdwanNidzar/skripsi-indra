<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaAktif extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa_aktifs';
    protected $fillable = ['nomor_surat', 'tujuan_surat', 'file_surat', 'status', 'mahasiswa_id', 'verified_by'];

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }

    public function verifier()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }
}
