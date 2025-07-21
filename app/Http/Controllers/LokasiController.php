<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_lokasi' => 'required|string|max:255',
        ]);

        Lokasi::create([
            'nama_lokasi' => $request->nama_lokasi,
        ]);

        return redirect()->back()->with('success', 'Lokasi berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lokasi' => 'required|string|max:255',
        ]);

        $lokasi = Lokasi::findOrFail($id);
        $lokasi->update([
            'nama_lokasi' => $request->nama_lokasi,
        ]);

        return redirect()->back()->with('success', 'Lokasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->delete();

        return redirect()->back()->with('success', 'Lokasi berhasil dihapus.');
    }
}

