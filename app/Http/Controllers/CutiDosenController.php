<?php

namespace App\Http\Controllers;

use App\Models\CutiDosen;
use Illuminate\Http\Request;

class CutiDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cutiDosen = CutiDosen::paginate(10);
        return view('cuti-dosen.index', compact('cutiDosen'));
    }

    /**
     * Generate nomor surat
     */
    public function nomor_surat()
    {
        $increment = CutiDosen::count() + 1;
        $bulan = \Carbon\Carbon::now()->month;
        $bulan_romawi = $this->convertToRoman($bulan);
        $tahun = date('Y');
        $nomor = sprintf('%03d/STIEI-CD/%s/%d', $increment, $bulan_romawi, $tahun);
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cuti-dosen.create');
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

        $cuti = new CutiDosen();
        $cuti->nomor_surat = $this->nomor_surat();
        $cuti->alasan_cuti = $request->alasan_cuti;
        $cuti->tanggal_mulai = $request->tanggal_mulai;
        $cuti->tanggal_selesai = $request->tanggal_selesai;
        $cuti->jumlah_hari = $cuti->calculateJumlahHari();
        $cuti->dosen_id = auth()->id();

        if ($cuti->save()) {
            return redirect()->route('cuti-dosen.index')->with('success', 'Pengajuan cuti berhasil disimpan');
        } else {
            return redirect()->route('cuti-dosen.index')->with('error', 'Pengajuan cuti gagal disimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CutiDosen $cutiDosen)
    {
        return view('cuti-dosen.show', compact('cutiDosen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CutiDosen $cutiDosen)
    {
        return view('cuti-dosen.edit', compact('cutiDosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CutiDosen $cutiDosen)
    {
        $request->validate([
            'alasan_cuti' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        $cutiDosen->nomor_surat = $request->nomor_surat;
        $cutiDosen->alasan_cuti = $request->alasan_cuti;
        $cutiDosen->tanggal_mulai = $request->tanggal_mulai;
        $cutiDosen->tanggal_selesai = $request->tanggal_selesai;
        $cutiDosen->jumlah_hari = $cutiDosen->calculateJumlahHari();
        $cutiDosen->status = 'pending';
        $cutiDosen->dosen_id = auth()->id();

        if ($cutiDosen->save()) {
            return redirect()->route('cuti-dosen.index')->with('success', 'Pengajuan cuti berhasil diperbarui');
        } else {
            return redirect()->route('cuti-dosen.index')->with('error', 'Pengajuan cuti gagal diperbarui');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CutiDosen $cutiDosen)
    {
        if ($cutiDosen->delete()) {
            return redirect()->route('cuti-dosen.index')->with('success', 'Pengajuan cuti berhasil dihapus');
        } else {
            return redirect()->route('cuti-dosen.index')->with('error', 'Pengajuan cuti gagal dihapus');
        }
    }

    /**
     * Verify the specified resource.
     */
    public function verify(CutiDosen $cutiDosen)
    {
        $cutiDosen->status = 'approved';
        $cutiDosen->verified_by = auth()->id();

        if ($cutiDosen->save()) {
            return redirect()->route('cuti-dosen.index')->with('success', 'Pengajuan cuti berhasil diverifikasi');
        } else {
            return redirect()->route('cuti-dosen.index')->with('error', 'Pengajuan cuti gagal diverifikasi');
        }
    }

    /**
     * Reject the specified resource.
     */
    public function reject(CutiDosen $cutiDosen)
    {
        $cutiDosen->status = 'rejected';
        $cutiDosen->verified_by = auth()->id();

        if ($cutiDosen->save()) {
            return redirect()->route('cuti-dosen.index')->with('success', 'Pengajuan cuti berhasil ditolak');
        } else {
            return redirect()->route('cuti-dosen.index')->with('error', 'Pengajuan cuti gagal ditolak');
        }
    }
}
