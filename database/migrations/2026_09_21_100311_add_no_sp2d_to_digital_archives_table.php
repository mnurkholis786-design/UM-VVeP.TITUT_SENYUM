<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('digital_archives', 'no_sp2d')) {
            Schema::table('digital_archives', function (Blueprint $table) {
                $table->string('no_sp2d')->nullable()->after('no_spby');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('digital_archives', 'no_sp2d')) {
            Schema::table('digital_archives', function (Blueprint $table) {
                $table->dropColumn('no_sp2d');
            });
        }
    }
};