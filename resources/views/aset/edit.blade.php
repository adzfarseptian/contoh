<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Aset</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body>
    <div class="container mt-5">
        <h2>Edit Aset</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('aset.update', $aset->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Aset</label>
                <input type="text" name="nama_aset" class="form-control"
                    value="{{ old('nama_aset', $aset->nama_aset) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="id_kategori" class="form-select" required>
                    @foreach ($kategoriList as $k)
                        <option value="{{ $k->id }}" {{ $k->id == $aset->id_kategori ? 'selected' : '' }}>
                            {{ $k->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Lokasi</label>
                <select name="id_lokasi" class="form-select" required>
                    @foreach ($lokasiList as $l)
                        <option value="{{ $l->id }}" {{ $l->id == $aset->id_lokasi ? 'selected' : '' }}>
                            {{ $l->nama_lokasi }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Kode Aset</label>
                <input type="text" name="kode_aset" class="form-control"
                    value="{{ old('kode_aset', $aset->kode_aset) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Perolehan</label>
                <input type="date" name="tanggal_perolehan" class="form-control"
                    value="{{ old('tanggal_perolehan', $aset->tanggal_perolehan) }}" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('aset.aset') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</body>

</html>
