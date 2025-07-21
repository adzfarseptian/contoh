<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Aset</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Aset</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Oops!</strong> Ada masalah dengan inputmu.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('aset.update', $aset->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_aset" class="form-label">Nama Aset</label>
                <input type="text" name="nama_aset" class="form-control" id="nama_aset"
                    value="{{ old('nama_aset', $aset->nama_aset) }}" required>
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select name="id_kategori" class="form-select" required>
                    @foreach ($kategoriList as $kategori)
                        <option value="{{ $kategori->id }}" {{ $kategori->id == $aset->id_kategori ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <select name="id_lokasi" class="form-select" required>
                    @foreach ($lokasiList as $lokasi)
                        <option value="{{ $lokasi->id }}" {{ $lokasi->id == $aset->id_lokasi ? 'selected' : '' }}>
                            {{ $lokasi->nama_lokasi }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="kode_aset" class="form-label">Kode Aset</label>
                <input type="text" name="kode_aset" class="form-control" id="kode_aset"
                    value="{{ old('kode_aset', $aset->kode_aset) }}" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_perolehan" class="form-label">Tanggal Perolehan</label>
                <input type="date" name="tanggal_perolehan" class="form-control" id="tanggal_perolehan"
                    value="{{ old('tanggal_perolehan', $aset->tanggal_perolehan) }}" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('aset.aset') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
