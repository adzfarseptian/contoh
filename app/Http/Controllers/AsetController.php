<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Lokasi;
use App\Models\Aset;
use Illuminate\Http\Request;

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

        if ($request->filled('kategori')) {
            $query->where('id_kategori', $request->kategori);
        }

        if ($request->filled('lokasi')) {
            $query->where('id_lokasi', $request->lokasi);
        }

        $asets = $query->get();
        $kategoriList = Kategori::all();
        $lokasiList = Lokasi::all();

        return view('aset.aset', compact('asets', 'kategoriList', 'lokasiList'));
    }

    public function mutasi(Request $request)
    {
        $query = Aset::with(['kategori', 'lokasi']);

        if ($request->filled('q')) {
            $search = $request->q;

            $query->where(function ($q) use ($search) {
                $q->where('nama_aset', 'like', "%$search%")
                    ->orWhere('kode_aset', 'like', "%$search%")
                    ->orWhereDate('tanggal_perolehan', $search)
                    ->orWhereHas('kategori', fn($q) => $q->where('nama_kategori', 'like', "%$search%"))
                    ->orWhereHas('lokasi', fn($q) => $q->where('nama_lokasi', 'like', "%$search%"));
            });
        }

        $asets = $query->orderBy('tanggal_perolehan', 'desc')->get();

        return view('aset.mutasi', compact('asets'));
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
}
