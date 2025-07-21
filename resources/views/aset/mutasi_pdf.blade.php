<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan Mutasi Aset</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 4px 6px;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }
    </style>
</head>

<body>
    <h2>Laporan Mutasi Aset</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Lokasi</th>
                <th>Kode</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($asets as $aset)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $aset->nama_aset }}</td>
                    <td>{{ $aset->kategori->nama_kategori }}</td>
                    <td>{{ $aset->lokasi->nama_lokasi }}</td>
                    <td>{{ $aset->kode_aset }}</td>
                    <td>{{ \Carbon\Carbon::parse($aset->tanggal_perolehan)->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
