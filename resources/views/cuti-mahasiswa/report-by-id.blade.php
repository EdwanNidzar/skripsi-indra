<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Report Cuti Mahasiswa</title>
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
  <!-- Kop Laporan -->
  <div class="kop">
    <h2>Universitas XYZ</h2>
    <p>Fakultas Ilmu Pengetahuan Alam</p>
    <p>Jl. Pendidikan No. 123, Jakarta</p>
    <p>Telp: (021) 12345678</p>
  </div>

  <!-- Judul Laporan -->
  <h1>NO : {{ $cutiMahasiswa->nomor_surat }}</h1>

  <!-- Tabel Detail  -->
  <table>
    <thead>
      <tr>
        <th>Field</th>
        <th>Detail</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Alasan Cuti</td>
        <td><p>{{ $cutiMahasiswa->alasan_cuti }}</p></td>
      </tr>
      <tr>
        <td>Tanggal Mulai</td>
        <td>{{ $cutiMahasiswa->tanggal_mulai }}</td>
      </tr>
      <tr>
        <td>Tanggal Selesai</td>
        <td>{{ $cutiMahasiswa->tanggal_selesai }}</td>
      </tr>
      <tr>
        <td>Jumlah Hari</td>
        <td>{{ $cutiMahasiswa->jumlah_hari }}</td>
      </tr>
    </tbody>
  </table>

  <!-- Tanda Tangan Digital -->
  <div class="signature">
    <p>Banjarmasin, {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
    <br><br><br>
    <p><strong>{{ $cutiMahasiswa->mahasiswa->name }}</strong></p>
  </div>
</body>

</html>
