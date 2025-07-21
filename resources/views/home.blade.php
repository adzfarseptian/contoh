<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .card-hover:hover { transform: scale(1.02); transition: 0.3s; }
        .fade-in { animation: fadeIn 0.5s ease-in-out; }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
<div class="container mt-5 fade-in">
    <h1 class="mb-4">Dashboard Aset</h1>

    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card bg-primary text-white text-center card-hover">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-box"></i> Total Aset</h5>
                    <h2>{{ $totalAset }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white text-center card-hover">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-tags"></i> Total Kategori</h5>
                    <h2>{{ $totalKategori }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-info text-white text-center card-hover">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-map-marker-alt"></i> Total Ruangan</h5>
                    <h2>{{ $totalLokasi }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-6">
            <a href="{{ route('aset.aset') }}" class="btn btn-outline-primary w-100 py-3 card-hover">
                <i class="fas fa-box"></i> Kelola Aset
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('aset.mutasi') }}" class="btn btn-outline-warning w-100 py-3 card-hover">
                <i class="fas fa-exchange-alt"></i> Lihat Mutasi
            </a>
        </div>
    </div>
</div>
</body>
</html>
