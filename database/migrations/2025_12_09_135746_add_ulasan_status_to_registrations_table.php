<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->enum('ulasan_status', ['pending', 'approved', 'rejected'])
                  ->default('pending')
                  ->after('ulasan');
        });

        Schema::table('seminar_registrations', function (Blueprint $table) {
            $table->enum('ulasan_status', ['pending', 'approved', 'rejected'])
                  ->default('pending')
                  ->after('ulasan');
        });
    }

    public function down()
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->dropColumn('ulasan_status');
        });

        Schema::table('seminar_registrations', function (Blueprint $table) {
            $table->dropColumn('ulasan_status');
        });
    }
};
