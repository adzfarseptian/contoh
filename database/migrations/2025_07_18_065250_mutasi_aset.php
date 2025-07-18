<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
       Schema::create('mutasi_aset', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_aset');
            $table->unsignedBigInteger('id_lokasi_dari');
            $table->unsignedBigInteger('id_lokasi_ke');
            $table->date('tanggal_mutasi')->nullable();
            $table->text('keterangan')->nullable();

            $table->foreign('id_aset')->references('id')->on('aset')->onDelete('cascade');
            $table->foreign('id_lokasi_dari')->references('id')->on('lokasi');
            $table->foreign('id_lokasi_ke')->references('id')->on('lokasi');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('mutasi_aset');
    }
};
