<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanAula extends Model
{
    use HasFactory;

    protected $table = 'peminjaman_aulas';

    protected $fillable = [
        'nomor_surat',
        'tanggal_mulai',
        'tanggal_selesai',
        'jumlah_hari',
        'nama_pj',
        'organisasi',
        'jabatan',
        'prodi',
        'no_hp',
        'keperluan',
        'status',
        'peminjam_id',
        'verified_by',
    ];

    public function peminjam()
    {
        return $this->belongsTo(User::class, 'peminjam_id');
    }

    public function verifier()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    public function calculateJumlahHari()
    {
        $startDate = \Carbon\Carbon::parse($this->tanggal_mulai);
        $endDate = \Carbon\Carbon::parse($this->tanggal_selesai);

        return $startDate->diffInDays($endDate) + 1; 
    }
}
