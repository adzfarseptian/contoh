<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;

class AsetMutasiExport implements FromCollection
{
    protected $asets;

    public function __construct($asets)
    {
        $this->asets = $asets;
    }

    public function collection()
    {
        return collect($this->asets)->map(function ($item) {
            return [
                'Nama Aset' => $item->nama_aset,
                'Kategori' => $item->kategori->nama_kategori,
                'Lokasi' => $item->lokasi->nama_lokasi,
                'Kode Aset' => $item->kode_aset,
                'Tanggal Perolehan' => \Carbon\Carbon::parse($item->tanggal_perolehan)->format('d/m/Y'),
            ];
        });
    }
}
