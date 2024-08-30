<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Report All Cuti Mahasiswa</title>
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
  <h1>Report All Cuti Mahasiswa</h1>
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nomor Surat</th>
        <th>Tanggal Mulai</th>
        <th>Tanggal Selesai</th>
        <th>Jumlah Hari</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($cutiMahasiswas as $data)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $data->nomor_surat }}</td>
          <td>{{ $data->tanggal_mulai }}</td>
          <td>{{ $data->tanggal_selesai }}</td>
          <td>{{ $data->jumlah_hari }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>
