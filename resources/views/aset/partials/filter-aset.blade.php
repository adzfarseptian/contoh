<form method="GET" action="{{ route('aset.aset') }}" class="row g-3 align-items-end mb-3 px-3">
    <div class="col-md-4">
        <label for="search" class="form-label">Cari</label>
        <input type="text" name="search" id="search" class="form-control"
            placeholder="Ketik aset..." value="{{ request('search') }}">
    </div>

    <div class="col-md-3">
        <label for="kategori" class="form-label">Kategori</label>
        <select name="kategori" id="kategori" class="form-select">
            <option value="">Semua Kategori</option>
            @foreach ($kategoriList as $kat)
                <option value="{{ $kat->id }}" {{ request('kategori') == $kat->id ? 'selected' : '' }}>
                    {{ $kat->nama_kategori }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3">
        <label for="lokasi" class="form-label">Lokasi</label>
        <select name="lokasi" id="lokasi" class="form-select">
            <option value="">Semua Lokasi</option>
            @foreach ($lokasiList as $lok)
                <option value="{{ $lok->id }}" {{ request('lokasi') == $lok->id ? 'selected' : '' }}>
                    {{ $lok->nama_lokasi }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-2">
        <button type="submit" class="btn btn-outline-primary w-100">
            <i class="fas fa-search me-1"></i> Cari
        </button>
    </div>
</form>
