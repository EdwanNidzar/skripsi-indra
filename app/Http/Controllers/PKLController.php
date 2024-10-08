<?php

namespace App\Http\Controllers;

use App\Models\PKL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class PKLController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('karyawan')) {
            $pkl = PKL::paginate(10);
        } else {
            $pkl = PKL::where('mahasiswa_id', Auth::id())->paginate(10);
        }
        return view('pkl.index', compact('pkl'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pkl.create');
    }

    /**
     * Generate nomor surat
     */
    public function nomor_surat()
    {
        $increment = PKL::count() + 1;
        $bulan = \Carbon\Carbon::now()->month;
        $bulan_romawi = $this->convertToRoman($bulan);
        $tahun = date('Y');
        $nomor = sprintf('%03d/STIEI-PKL/%s/%d', $increment, $bulan_romawi, $tahun);
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
            'tempat_pkl' => 'required',
            'lama_pkl' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'bukti_pembayaran' => 'required|mimes:jpeg,png,jpg',
            'surat_pernyataan' => 'required|mimes:pdf',
        ]);

        // Hitung tanggal selesai di server
        $tanggalMulai = new \DateTime($request->tanggal_mulai);
        if ($request->lama_pkl == '2 bulan') {
            $tanggalMulai->modify('+2 months');
        } elseif ($request->lama_pkl == '3 bulan') {
            $tanggalMulai->modify('+3 months');
        }
        $tanggalSelesai = $tanggalMulai->format('Y-m-d');

        // Buat objek PKL baru
        $pkl = new PKL();
        $pkl->nomor_surat = $this->nomor_surat();
        $pkl->tempat_pkl = $request->tempat_pkl;
        $pkl->lama_pkl = $request->lama_pkl;
        $pkl->tanggal_mulai = $request->tanggal_mulai;
        $pkl->tanggal_selesai = $tanggalSelesai;

        // Simpan file bukti pembayaran
        $bukti_pembayaran = $request->file('bukti_pembayaran');
        $bukti_pembayaran->storeAs('public/pkl/bukti_pembayaran', $bukti_pembayaran->hashName());
        $pkl->bukti_pembayaran = $bukti_pembayaran->hashName();

        // Simpan file surat pernyataan
        $surat_pernyataan = $request->file('surat_pernyataan');
        $surat_pernyataan->storeAs('public/pkl/surat_pernyataan', $surat_pernyataan->hashName());
        $pkl->surat_pernyataan = $surat_pernyataan->hashName();

        // Set ID mahasiswa
        $pkl->mahasiswa_id = auth()->id();

        // Simpan data PKL ke database
        if ($pkl->save()) {
            return redirect()->route('pkl.index')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect()->route('pkl.index')->with('error', 'Data gagal disimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PKL $pkl)
    {
        return view('pkl.show', compact('pkl'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PKL $pkl)
    {
        return view('pkl.edit', compact('pkl'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PKL $pkl)
    {
        $request->validate([
            'tempat_pkl' => 'required',
            'lama_pkl' => 'required',
            'tanggal_mulai' => 'required|date',
            'bukti_pembayaran' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'surat_pernyataan' => 'nullable|mimes:pdf|max:2048',
        ]);

        // Calculate tanggal_selesai based on tanggal_mulai and lama_pkl
        $tanggalMulai = new \DateTime($request->tanggal_mulai);
        if ($request->lama_pkl == '2 bulan') {
            $tanggalMulai->modify('+2 months');
        } elseif ($request->lama_pkl == '3 bulan') {
            $tanggalMulai->modify('+3 months');
        }
        $tanggalSelesai = $tanggalMulai->format('Y-m-d');

        // Update the model attributes
        $pkl->tempat_pkl = $request->tempat_pkl;
        $pkl->lama_pkl = $request->lama_pkl;
        $pkl->tanggal_mulai = $request->tanggal_mulai;
        $pkl->tanggal_selesai = $tanggalSelesai;

        // Update Bukti Pembayaran
        if ($request->hasFile('bukti_pembayaran')) {
            // Delete old file if exists
            if ($pkl->bukti_pembayaran) {
                Storage::delete('public/pkl/bukti_pembayaran/' . $pkl->bukti_pembayaran);
            }

            // Store new file
            $bukti_pembayaran = $request->file('bukti_pembayaran');
            $bukti_pembayaran->storeAs('public/pkl/bukti_pembayaran', $bukti_pembayaran->hashName());
            $pkl->bukti_pembayaran = $bukti_pembayaran->hashName();
        }

        // Update Surat Pernyataan
        if ($request->hasFile('surat_pernyataan')) {
            // Delete old file if exists
            if ($pkl->surat_pernyataan) {
                Storage::delete('public/pkl/surat_pernyataan/' . $pkl->surat_pernyataan);
            }

            // Store new file
            $surat_pernyataan = $request->file('surat_pernyataan');
            $surat_pernyataan->storeAs('public/pkl/surat_pernyataan', $surat_pernyataan->hashName());
            $pkl->surat_pernyataan = $surat_pernyataan->hashName();
        }

        // Save the updated model
        if ($pkl->save()) {
            return redirect()->route('pkl.index')->with('success', 'Data berhasil diupdate');
        } else {
            return redirect()->route('pkl.index')->with('error', 'Data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PKL $pkl)
    {
        Storage::delete('public/pkl/bukti_pembayaran/' . $pkl->bukti_pembayaran);
        Storage::delete('public/pkl/surat_pernyataan/' . $pkl->surat_pernyataan);
        if ($pkl->delete()) {
            return redirect()->route('pkl.index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('pkl.index')->with('error', 'Data gagal dihapus');
        }
    }

    /**
     * Verify the specified resource in storage.
     */
    public function verify(PKL $pkl)
    {
        $pkl->status = 'approved';
        $pkl->verified_by = auth()->id();

        if ($pkl->save()) {
            return redirect()->route('pkl.index')->with('success', 'Data berhasil diverifikasi');
        } else {
            return redirect()->route('pkl.index')->with('error', 'Data gagal diverifikasi');
        }

    }

    /**
     * Reject the specified resource from storage.
     */
    public function reject(PKL $pkl)
    {
        $pkl->status = 'rejected';
        $pkl->verified_by = auth()->id();

        if ($pkl->save()) {
            return redirect()->route('pkl.index')->with('success', 'Data berhasil ditolak');
        } else {
            return redirect()->route('pkl.index')->with('error', 'Data gagal ditolak');
        }
    }

    /**
     * PRINT PDF
     */
    public function report()
    {
        
        $pkl = PKL::where('status', 'approved')->get();
        $pdf = PDF::loadView('pkl.report', compact('pkl'));
        return $pdf->stream('pkl-report.pdf');
    }

    /**
     * PRINT PDF BY ID
     */
    public function reportById(PKL $pkl)
    {
        $pdf = PDF::loadView('pkl.report-by-id', compact('pkl'));
        return $pdf->stream('pkl-report-by-id.pdf');
    }
}
