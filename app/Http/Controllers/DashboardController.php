<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Kategori;
use App\Models\Lokasi;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * Tampilkan halaman home.
     *
     * @return View
     */
    public function index(): View
    {
        return view('home', [
            'totalAset' => Aset::count(),
            'totalKategori' => Kategori::count(),
            'totalLokasi' => Lokasi::count()
        ]);
    }
}
