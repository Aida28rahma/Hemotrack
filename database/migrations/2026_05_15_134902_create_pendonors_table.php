<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendonors', function (Blueprint $table) {
            $table->id();

            // Data Pendonor
            $table->string('nama_pendonor');
            $table->string('nik_pendonor');
            $table->string('jenis_kelamin');
            $table->date('tanggal_lahir');
            $table->integer('usia');
            $table->text('alamat_pendonor');
            $table->string('nomor_telpon_pendonor');

            // Data Skrining
            $table->string('tekanan_darah');
            $table->string('berat_badan');
            $table->string('suhu_badan');

            // Asal data
            $table->string('asal_darah')->default('Unit Bank Darah');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendonors');
    }
};