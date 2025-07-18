<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('status', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_aset');
            $table->unsignedBigInteger('id_kondisi');
            $table->text('keterangan')->nullable();
            $table->date('tanggal_status')->nullable();

            $table->foreign('id_aset')->references('id')->on('aset')->onDelete('cascade');
            $table->foreign('id_kondisi')->references('id')->on('kondisi');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('status');
    }
};
