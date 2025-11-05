<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CertificateSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan tabel yang dibutuhkan ada
        if (!Schema::hasTable('seminars') || !Schema::hasTable('attendances')) {
            $this->command->warn('Tabel seminars/attendances belum ada. Import SQL atau migrate tabel itu dulu.');
            return;
        }

        // ===== 1) Insert SEMINAR DEMO =====
        $start = Carbon::parse('2025-09-27 09:00:00');
        $end   = Carbon::parse('2025-09-27 12:00:00');

        $seminarData = [
            'title'       => 'Work-Life Balance: Menjaga Produktivitas dan Kesehatan Mental di Tengah Kesibukan Sehari-hari',
            'start_time'  => $start->toDateTimeString(),
            'end_time'    => $end->toDateTimeString(),
            'created_at'  => now(),
            'updated_at'  => now(),
        ];
        // kolom opsional (isi hanya jika ada di DB kamu)
        foreach ([
            'description' => 'Seminar demo untuk uji sertifikat.',
            'status'      => 'upcoming',
            'location'    => 'Banjarmasin', // atau city/lokasi/venue (sesuaikan)
            'image_url'   => 'https://picsum.photos/1200/600?random=1',
            'type'        => 'gratis',
            'price'       => 0,
        ] as $col => $val) {
            if (Schema::hasColumn('seminars', $col)) $seminarData[$col] = $val;
        }

        $seminarId = DB::table('seminars')->insertGetId($seminarData);

        // ===== 2) Insert ATTENDANCE “hadir” =====
        $a1Id = DB::table('attendances')->insertGetId([
            'seminar_id'              => $seminarId,
            'seminar_registration_id' => null,
            'name'                    => 'Rina Oktavia',
            'email'                   => 'rina@example.com',
            'phone'                   => '081234567890',
            'token'                   => Str::random(24),
            'scanned_at'              => $start->copy()->addMinutes(5),   // urut 001
            'created_at'              => now(),
            'updated_at'              => now(),
        ]);

        $a2Id = DB::table('attendances')->insertGetId([
            'seminar_id'              => $seminarId,
            'seminar_registration_id' => null,
            'name'                    => 'Dimas Pratama',
            'email'                   => 'dimas@example.com',
            'phone'                   => '081298765432',
            'token'                   => Str::random(24),
            'scanned_at'              => $start->copy()->addMinutes(12),  // urut 002
            'created_at'              => now(),
            'updated_at'              => now(),
        ]);

        $a3Id = DB::table('attendances')->insertGetId([
            'seminar_id'              => $seminarId,
            'seminar_registration_id' => null,
            'name'                    => 'Siti Mawar',
            'email'                   => 'siti@example.com',
            'phone'                   => '081200011122',
            'token'                   => Str::random(24),
            'scanned_at'              => $start->copy()->addMinutes(20),  // urut 003
            'created_at'              => now(),
            'updated_at'              => now(),
        ]);

        $this->command->info("Seminar ID  : {$seminarId}");
        $this->command->info("Attendance IDs: {$a1Id}, {$a2Id}, {$a3Id}");
        $this->command->info('Coba: /certificates/attendance/'.$a1Id.'/preview');
        $this->command->info('Coba: /certificates/attendance/'.$a1Id.'/preview-pdf');
        $this->command->info('Coba: /certificates/attendance/'.$a1Id.'/download');
    }
}
