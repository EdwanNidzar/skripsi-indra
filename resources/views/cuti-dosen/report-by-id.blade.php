<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Surat Cuti Dosen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
        }

        .kop {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e9ecef;
        }

        .signature {
            margin-top: 50px;
            text-align: right;
        }

        .signature p {
            margin: 0;
        }
    </style>
</head>

<body>
    <!-- Header/Kop Surat -->
    <div class="header">
        <!-- Logo -->
        <img src="{{ public_path('images/logo-silat.png') }}" alt="Logo STIE"
            style="width: 100px; height: auto; float: left; margin-right: 15px;">
        <!-- Informasi Organisasi -->
        <div class="center-align">
            <h6 style="margin: 7px; font-size: 13px"><b>Yayasan Lembaga Pendidikan Kejuruan Nasional Indonesia (YLPKN)
                    Banjarmasin</b></h6>
            <h1 style="margin: 1px; font-size: 22px;"><b>SEKOLAH TINGGI ILMU EKONOMI INDONESIA (STIE INDONESIA)
                    BANJARMASIN</b></h1>
            <h6 style="margin: 1px; font-size: 10px;">Prodi S1 Manajemen Terakreditasi, Prodi S1 Akuntan Terakreditasi ,
                Prodi S2 Magister Manajemen Terakreditasi</h6>

        </div>
        <!-- Clearfix untuk mengatasi float -->
        <div style="clear: both;"></div>
        <br>
        <hr style="border-top: 3px solid black; margin-top: 0px; margin-bottom: 10px;">
    </div>

    <!-- Judul Laporan -->
    <h1 style="text-align: center; margin-bottom: 10px;"><b>SURAT CUTI DOSEN</b></h1>
    <h3 style="text-align: center; margin-top: 0px;"><b><u>{{ $cutiDosen->nomor_surat }}</u></b></h3>
    <div class="content">
        <p>Kepada Yth:
            <br><b>{{ $cutiDosen->dosen->name }}</b>
        </p>
        <p>Sehubungan dengan Pengajuan Cuti yang Saudara ajukan sebelumnya dengan alasan
            <b>{{ $cutiDosen->alasan_cuti }}</b>, dengan tanggal cuti sebagai berikut :
        </p>
        <table class="table">
            <thead>
                <tr>
                    <th class="text-left align-middle">Tanggal</th>
                    <td class="text-center align-middle">:</td>
                    <td class="text-left align-middle">
                        {{ \Carbon\Carbon::parse($cutiDosen->tanggal_mulai)->translatedFormat('d F Y') }} -
                        {{ \Carbon\Carbon::parse($cutiDosen->tanggal_selesai)->translatedFormat('d F Y') }}</td>
                </tr>
            </thead>
        </table>
        <p>Berkenaan hal tersebut, maka pengajuan yang saudara ajukan <b>Disetujui</b> oleh
            <b>{{ $cutiDosen->verifier->name }}</b>.
        </p>
        <p>Demikian surat persetujuan cuti ini dibuat. Atas waktu dan perhatian Bapak/Ibu, kami
            ucapkan
            terima kasih.</p>
    </div>
    <!-- Tanda Tangan Digital -->
    <div class="signature" style="text-align: right;">
        <p>Banjarmasin, {{ \Carbon\Carbon::now()->format('d F Y') }}<br>Mengetahui,</p>

        <img src="{{ public_path('images/QR-Code-SILAT-STIEI.png') }}" alt="QR Code STIE"
            style="width: 100px; height: auto; margin: 15px auto; display: block;">

        <p><b><u>Yosindra Arista Hafiz</u></b></p>
    </div>
</body>

</html>
