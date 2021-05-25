<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Pencaker</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<p style="text-align: center; margin-bottom: 30px;">DAFTAR NAMA PENCARI KERJA KHUSUS BKK {{ Str::upper($bkk->bkk_nama) }}</p>

<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Tinggi</th>
            <th>Kab/Kota</th>
            <th>BKK</th>
            <th>Tempat Lahir</th>
            <th>Tgl. Lahir</th>
            <th>Jenis kelamin</th>
            <th>Agama</th>
            <th>Status</th>
            <th>Pekerjaan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pencaker as $i)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $i['nama'] }}</td>
                <td>{{ $i['nik'] }}</td>
                <td>{{ $i['tinggi_badan'] }}</td>
                <td>{{ $i['daerah'] }}</td>
                <td>{{ $i['bkk_nama'] }}</td>
                <td>{{ $i['tempat_lahir'] }}</td>
                <td>{{ $i['tanggal_lahir'] }}</td>
                <td>{{ $i['jk'] }}</td>
                <td>{{ $i['agama'] }}</td>
                <td>{{ $i['status_nikah'] }}</td>
                <td>{{ $i['pekerjaan'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
