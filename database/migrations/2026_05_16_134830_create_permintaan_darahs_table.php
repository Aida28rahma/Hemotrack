<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
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
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaan_darahs');
    }
};
