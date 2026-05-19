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
    Schema::table('permintaan_dokters', function (Blueprint $table) {

        $table->string('kode_permintaan')
              ->nullable()
              ->unique();

        $table->foreignId('dokter_id')
              ->nullable()
              ->constrained('users')
              ->nullOnDelete();

    });
}

public function down(): void
{
    Schema::table('permintaan_dokters', function (Blueprint $table) {

        $table->dropForeign(['dokter_id']);

        $table->dropColumn([
            'kode_permintaan',
            'dokter_id'
        ]);

    });
}
};