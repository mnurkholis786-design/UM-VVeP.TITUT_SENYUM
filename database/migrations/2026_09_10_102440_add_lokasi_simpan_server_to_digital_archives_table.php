<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('digital_archives', function (Blueprint $table) {
            $table->string('lokasi_simpan_server')->nullable()->after('keterangan');
        });
    }

    public function down(): void
    {
        Schema::table('digital_archives', function (Blueprint $table) {
            $table->dropColumn('lokasi_simpan_server');
        });
    }
};