<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CutiMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'cuti_mahasiswas';

    protected $fillable = [
        'nomor_surat',
        'alasan_cuti',
        'tanggal_mulai',
        'tanggal_selesai',
        'jumlah_hari',
        'status',
        'mahasiswa_id',
        'verified_by',
    ];

    public function calculateJumlahHari()
    {
        $startDate = \Carbon\Carbon::parse($this->tanggal_mulai);
        $endDate = \Carbon\Carbon::parse($this->tanggal_selesai);

        return $startDate->diffInDays($endDate) + 1; 
    }

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }

    public function verifier()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }
}
