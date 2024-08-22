<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CutiDosen extends Model
{
    use HasFactory;

    protected $table = 'cuti_dosens';

    protected $fillable = [
        'nomor_surat',
        'alasan_cuti',
        'tanggal_mulai',
        'tanggal_selesai',
        'jumlah_hari',
        'status',
        'dosen_id',
        'verified_by',
    ];

    public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id');
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
