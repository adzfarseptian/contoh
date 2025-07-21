<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mutasi Aset</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1>Mutasi Aset</h1>

        <form action="{{ route('aset.mutasi') }}" method="GET" class="mb-3 row g-2">
            <div class="col-md-10">
                <input type="text" name="q" class="form-control" placeholder="Cari berdasarkan nama, kode, lokasi, kategori, atau tanggal..."
                    value="{{ request('q') }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Cari</button>
            </div>
        </form>

        @if($asets->count())
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Nama Aset</th>
                    <th>Kategori</th>
                    <th>Lokasi</th>
                    <th>Kode</th>
                    <th>Tanggal Perolehan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($asets as $aset)
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
        @else
        <div class="alert alert-warning">
            Tidak ditemukan data yang cocok dengan pencarian.
        </div>
        @endif
    </div>
</body>

</html>
