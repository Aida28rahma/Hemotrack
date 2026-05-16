<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permintaan_darahs', function (Blueprint $table) {
            $table->id();

            $table->string('nama_dokter');
            $table->string('golongan');
            $table->string('rhesus');
            $table->string('jenis_komponen');
            $table->string('poli');
            $table->integer('jumlah');

            $table->string('status')->default('Diproses');

            // petugas yang menyetujui / memproses permintaan
            $table->unsignedBigInteger('disetujui_oleh')->nullable();
            $table->timestamp('tanggal_disetujui')->nullable();

            $table->timestamps();

            $table->foreign('disetujui_oleh')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('permintaan_darahs');
    }
};