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
        Schema::create('permintaan_dokters', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('no_rm');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('golongan');
            $table->string('rhesus');
            $table->string('jenis_komponen');
            $table->integer('jumlah');
            $table->string('poli');
            $table->string('status')->default('menunggu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaan_dokters');
    }
};
