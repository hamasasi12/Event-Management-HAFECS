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
        // Add school fields to attendances table
        Schema::table('attendances', function (Blueprint $table) {
            $table->string('jenjang_sekolah')->nullable()->after('phone');
            $table->string('asal_sekolah')->nullable()->after('jenjang_sekolah');
            $table->string('jabatan')->nullable()->after('asal_sekolah');
            $table->string('kota_kabupaten')->nullable()->after('jabatan');
            $table->string('provinsi')->nullable()->after('kota_kabupaten');
        });

        // Add school fields to seminar_registrations table
        Schema::table('seminar_registrations', function (Blueprint $table) {
            $table->string('jenjang_sekolah')->nullable()->after('phone');
            $table->string('asal_sekolah')->nullable()->after('jenjang_sekolah');
            $table->string('jabatan')->nullable()->after('asal_sekolah');
            $table->string('kota_kabupaten')->nullable()->after('jabatan');
            $table->string('provinsi')->nullable()->after('kota_kabupaten');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove columns safely from attendances table
        Schema::table('attendances', function (Blueprint $table) {
            foreach (['jenjang_sekolah', 'asal_sekolah', 'jabatan', 'kota_kabupaten', 'provinsi'] as $col) {
                if (Schema::hasColumn('attendances', $col)) {
                    $table->dropColumn($col);
                }
            }
        });

        // Remove columns safely from seminar_registrations table
        Schema::table('seminar_registrations', function (Blueprint $table) {
            foreach (['jenjang_sekolah', 'asal_sekolah', 'jabatan', 'kota_kabupaten', 'provinsi'] as $col) {
                if (Schema::hasColumn('seminar_registrations', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
