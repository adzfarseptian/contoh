<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Aset</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f4f6f8; padding-top:2rem;">

    <div class="container bg-white p-4 rounded shadow-sm" style="max-width: 700px;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5>Tambah Aset</h5>
            <a href="{{ route('aset.aset') }}" class="btn btn-sm btn-outline-secondary">Kembali</a>
        </div>

        <form action="{{ route('aset.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Aset</label>
                <input type="text" name="nama_aset" class="form-control @error('nama_aset') is-invalid @enderror"
                    value="{{ old('nama_aset') }}" required>
                @error('nama_aset')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Kategori</label>
                    <select name="id_kategori" class="form-select @error('id_kategori') is-invalid @enderror" required>
                        <option disabled {{ old('id_kategori') ? '' : 'selected' }}>Pilih</option>
                        @foreach ($kategoriList as $k)
                            <option value="{{ $k->id }}" {{ old('id_kategori') == $k->id ? 'selected' : '' }}>
                                {{ $k->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <label class="form-label">Lokasi</label>
                    <select name="id_lokasi" class="form-select @error('id_lokasi') is-invalid @enderror" required>
                        <option disabled {{ old('id_lokasi') ? '' : 'selected' }}>Pilih</option>
                        @foreach ($lokasiList as $l)
                            <option value="{{ $l->id }}" {{ old('id_lokasi') == $l->id ? 'selected' : '' }}>
                                {{ $l->nama_lokasi }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_lokasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Kode Aset</label>
                    <input type="text" name="kode_aset" class="form-control @error('kode_aset') is-invalid @enderror"
                        value="{{ old('kode_aset') }}" required>
                    @error('kode_aset')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <label class="form-label">Tanggal Perolehan</label>
                    <input type="date" name="tanggal_perolehan"
                        class="form-control @error('tanggal_perolehan') is-invalid @enderror"
                        value="{{ old('tanggal_perolehan') }}" required>
                    @error('tanggal_perolehan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success w-100">Simpan</button>
                <a href="{{ route('aset.aset') }}" class="btn btn-outline-secondary w-100">Batal</a>
            </div>
        </form>
    </div>

</body>

</html>
