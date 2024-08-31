<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Surat Keluar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
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
    <h1>Laporan Surat Keluar</h1>
    <table>
        <thead>
            <tr>
                <th>Jenis Surat</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Mahasiswa Aktif</td>
                <td>{{ $mahasiswaAktif }}</td>
            </tr>
            <tr>
                <td>PKL</td>
                <td>{{ $pkl }}</td>
            </tr>
            <tr>
                <td>Penelitian</td>
                <td>{{ $penelitian }}</td>
            </tr>
            <tr>
                <td>Cuti Mahasiswa</td>
                <td>{{ $cutiMahasiswa }}</td>
            </tr>
            <tr>
                <td>Cuti Dosen</td>
                <td>{{ $cutiDosen }}</td>
            </tr>
            <tr>
                <td>Peminjaman Aula</td>
                <td>{{ $peminjamanAula }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
