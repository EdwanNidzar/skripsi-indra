<?php

namespace App\Http\Controllers;

use App\Models\CutiMahasiswa;
use Illuminate\Http\Request;

class CutiMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cutiMahasiswas = CutiMahasiswa::paginate(10);
        return view('cuti-mahasiswa.index', compact('cutiMahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cuti-mahasiswa.create');
    }

    /**
     * Generate nomor surat
     */
    public function nomor_surat()
    {
        $increment = CutiMahasiswa::count() + 1;
        $bulan = \Carbon\Carbon::now()->month;
        $bulan_romawi = $this->convertToRoman($bulan);
        $tahun = date('Y');
        $nomor = sprintf('%03d/STIEI-CM/%s/%d', $increment, $bulan_romawi, $tahun);
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
            'alasan_cuti' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        $cuti = new CutiMahasiswa();
        $cuti->nomor_surat = $this->nomor_surat();
        $cuti->alasan_cuti = $request->alasan_cuti;
        $cuti->tanggal_mulai = $request->tanggal_mulai;
        $cuti->tanggal_selesai = $request->tanggal_selesai;
        $cuti->jumlah_hari = $cuti->calculateJumlahHari();
        $cuti->mahasiswa_id = auth()->id();

        if ($cuti->save()) {
            return redirect()->route('cuti-mahasiswa.index')->with('success', 'Pengajuan cuti berhasil disimpan');
        } else {
            return redirect()->route('cuti-mahasiswa.index')->with('error', 'Pengajuan cuti gagal disimpan');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(CutiMahasiswa $cutiMahasiswa)
    {
        return view('cuti-mahasiswa.show', compact('cutiMahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CutiMahasiswa $cutiMahasiswa)
    {
        return view('cuti-mahasiswa.edit', compact('cutiMahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CutiMahasiswa $cutiMahasiswa)
    {
        $request->validate([
            'alasan_cuti' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        $cutiMahasiswa->nomor_surat = $request->nomor_surat;
        $cutiMahasiswa->alasan_cuti = $request->alasan_cuti;
        $cutiMahasiswa->tanggal_mulai = $request->tanggal_mulai;
        $cutiMahasiswa->tanggal_selesai = $request->tanggal_selesai;
        $cutiMahasiswa->jumlah_hari = $cutiMahasiswa->calculateJumlahHari();
        $cutiMahasiswa->status = 'pending';
        $cutiMahasiswa->mahasiswa_id = auth()->id();

        if ($cutiMahasiswa->save()) {
            return redirect()->route('cuti-mahasiswa.index')->with('success', 'Pengajuan cuti berhasil diperbarui');
        } else {
            return redirect()->route('cuti-mahasiswa.index')->with('error', 'Pengajuan cuti gagal diperbarui');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CutiMahasiswa $cutiMahasiswa)
    {
        if ($cutiMahasiswa->delete()) {
            return redirect()->route('cuti-mahasiswa.index')->with('success', 'Pengajuan cuti berhasil dihapus');
        } else {
            return redirect()->route('cuti-mahasiswa.index')->with('error', 'Pengajuan cuti gagal dihapus');
        }
    }

    /**
     * Verify the specified resource.
     */
    public function verify(CutiMahasiswa $cutiMahasiswa)
    {
        $cutiMahasiswa->status = 'approved';
        $cutiMahasiswa->verified_by = auth()->id();

        if ($cutiMahasiswa->save()) {
            return redirect()->route('cuti-mahasiswa.index')->with('success', 'Pengajuan cuti berhasil diverifikasi');
        } else {
            return redirect()->route('cuti-mahasiswa.index')->with('error', 'Pengajuan cuti gagal diverifikasi');
        }
    }

    /**
     * Reject the specified resource.
     */
    public function reject(CutiMahasiswa $cutiMahasiswa)
    {
        $cutiMahasiswa->status = 'rejected';
        $cutiMahasiswa->verified_by = auth()->id();

        if ($cutiMahasiswa->save()) {
            return redirect()->route('cuti-mahasiswa.index')->with('success', 'Pengajuan cuti berhasil ditolak');
        } else {
            return redirect()->route('cuti-mahasiswa.index')->with('error', 'Pengajuan cuti gagal ditolak');
        }
    }
}
