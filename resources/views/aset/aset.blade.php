<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Aset</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --secondary: #6c757d;
            --card-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        body {
            background: #f4f6f8;
        }

        .dashboard-header {
            padding: 2rem 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .table-container {
            padding: 1rem;
            overflow-x: auto;
        }

        .table thead {
            background: var(--primary);
            color: white;
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary-dark);
        }

        .btn-outline-primary {
            border-color: var(--primary);
            color: var(--primary);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary);
            color: white;
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

    <div class="container mt-4 fade-in" id="assetListView">
        <div class="dashboard-header">
            <h1>Daftar Aset</h1>
            <div class="d-flex gap-2">
                <a href="{{ route('aset.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Aset
                </a>
                <button class="btn btn-outline-primary">
                    <i class="fas fa-file-export"></i> Export Data
                </button>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        @include('aset.partials.filter-aset')

        <div class="card mb-4">
            <div class="card-body p-0">
                <div class="table-container">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Aset</th>
                                <th>Kategori</th>
                                <th>Lokasi</th>
                                <th>Kode</th>
                                <th>Tanggal Perolehan</th>
                                <th>Aksi</th>
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
                            @endforeach
                            @if ($asets->isEmpty())
                                <tr>
                                    <td colspan="7" class="text-center text-muted">Belum ada data aset.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
