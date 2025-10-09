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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seminar_id');
            $table->unsignedBigInteger('seminar_registration_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('token'); // For QR code validation
            $table->timestamp('scanned_at')->nullable();
            $table->timestamps();

            $table->foreign('seminar_id')->references('id')->on('seminars')->onDelete('cascade');
            $table->foreign('seminar_registration_id')->references('id')->on('seminar_registrations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
