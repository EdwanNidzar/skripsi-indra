<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PKL extends Model
{
    use HasFactory;

    protected $table = 'p_k_l_s';

    protected $fillable = [
        'nomor_surat',
        'tempat_pkl',
        'lama_pkl',
        'tanggal_mulai',
        'tanggal_selesai',
        'bukti_pembayaran',
        'surat_pernyataan',
        'status',
        'mahasiswa_id',
        'verified_by',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id');
    }

    public function verifier()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }
}
