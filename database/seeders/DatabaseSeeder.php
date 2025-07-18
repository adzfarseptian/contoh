<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategori')->insert([
            ['nama_kategori' => 'Elektronik'],
            ['nama_kategori' => 'Furniture'],
            ['nama_kategori' => 'Peralatan Kantor'],
        ]);

        DB::table('kondisi')->insert([
            ['nama_kondisi' => 'Baik'],
            ['nama_kondisi' => 'Rusak Ringan'],
            ['nama_kondisi' => 'Rusak Berat'],
        ]);

        DB::table('lokasi')->insert([
            ['nama_lokasi' => 'Gudang A'],
            ['nama_lokasi' => 'Gudang B'],
            ['nama_lokasi' => 'Ruang Kantor'],
            ['nama_lokasi' => 'Ruang IT'],
        ]);

        DB::table('aset')->insert([
            [
                'id' => 1,
                'nama_aset' => 'Laptop Dell',
                'id_kategori' => 1,
                'id_lokasi' => 3,
                'kode_aset' => 'EL-001',
                'tanggal_perolehan' => '2022-01-15',
            ],
            [
                'id' => 2,
                'nama_aset' => 'Meja Kantor',
                'id_kategori' => 2,
                'id_lokasi' => 3,
                'kode_aset' => 'FU-001',
                'tanggal_perolehan' => '2021-06-20',
            ],
            [
                'id' => 3,
                'nama_aset' => 'Kursi Kantor',
                'id_kategori' => 2,
                'id_lokasi' => 4,
                'kode_aset' => 'FU-002',
                'tanggal_perolehan' => '2020-11-05',
            ],
            [
                'id' => 4,
                'nama_aset' => 'Printer Canon',
                'id_kategori' => 3,
                'id_lokasi' => 4,
                'kode_aset' => 'OF-001',
                'tanggal_perolehan' => '2023-01-10',
            ],
        ]);

        DB::table('mutasi_aset')->insert([
            [
                'id_aset' => 1,
                'id_lokasi_dari' => 1,
                'id_lokasi_ke' => 3,
                'tanggal_mutasi' => '2022-01-16',
                'keterangan' => 'Pindah dari Gudang A ke Ruang Kantor karena persiapan rapat penting'
            ],
            [
                'id_aset' => 2,
                'id_lokasi_dari' => 2,
                'id_lokasi_ke' => 3,
                'tanggal_mutasi' => '2021-06-21',
                'keterangan' => 'Pindah dari Gudang B ke Ruang Kantor untuk renovasi gudang'
            ],
            [
                'id_aset' => 3,
                'id_lokasi_dari' => 3,
                'id_lokasi_ke' => 4,
                'tanggal_mutasi' => '2020-11-06',
                'keterangan' => 'Pindah dari Ruang Kantor ke Ruang IT untuk perbaikan dan instalasi perangkat'
            ],
            [
                'id_aset' => 4,
                'id_lokasi_dari' => 1,
                'id_lokasi_ke' => 4,
                'tanggal_mutasi' => '2023-01-10',
                'keterangan' => 'Pindah dari Gudang A ke Ruang IT untuk kebutuhan operasional staf IT'
            ],
        ]);

        DB::table('status')->insert([
            [
                'id_aset' => 1,
                'id_kondisi' => 1,
                'keterangan' => 'Baik dan siap digunakan',
                'tanggal_status' => '2023-05-01'
            ],
            [
                'id_aset' => 2,
                'id_kondisi' => 1,
                'keterangan' => 'Meja dalam kondisi baik',
                'tanggal_status' => '2023-04-15'
            ],
            [
                'id_aset' => 3,
                'id_kondisi' => 2,
                'keterangan' => 'Terbentur saat pemindahan barang',
                'tanggal_status' => '2023-04-10'
            ],
            [
                'id_aset' => 4,
                'id_kondisi' => 1,
                'keterangan' => 'Printer baru, belum ada masalah',
                'tanggal_status' => '2023-05-10'
            ],
        ]);
    }
}
