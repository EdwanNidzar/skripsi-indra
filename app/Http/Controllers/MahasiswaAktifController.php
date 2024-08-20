<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaAktif;
use Illuminate\Http\Request;

class MahasiswaAktifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswaAktifs = MahasiswaAktif::paginate(10);
        return view('mahasiswa-aktif.index', compact('mahasiswaAktifs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa-aktif.create');
    }

    /**
     * Generate nomor surat
     */
    public function nomor_surat()
    {
        $increment = MahasiswaAktif::count() + 1;
        $bulan = \Carbon\Carbon::now()->month;
        $bulan_romawi = $this->convertToRoman($bulan);
        $tahun = date('Y');
        $nomor = sprintf('%03d/STIEI-MA/%s/%d', $increment, $bulan_romawi, $tahun);
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
            'tujuan_surat' => 'required',
        ]);

        $mhs = new MahasiswaAktif();
        $mhs->nomor_surat = $this->nomor_surat();
        $mhs->tujuan_surat = $request->tujuan_surat;
        $mhs->mahasiswa_id = auth()->id();

        if ($mhs->save()) {
            return redirect()->route('mahasiswa-aktif.index')->with('success', 'Data Barhasil Disimpan.');
        } else {
            return redirect()->route('mahasiswa-aktif.index')->with('error', 'Data Gagal Disimpan.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(MahasiswaAktif $mahasiswaAktif)
    {
        return view('mahasiswa-aktif.show', compact('mahasiswaAktif'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MahasiswaAktif $mahasiswaAktif)
    {
        return view('mahasiswa-aktif.edit', compact('mahasiswaAktif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MahasiswaAktif $mahasiswaAktif)
    {
        $request->validate([
            'tujuan_surat' => 'required',
        ]);

        $mahasiswaAktif->nomor_surat = $request->nomor_surat;
        $mahasiswaAktif->tujuan_surat = $request->tujuan_surat;
        $mahasiswaAktif->mahasiswa_id = auth()->id();

        if ($mahasiswaAktif->save()) {
            return redirect()->route('mahasiswa-aktif.index')->with('success', 'Data Barhasil Diupdate.');
        }
        return redirect()->route('mahasiswa-aktif.index')->with('error', 'Data Gagal Diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MahasiswaAktif $mahasiswaAktif)
    {
        if ($mahasiswaAktif->delete()) {
            return redirect()->route('mahasiswa-aktif.index')->with('success', 'Data Barhasil Dihapus.');
        }
        return redirect()->route('mahasiswa-aktif.index')->with('error', 'Data Gagal Dihapus.');
    }

    /**
     * Verify the specified resource from storage.
     */
    public function verify(MahasiswaAktif $mahasiswaAktif)
    {        
        $mahasiswaAktif->status = 'approve';
        $mahasiswaAktif->verified_by = auth()->id();

        if ($mahasiswaAktif->save()) {
            return redirect()->route('mahasiswa-aktif.index')->with('success', 'Data Barhasil Diverifikasi.');
        }
        return redirect()->route('mahasiswa-aktif.index')->with('error', 'Data Gagal Diverifikasi.');
    }

    /**
     * Reject the specified resource from storage.
     */
    public function reject(MahasiswaAktif $mahasiswaAktif)
    {
        $mahasiswaAktif->status = 'reject';
        $mahasiswaAktif->verified_by = auth()->id();

        if ($mahasiswaAktif->save()) {
            return redirect()->route('mahasiswa-aktif.index')->with('success', 'Data Barhasil Ditolak.');
        }
        return redirect()->route('mahasiswa-aktif.index')->with('error', 'Data Gagal Ditolak.');
    }

}
