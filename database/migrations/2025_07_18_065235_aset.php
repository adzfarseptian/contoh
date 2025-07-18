<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
           Schema::create('aset', function (Blueprint $table) {
            $table->id();
            $table->string('nama_aset', 100);
            $table->unsignedBigInteger('id_kategori')->nullable();
            $table->unsignedBigInteger('id_lokasi')->nullable();
            $table->string('kode_aset', 50)->nullable()->unique();
            $table->date('tanggal_perolehan')->nullable();
            
            $table->foreign('id_kategori')->references('id')->on('kategori');
            $table->foreign('id_lokasi')->references('id')->on('lokasi');  
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aset');
    }
};
