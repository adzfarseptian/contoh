<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Aset</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f8;
            padding-top: 2rem;
        }

        .dashboard-header {
            padding: 1.5rem 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .form-container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 2rem;
            border-radius: 0.75rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
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

    <div id="addAssetView" class="fade-in form-container">
        <div class="dashboard-header">
            <h1>Tambah Aset Baru</h1>
            <a href="{{ route('aset.aset') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i> Kembali
            </a>
        </div>

        <form action="{{ route('aset.store') }}" method="POST">
            @csrf

            {{-- Nama Aset --}}
            <div class="mb-4">
                <label class="form-label" for="nama_aset">Nama Aset</label>
                <input type="text" id="nama_aset" name="nama_aset"
                    class="form-control @error('nama_aset') is-invalid @enderror" value="{{ old('nama_aset') }}"
                    required>
                @error('nama_aset')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <label class="form-label" for="id_kategori">Kategori</label>
                    <select name="id_kategori" id="id_kategori"
                        class="form-select @error('id_kategori') is-invalid @enderror" required>
                        <option value="" disabled {{ old('id_kategori') ? '' : 'selected' }}>
                            Pilih Kategori
                        </option>
                        @foreach ($kategori as $kat)
                            <option value="{{ $kat->id }}" {{ old('id_kategori') == $kat->id ? 'selected' : '' }}>
                                {{ $kat->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="id_lokasi">Lokasi</label>
                    <select name="id_lokasi" id="id_lokasi" class="form-select @error('id_lokasi') is-invalid @enderror"
                        required>
                        <option value="" disabled {{ old('id_lokasi') ? '' : 'selected' }}>
                            Pilih Lokasi
                        </option>
                        @foreach ($lokasi as $lok)
                            <option value="{{ $lok->id }}" {{ old('id_lokasi') == $lok->id ? 'selected' : '' }}>
                                {{ $lok->nama_lokasi }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_lokasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <label class="form-label" for="kode_aset">Kode Aset</label>
                    <input type="text" id="kode_aset" name="kode_aset"
                        class="form-control @error('kode_aset') is-invalid @enderror" value="{{ old('kode_aset') }}"
                        required>
                    @error('kode_aset')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="tanggal_perolehan">Tanggal Perolehan</label>
                    <input type="date" id="tanggal_perolehan" name="tanggal_perolehan"
                        class="form-control @error('tanggal_perolehan') is-invalid @enderror"
                        value="{{ old('tanggal_perolehan') }}" required>
                    @error('tanggal_perolehan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-success flex-grow-1">
                    <i class="fas fa-save me-2"></i> Simpan Aset
                </button>
                <a href="{{ route('aset.aset') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-times me-2"></i> Batal
                </a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
