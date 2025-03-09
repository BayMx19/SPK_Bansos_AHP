<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Perhitungan AHP</title>
    <style>
    body {
        font-family: sans-serif;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    h2 {
        text-align: center;
    }

    .text-center {
        text-align: center;
    }
    </style>
</head>

<body>
    <h2>Laporan Perhitungan AHP</h2>
    <table>
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama</th>
                <th class="text-center">NIK</th>
                <th class="text-center">Nilai Akhir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($perhitungan as $index => $item)
            <tr>
                <td class="text-center">{{ $index + 1 }}.</td>
                <td>{{ $item->warga->nama }}</td>
                <td>{{ $item->warga->NIK }}</td>
                <td>{{ $item->nilai_akhir }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>