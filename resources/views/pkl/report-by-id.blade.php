<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Surat Permohonan PKL</title>
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
                <h6 style="margin: 7px; font-size: 13px"><b>Yayasan Lembaga Pendidikan Kejuruan Nasional Indonesia
                        (YLPKN)
                        Banjarmasin</b></h6>
                <h1 style="margin: 1px; font-size: 22px;"><b>SEKOLAH TINGGI ILMU EKONOMI INDONESIA (STIE INDONESIA)
                        BANJARMASIN</b></h1>
                <h6 style="margin: 1px; font-size: 10px;">Prodi S1 Manajemen Terakreditasi, Prodi S1 Akuntan
                    Terakreditasi ,
                    Prodi S2 Magister Manajemen Terakreditasi</h6>

            </div>
            <!-- Clearfix untuk mengatasi float -->
            <div style="clear: both;"></div>
            <br>
            <hr style="border-top: 3px solid black; margin-top: 0px; margin-bottom: 10px;">
        </div>

    <!-- Judul Laporan -->
    <h1 style="text-align: center; margin-bottom: 10px;"><b>SURAT PERMOHONAN PKL</b></h1>
    <h3 style="text-align: center; margin-top: 0px;"><b><u>{{ $pkl->nomor_surat }}</u></b></h3>

    <div class="content">
            <p>Kepada Yth:
                    <br><b>{{ $pkl->tempat_pkl }}</b></p>
            <p>Dengan Hormat</p>
            <p>Sehubungan dengan rencana Praktek Kerja Lapangan Mahasiswa/i Sekolah Tinggi Ilmu Ekonomi Indonesia (STIE Indonesia) Banjarmasin dan sekaligus menjalin kemitraan antara pendidikan tinggi dengan berbagai Perusahaan pemakai Tenaga Kerja. Maka dimohon kiranya dapat Menerima kami untuk melaksanakan Penelitian.</p>
            <br>
            <p>Adapun Mahasiswa yang dimaksud adalah :
                <br><b>{{ $pkl->mahasiswa->name }}.</b></p>
            <br>
            <p>Waktu pelaksanaan Praktek Kerja Lapangan sekitar <b>{{ $pkl->lama_pkl }}</b> yang di harapkan bisa di mulai pada tanggal <b>{{ \Carbon\Carbon::parse($pkl->tanggal_mulai)->translatedFormat('d F Y') }}</b> sampai <b>{{ \Carbon\Carbon::parse($pkl->tanggal_selesai)->translatedFormat('d F Y') }}</b> atau di sesuaikan dengan waktu yang di tentukan.</p>


            <p>Demikian disampaikan, kami mengucapkan terima kasih atas kerjasamanya dan kesediaannya menerima Mahasiswa/i kami.</p>


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
