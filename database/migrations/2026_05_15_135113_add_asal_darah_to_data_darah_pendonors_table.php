<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('data_darah_pendonors', function (Blueprint $table) {
            $table->string('asal_darah')->nullable()->after('tanggal_kedaluwarsa');
        });
    }

    public function down(): void
    {
        Schema::table('data_darah_pendonors', function (Blueprint $table) {
            $table->dropColumn('asal_darah');
        });
    }
};