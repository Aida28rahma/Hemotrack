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
    Schema::table('data_darah_pendonors', function (Blueprint $table) {

        $table->string('nik_pendonor')
              ->nullable();

        $table->string('kode_kantong')
              ->nullable()
              ->unique();

    });
}

public function down(): void
{
    Schema::table('data_darah_pendonors', function (Blueprint $table) {

        $table->dropColumn([
            'nik_pendonor',
            'kode_kantong'
        ]);

    });
}
};