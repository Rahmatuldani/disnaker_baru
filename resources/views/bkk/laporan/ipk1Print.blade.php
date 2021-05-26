<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan IPK III/1</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<p style="text-align: center; margin-bottom: 30px;">LAPORAN IPK III/1 - IKHTISAR STATISTIK ANTAR KERJA BKK {{ Str::upper($bkk->bkk_nama) }}</p>

<table border="1">
    <thead>
        <tr>
            <th rowspan="3">No</th>
            <th rowspan="3">Pencari Kerja</th>
            <th colspan="10">Kelompok Umur</th>
            <th colspan="3" rowspan="2">Jumlah</th>
        </tr>
        <tr>
            <th colspan="2">15-19</th>
            <th colspan="2">20-29</th>
            <th colspan="2">30-44</th>
            <th colspan="2">45-54</th>
            <th colspan="2">55+</th>
        </tr>
        <tr>
            <th>L</th>
            <th>P</th>
            <th>L</th>
            <th>P</th>
            <th>L</th>
            <th>P</th>
            <th>L</th>
            <th>P</th>
            <th>L</th>
            <th>P</th>
            <th>L</th>
            <th>P</th>
            <th>JML</th>
        </tr>
        <tr>
            <th></th>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th>8</th>
            <th>9</th>
            <th>10</th>
            <th>11</th>
            <th>12</th>
            <th>13</th>
            <th>14</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ipk as $u)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $u['ipk1_name'] }}</td>
                <td>{{ $u['15-19l'] }}</td>
                <td>{{ $u['15-19p'] }}</td>
                <td>{{ $u['20-29l'] }}</td>
                <td>{{ $u['20-29p'] }}</td>
                <td>{{ $u['30-44l'] }}</td>
                <td>{{ $u['30-44p'] }}</td>
                <td>{{ $u['45-54l'] }}</td>
                <td>{{ $u['45-54p'] }}</td>
                <td>{{ $u['55l'] }}</td>
                <td>{{ $u['55p'] }}</td>
                <td>{{ $u['jmll'] }}</td>
                <td>{{ $u['jmlp'] }}</td>
                <td>{{ $u['jml'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
