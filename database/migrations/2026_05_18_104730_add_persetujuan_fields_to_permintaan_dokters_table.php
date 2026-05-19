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
        $table->foreignId('disetujui_oleh')->nullable()->constrained('users')->nullOnDelete();
        $table->timestamp('tanggal_disetujui')->nullable();
    });
}

public function down(): void
{
    Schema::table('permintaan_dokters', function (Blueprint $table) {
        $table->dropForeign(['disetujui_oleh']);
        $table->dropColumn(['disetujui_oleh', 'tanggal_disetujui']);
    });
}
};