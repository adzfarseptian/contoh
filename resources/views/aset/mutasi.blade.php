<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Mutasi Aset</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f8;
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="container mt-4 fade-in">
        <h1 class="mb-3">Mutasi Aset</h1>
        <a href="{{ route('home') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
        <form method="GET" class="row g-2 mb-3">
            <div class="col-md-3">
                <input type="text" name="q" class="form-control" placeholder="Cari aset..."
                    value="{{ request('q') }}">
            </div>
            <div class="col-md-2">
                <select name="kategori" class="form-select">
                    <option value="">Semua Kategori</option>
                    @foreach ($kategoriList as $kategori)
                        <option value="{{ $kategori->id }}"
                            {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select name="lokasi_dari" class="form-select">
                    <option value="">Dari Lokasi</option>
                    @foreach ($lokasiList as $lokasi)
                        <option value="{{ $lokasi->id }}"
                            {{ request('lokasi_dari') == $lokasi->id ? 'selected' : '' }}>
                            {{ $lokasi->nama_lokasi }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select name="lokasi_ke" class="form-select">
                    <option value="">Ke Lokasi</option>
                    @foreach ($lokasiList as $lokasi)
                        <option value="{{ $lokasi->id }}" {{ request('lokasi_ke') == $lokasi->id ? 'selected' : '' }}>
                            {{ $lokasi->nama_lokasi }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <input type="date" name="tanggal" class="form-control" value="{{ request('tanggal') }}">
            </div>
            <div class="col-md-1 d-grid">
                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
            </div>
        </form>

        @if ($mutasiList->count())
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle bg-white">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Nama Aset</th>
                            <th>Kategori</th>
                            <th>Lokasi Dari</th>
                            <th>Lokasi Ke</th>
                            <th>Tanggal Mutasi</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mutasiList as $mutasi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mutasi->aset->nama_aset }}</td>
                                <td>{{ $mutasi->aset->kategori->nama_kategori ?? '-' }}</td>
                                <td>{{ $mutasi->lokasiDari->nama_lokasi }}</td>
                                <td>{{ $mutasi->lokasiKe->nama_lokasi }}</td>
                                <td>{{ \Carbon\Carbon::parse($mutasi->tanggal_mutasi)->format('d/m/Y') }}</td>
                                <td>{{ $mutasi->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-warning">Tidak ada data mutasi ditemukan.</div>
        @endif

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
