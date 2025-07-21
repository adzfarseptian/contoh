<?php

namespace App\Http\Controllers;

use App\Models\MutasiAset;
use App\Models\Kategori;
use App\Models\Lokasi;
use App\Models\Aset;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AsetMutasiExport;

class AsetController extends Controller
{
    public function aset(Request $request)
    {
        $query = Aset::with(['kategori', 'lokasi']);

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama_aset', 'like', "%$search%")
                    ->orWhere('kode_aset', 'like', "%$search%")
                    ->orWhereDate('tanggal_perolehan', $search)
                    ->orWhereHas('kategori', function ($q2) use ($search) {
                        $q2->where('nama_kategori', 'like', "%$search%");
                    })
                    ->orWhereHas('lokasi', function ($q3) use ($search) {
                        $q3->where('nama_lokasi', 'like', "%$search%");
                    });
            });
        }

        $asets = $query->get();
        $kategoris = Kategori::all();
        $lokasis = Lokasi::all();

        return view('aset.aset', compact('asets', 'kategoris', 'lokasis'));
    }

    public function mutasi(Request $request)
    {
        $query = MutasiAset::with(['aset.kategori', 'lokasiDari', 'lokasiKe']);

        if ($request->filled('q')) {
            $search = $request->q;

            $query->whereHas('aset', function ($q) use ($search) {
                $q->where('nama_aset', 'like', "%$search%")
                    ->orWhere('kode_aset', 'like', "%$search%");
            })->orWhereHas('lokasiDari', fn($q) => $q->where('nama_lokasi', 'like', "%$search%"))
                ->orWhereHas('lokasiKe', fn($q) => $q->where('nama_lokasi', 'like', "%$search%"))
                ->orWhere('tanggal_mutasi', 'like', "%$search%")
                ->orWhere('keterangan', 'like', "%$search%");
        }

        if ($request->filled('kategori')) {
            $query->whereHas('aset.kategori', fn($q) => $q->where('id', $request->kategori));
        }

        if ($request->filled('lokasi_dari')) {
            $query->where('id_lokasi_dari', $request->lokasi_dari);
        }

        if ($request->filled('lokasi_ke')) {
            $query->where('id_lokasi_ke', $request->lokasi_ke);
        }

        if ($request->filled('tanggal')) {
            $query->whereDate('tanggal_mutasi', $request->tanggal);
        }

        $mutasiList = $query->orderByDesc('tanggal_mutasi')->get();
        $kategoriList = Kategori::all();
        $lokasiList = Lokasi::all();

        return view('aset.mutasi', compact('mutasiList', 'kategoriList', 'lokasiList'));
    }
    public function export(Request $request)
    {
        $query = Aset::query()->with(['kategori', 'lokasi']);

        if ($request->kategori) {
            $query->where('id_kategori', $request->kategori);
        }
        if ($request->lokasi) {
            $query->where('id_lokasi', $request->lokasi);
        }
        if ($request->tanggal) {
            $query->whereDate('tanggal_perolehan', $request->tanggal);
        }

        $asets = $query->get();

        if ($request->type === 'pdf') {
            $pdf = Pdf::loadView('exports.aset_pdf', compact('asets'));
            return $pdf->download('daftar_aset.pdf');
        }

        return Excel::download(new AsetMutasiExport($asets), 'daftar_aset.xlsx');
    }


    public function edit($id)
    {
        $aset = Aset::findOrFail($id);
        $kategoriList = Kategori::all();
        $lokasiList = Lokasi::all();

        return view('aset.edit', compact('aset', 'kategoriList', 'lokasiList'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_aset' => 'required',
            'id_kategori' => 'required',
            'id_lokasi' => 'required',
            'kode_aset' => 'required',
            'tanggal_perolehan' => 'required|date',
        ]);

        $aset = Aset::findOrFail($id);
        $aset->update($request->all());

        return redirect()->route('aset.aset')->with('success', 'Aset berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $aset = Aset::findOrFail($id);
        $aset->delete();

        return redirect()->route('aset.aset')->with('success', 'Aset berhasil dihapus.');
    }
    public function create()
    {
        $kategoriList = Kategori::all();
        $lokasiList = Lokasi::all();

        return view('aset.create', compact('kategoriList', 'lokasiList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_aset' => 'required|string|max:255',
            'id_kategori' => 'required|integer',
            'id_lokasi' => 'required|integer',
            'kode_aset' => 'required|string|unique:aset,kode_aset',
            'tanggal_perolehan' => 'required|date',
        ]);

        Aset::create($request->all());

        return redirect()->back()->with('success', 'Aset berhasil ditambahkan.');
    }
}
