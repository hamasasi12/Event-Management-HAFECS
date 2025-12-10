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
        // Tambah ulasan ke tabel attendances
        Schema::table('attendances', function (Blueprint $table) {
            $table->text('ulasan')->nullable()->after('provinsi');
        });

        // Tambah ulasan ke tabel seminar_registrations
        Schema::table('seminar_registrations', function (Blueprint $table) {
            $table->text('ulasan')->nullable()->after('provinsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attendances', function (Blueprint $table) {
            if (Schema::hasColumn('attendances', 'ulasan')) {
                $table->dropColumn('ulasan');
            }
        });

        Schema::table('seminar_registrations', function (Blueprint $table) {
            if (Schema::hasColumn('seminar_registrations', 'ulasan')) {
                $table->dropColumn('ulasan');
            }
        });
    }
};
