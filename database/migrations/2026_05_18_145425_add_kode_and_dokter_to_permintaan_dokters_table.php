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
            if (!Schema::hasColumn('permintaan_dokters', 'dokter_id')) {
                $table->unsignedBigInteger('dokter_id')->nullable()->after('id');
            }

            if (!Schema::hasColumn('permintaan_dokters', 'kode_permintaan')) {
                $table->string('kode_permintaan')->nullable()->after('dokter_id');
            }

            if (!Schema::hasColumn('permintaan_dokters', 'disetujui_oleh')) {
                $table->unsignedBigInteger('disetujui_oleh')->nullable()->after('status');
            }

            if (!Schema::hasColumn('permintaan_dokters', 'tanggal_disetujui')) {
                $table->timestamp('tanggal_disetujui')->nullable()->after('disetujui_oleh');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permintaan_dokters', function (Blueprint $table) {
            if (Schema::hasColumn('permintaan_dokters', 'tanggal_disetujui')) {
                $table->dropColumn('tanggal_disetujui');
            }

            if (Schema::hasColumn('permintaan_dokters', 'disetujui_oleh')) {
                $table->dropColumn('disetujui_oleh');
            }

            if (Schema::hasColumn('permintaan_dokters', 'kode_permintaan')) {
                $table->dropColumn('kode_permintaan');
            }

            if (Schema::hasColumn('permintaan_dokters', 'dokter_id')) {
                $table->dropColumn('dokter_id');
            }
        });
    }
};