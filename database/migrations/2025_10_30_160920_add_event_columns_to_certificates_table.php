<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('certificates', function (Blueprint $table) {
            $table->unsignedBigInteger('seminar_id')->nullable()->after('user_id');
            $table->unsignedBigInteger('registration_id')->nullable()->after('seminar_id');

            $table->timestamp('issued_at')->nullable()->after('issue_date');
            $table->timestamp('sent_at')->nullable()->after('issued_at');

            $table->unique(['seminar_id', 'registration_id'], 'uniq_cert_seminar_registration');
            // Opsional FK:
            // $table->foreign('seminar_id')->references('id')->on('seminars')->cascadeOnDelete();
            // $table->foreign('registration_id')->references('id')->on('seminar_registrations')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('certificates', function (Blueprint $table) {
            $table->dropUnique('uniq_cert_seminar_registration');
            // $table->dropForeign(['seminar_id']);
            // $table->dropForeign(['registration_id']);
            $table->dropColumn(['seminar_id', 'registration_id', 'issued_at', 'sent_at']);
        });
    }
};
