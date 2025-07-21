<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Aset</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f6f8;
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
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Daftar Aset</h4>
            <div class="d-flex gap-2">
                 <a href="{{ route('home') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalTambahKategori">
                    <i class="fas fa-tags"></i> Tambah Kategori
                </button>
                <button class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#modalTambahLokasi">
                    <i class="fas fa-map-marker-alt"></i> Tambah Lokasi
                </button>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-success" data-bs-toggle="modal"
                        data-bs-target="#modalKelolaKategori">
                        <i class="fas fa-cog"></i> edit Kategori
                    </button>
                    <button class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#modalKelolaLokasi">
                        <i class="fas fa-cog"></i> edit Lokasi
                    </button>
                </div>
                <a href="{{ route('aset.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Aset
                </a>
               
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @include('aset.partials.filter-aset')

        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Nama Aset</th>
                                <th>Kategori</th>
                                <th>Lokasi</th>
                                <th>Kode</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($asets as $aset)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $aset->nama_aset }}</td>
                                    <td>{{ $aset->kategori->nama_kategori }}</td>
                                    <td>{{ $aset->lokasi->nama_lokasi }}</td>
                                    <td>{{ $aset->kode_aset }}</td>
                                    <td>{{ \Carbon\Carbon::parse($aset->tanggal_perolehan)->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('aset.edit', $aset) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('aset.destroy', $aset) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus aset ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">Belum ada data aset.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- Tambah Kategori -->
    <div class="modal fade" id="modalTambahKategori" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('kategori.store') }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">tambah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">nama Kategori</label>
                        <input type="text" name="nama_kategori" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!--Tambah Lokasi -->
    <div class="modal fade" id="modalTambahLokasi" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('lokasi.store') }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">tambah Lokasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Lokasi</label>
                        <input type="text" name="nama_lokasi" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- edit Kelola Kategori -->
    <div class="modal fade" id="modalKelolaKategori" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">edit Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    @foreach ($kategoris as $kategori)
                        <div class="d-flex gap-2 align-items-center mb-2">
                            <form action="{{ route('kategori.update', $kategori->id) }}" method="POST"
                                class="d-flex flex-grow-1 gap-2">
                                @csrf
                                @method('PUT')
                                <input type="text" name="nama_kategori" value="{{ $kategori->nama_kategori }}"
                                    class="form-control" required>
                                <button class="btn btn-sm btn-success"><i class="fas fa-save"></i></button>
                            </form>
                            <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST"
                                onsubmit="return confirm('Hapus kategori ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- edit Lokasi -->
    <div class="modal fade" id="modalKelolaLokasi" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">edit Lokasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    @foreach ($lokasis as $lokasi)
                        <div class="d-flex gap-2 align-items-center mb-2">
                            <form action="{{ route('lokasi.update', $lokasi->id) }}" method="POST"
                                class="d-flex flex-grow-1 gap-2">
                                @csrf
                                @method('PUT')
                                <input type="text" name="nama_lokasi" value="{{ $lokasi->nama_lokasi }}"
                                    class="form-control" required>
                                <button class="btn btn-sm btn-success"><i class="fas fa-save"></i></button>
                            </form>
                            <form action="{{ route('lokasi.destroy', $lokasi->id) }}" method="POST"
                                onsubmit="return confirm('Hapus lokasi ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
