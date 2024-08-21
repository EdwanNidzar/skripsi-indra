<?php

namespace App\Http\Controllers;

use App\Models\Penelitian;
use Illuminate\Http\Request;

class PenelitianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penelitians = Penelitian::paginate(10);
        return view('penelitian.index', compact('penelitians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penelitian.create');
    }

    /**
     * Generate nomor surat
     */
    public function nomor_surat()
    {
        $increment = Penelitian::count() + 1;
        $bulan = \Carbon\Carbon::now()->month;
        $bulan_romawi = $this->convertToRoman($bulan);
        $tahun = date('Y');
        $nomor = sprintf('%03d/STIEI-P/%s/%d', $increment, $bulan_romawi, $tahun);
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
            'tempat_penelitian' => 'required',
            'judul' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        $penelitian = new Penelitian();
        $penelitian->nomor_surat = $this->nomor_surat();
        $penelitian->tempat_penelitian = $request->tempat_penelitian;
        $penelitian->judul = $request->judul;
        $penelitian->tanggal_mulai = $request->tanggal_mulai;
        $penelitian->tanggal_selesai = $request->tanggal_selesai;
        $penelitian->mahasiswa_id = auth()->id();

        if ($penelitian->save()) {
            return redirect()->route('penelitian.index')->with('success', 'Penelitian berhasil diajukan');
        } else {
            return redirect()->route('penelitian.index')->with('error', 'Penelitian gagal diajukan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Penelitian $penelitian)
    {
        return view('penelitian.show', compact('penelitian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penelitian $penelitian)
    {
        return view('penelitian.edit', compact('penelitian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penelitian $penelitian)
    {
        $request->validate([
            'tempat_penelitian' => 'required',
            'judul' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        $penelitian->nomor_surat = $request->nomor_surat;
        $penelitian->tempat_penelitian = $request->tempat_penelitian;
        $penelitian->judul = $request->judul;
        $penelitian->tanggal_mulai = $request->tanggal_mulai;
        $penelitian->tanggal_selesai = $request->tanggal_selesai;
        $penelitian->status = 'pending';

        if ($penelitian->save()) {
            return redirect()->route('penelitian.index')->with('success', 'Penelitian berhasil diperbarui');
        } else {
            return redirect()->route('penelitian.index')->with('error', 'Penelitian gagal diperbarui');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penelitian $penelitian)
    {
        if ($penelitian->delete()) {
            return redirect()->route('penelitian.index')->with('success', 'Penelitian berhasil dihapus');
        } else {
            return redirect()->route('penelitian.index')->with('error', 'Penelitian gagal dihapus');
        }
    }

    /**
     * Verify the specified resource.
     */
    public function verify(Penelitian $penelitian)
    {
        $penelitian->status = 'approved';
        $penelitian->verified_by = auth()->id();

        if ($penelitian->save()) {
            return redirect()->route('penelitian.index')->with('success', 'Penelitian berhasil diverifikasi');
        } else {
            return redirect()->route('penelitian.index')->with('error', 'Penelitian gagal diverifikasi');
        }
    }

    /**
     * Reject the specified resource.
     */
    public function reject(Penelitian $penelitian)
    {
        $penelitian->status = 'rejected';
        $penelitian->verified_by = auth()->id();
        
        if ($penelitian->save()) {
            return redirect()->route('penelitian.index')->with('success', 'Penelitian berhasil ditolak');
        } else {
            return redirect()->route('penelitian.index')->with('error', 'Penelitian gagal ditolak');
        }
    }

}
