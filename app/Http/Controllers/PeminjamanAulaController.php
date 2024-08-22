<?php

namespace App\Http\Controllers;

use App\Models\PeminjamanAula;
use Illuminate\Http\Request;

class PeminjamanAulaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjamanAula = PeminjamanAula::with('peminjam')->paginate(10);
        return view('peminjaman-aula.index', compact('peminjamanAula'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peminjaman-aula.create');
    }

    /**
     * Generate nomor surat
     */
    public function nomor_surat()
    {
        $increment = PeminjamanAula::count() + 1;
        $bulan = \Carbon\Carbon::now()->month;
        $bulan_romawi = $this->convertToRoman($bulan);
        $tahun = date('Y');
        $nomor = sprintf('%03d/STIEI-PA/%s/%d', $increment, $bulan_romawi, $tahun);
        return $nomor;
    }

    /**
     * Convert number to roman
     */
    private function convertToRoman($number)
    {
        $map = ['M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1];
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if ($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'nama_penanggung_jawab' => 'required|string',
            'organisasi' => 'required|string',
            'jabatan' => 'required|string',
            'prodi' => 'required|string',
            'no_hp' => 'required|string',
            'keperluan' => 'required|string',
        ]);        

        $peminjamanAula = new PeminjamanAula();
        $peminjamanAula->nomor_surat = $this->nomor_surat();
        $peminjamanAula->tanggal_mulai = $request->tanggal_mulai;
        $peminjamanAula->tanggal_selesai = $request->tanggal_selesai;
        $peminjamanAula->jumlah_hari = $peminjamanAula->calculateJumlahHari();
        $peminjamanAula->nama_pj = $request->nama_penanggung_jawab;
        $peminjamanAula->organisasi = $request->organisasi;
        $peminjamanAula->jabatan = $request->jabatan;
        $peminjamanAula->prodi = $request->prodi;
        $peminjamanAula->no_hp = $request->no_hp;
        $peminjamanAula->keperluan = $request->keperluan;
        $peminjamanAula->peminjam_id = auth()->id();

        if ($peminjamanAula->save()){
            return redirect()->route('peminjaman-aula.index')->with('success', 'Data Barhasil Disimpan.');
        } else {
            return redirect()->route('peminjaman-aula.index')->with('error', 'Data Gagal Disimpan.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PeminjamanAula $peminjaman_aula)
    {
        return view('peminjaman-aula.show', compact('peminjaman_aula'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PeminjamanAula $peminjaman_aula)
    {
        return view('peminjaman-aula.edit', compact('peminjaman_aula'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PeminjamanAula $peminjaman_aula)
    {
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'nama_penanggung_jawab' => 'required|string',
            'organisasi' => 'required|string',
            'jabatan' => 'required|string',
            'prodi' => 'required|string',
            'no_hp' => 'required|string',
            'keperluan' => 'required|string',
        ]);

        $peminjaman_aula->nomor_surat = $request->nomor_surat;
        $peminjaman_aula->tanggal_mulai = $request->tanggal_mulai;
        $peminjaman_aula->tanggal_selesai = $request->tanggal_selesai;
        $peminjaman_aula->jumlah_hari = $peminjaman_aula->calculateJumlahHari();
        $peminjaman_aula->nama_pj = $request->nama_penanggung_jawab;
        $peminjaman_aula->organisasi = $request->organisasi;
        $peminjaman_aula->jabatan = $request->jabatan;
        $peminjaman_aula->prodi = $request->prodi;
        $peminjaman_aula->no_hp = $request->no_hp;
        $peminjaman_aula->keperluan = $request->keperluan;
        $peminjaman_aula->peminjam_id = auth()->id();
        $peminjaman_aula->status = 'pending';

        if ($peminjaman_aula->save()){
            return redirect()->route('peminjaman-aula.index')->with('success', 'Data Barhasil Disimpan.');
        } else {
            return redirect()->route('peminjaman-aula.index')->with('error', 'Data Gagal Disimpan.');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PeminjamanAula $peminjaman_aula)
    {
        if ($peminjaman_aula->delete()) {
            return redirect()->route('peminjaman-aula.index')->with('success', 'Data Berhasil Dihapus.');
        } else {
            return redirect()->route('peminjaman-aula.index')->with('error', 'Data Gagal Dihapus.');
        }   
    }

    /**
     * Verify the specified resource from storage.
     */
    public function verify(PeminjamanAula $peminjaman_aula)
    {
        $peminjaman_aula->status = 'approved';
        $peminjaman_aula->verified_by = auth()->id();

        if ($peminjaman_aula->save()) {
            return redirect()->route('peminjaman-aula.index')->with('success', 'Data Berhasil Diverifikasi.');
        } else {
            return redirect()->route('peminjaman-aula.index')->with('error', 'Data Gagal Diverifikasi.');
        }
    }

    /**
     * Reject the specified resource from storage.
     */
    public function reject(PeminjamanAula $peminjaman_aula)
    {
        $peminjaman_aula->status = 'rejected';
        $peminjaman_aula->verified_by = auth()->id();

        if ($peminjaman_aula->save()) {
            return redirect()->route('peminjaman-aula.index')->with('success', 'Data Berhasil Ditolak.');
        } else {
            return redirect()->route('peminjaman-aula.index')->with('error', 'Data Gagal Ditolak.');
        }
    }
}
