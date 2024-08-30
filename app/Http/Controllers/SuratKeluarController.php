<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\CutiDosen;
use App\Models\CutiMahasiswa;
use App\Models\MahasiswaAktif;
use App\Models\Penelitian;
use App\Models\PKL;
use App\Models\PeminjamanAula;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function report()
    {
        $mahasiswaAktif = MahasiswaAktif::count();
        $pkl = PKL::count();
        $penelitian = Penelitian::count();
        $cutiMahasiswa = CutiMahasiswa::count();
        $cutiDosen = CutiDosen::count();
        $peminjamanAula = PeminjamanAula::count();


        $pdf = PDF::loadView('surat-keluar.report', compact('mahasiswaAktif', 'pkl', 'penelitian', 'cutiMahasiswa', 'cutiDosen', 'peminjamanAula'));
        return $pdf->stream('surat-keluar-report.pdf');
    }
}
