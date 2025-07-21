<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function store(Request $request)
    {
        Kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan.');
        if ($kategori->aset()->exists()) {
            return redirect()->back()->with('error', 'Kategori ini sedang digunakan dan tidak bisa dihapus.');
        }
    }
      public function destroy($id)
    {
        $kategori = kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->back()->with('success', 'kategori berhasil dihapus.');
    }
}
