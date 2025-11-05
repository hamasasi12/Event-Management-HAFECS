<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AttendanceSeeder extends Seeder
{
    /** Ubah sesuai kebutuhan */
    private int $COUNT = 15; // berapa peserta yang akan diabsen

    public function run(): void
    {
        if (!Schema::hasTable('seminars') || !Schema::hasTable('attendances')) {
            $this->command->warn('Tabel seminars/attendances belum ada. Import SQL atau migrate tabel itu dulu.');
            return;
        }

        // === 1) Pilih seminar target (pakai yang terbaru). Kalau kosong → buat demo
        $seminar = DB::table('seminars')->orderByDesc('id')->first();

        if (!$seminar) {
            $start = Carbon::parse('2025-09-27 09:00:00');
            $end   = Carbon::parse('2025-09-27 12:00:00');

            $seminarData = [
                'title'       => 'Work-Life Balance: Menjaga Produktivitas dan Kesehatan Mental di Tengah Kesibukan Sehari-hari',
                'start_time'  => $start->toDateTimeString(),
                'end_time'    => $end->toDateTimeString(),
                'created_at'  => now(),
                'updated_at'  => now(),
            ];
            foreach ([
                'description' => 'Seminar demo untuk uji sertifikat.',
                'status'      => 'upcoming',
                'location'    => 'Banjarmasin',
                'type'        => 'gratis',
                'price'       => 0,
            ] as $col => $val) {
                if (Schema::hasColumn('seminars', $col)) $seminarData[$col] = $val;
            }

            $seminarId = DB::table('seminars')->insertGetId($seminarData);
            $seminar   = DB::table('seminars')->where('id', $seminarId)->first();
            $this->command->info("Seminar dibuat (demo): ID {$seminarId}");
        }

        $seminarId = $seminar->id;
        $baseStart = Carbon::parse($seminar->start_time ?? now());

        // === 2) Ambil registran dari seminar_registrations kalau ada
        $registrants = collect();
        if (Schema::hasTable('seminar_registrations') && Schema::hasColumn('seminar_registrations', 'seminar_id')) {
            $registrants = DB::table('seminar_registrations')
                ->where('seminar_id', $seminarId)
                ->limit($this->COUNT)
                ->get();
        }

        $ids = [];

        if ($registrants->isNotEmpty()) {
            // Seed dari data registrasi
            $minute = 3;
            foreach ($registrants as $i => $r) {
                [$name, $email, $phone] = [
                    $this->pick($r, ['name','full_name','nama','nama_lengkap']) ?? 'Peserta '.$i+1,
                    $this->pick($r, ['email']) ?? 'user'.rand(1000,9999).'@example.com',
                    $this->pick($r, ['phone','no_hp','telp','handphone']) ?? '08'.rand(1000000000,9999999999),
                ];

                $ids[] = DB::table('attendances')->insertGetId([
                    'seminar_id'              => $seminarId,
                    'seminar_registration_id' => property_exists($r,'id') ? $r->id : null,
                    'name'                    => $name,
                    'email'                   => $email,
                    'phone'                   => $phone,
                    'token'                   => Str::random(24),
                    'scanned_at'              => $baseStart->copy()->addMinutes(($i+1)*$minute), // urut hadir
                    'created_at'              => now(),
                    'updated_at'              => now(),
                ]);
            }
            $this->command->info("Attendance dibuat dari registrasi: ".count($ids)." baris.");
        } else {
            // === 3) Tidak ada registrasi → generate dummy pakai Faker
            $faker = \Faker\Factory::create('id_ID');
            for ($i = 1; $i <= $this->COUNT; $i++) {
                $name  = $faker->name();
                $email = Str::slug($name, '.').rand(10,99).'@example.com';
                $phone = '08'.rand(1000000000,9999999999);

                $ids[] = DB::table('attendances')->insertGetId([
                    'seminar_id'              => $seminarId,
                    'seminar_registration_id' => null,
                    'name'                    => $name,
                    'email'                   => $email,
                    'phone'                   => $phone,
                    'token'                   => Str::random(24),
                    'scanned_at'              => $baseStart->copy()->addMinutes($i*3), // 3 menit antar peserta
                    'created_at'              => now(),
                    'updated_at'              => now(),
                ]);
            }
            $this->command->info("Attendance dummy dibuat: {$this->COUNT} baris.");
        }

        // Ringkasan & contoh URL test
        $sampleId = $ids[0] ?? null;
        $this->command->info("Seminar ID: {$seminarId}");
        $this->command->info("Attendance IDs: ".implode(', ', array_slice($ids, 0, 10)).(count($ids) > 10 ? ' ...' : ''));
        if ($sampleId) {
            $this->command->info('Coba buka: /certificates/attendance/'.$sampleId.'/preview');
            $this->command->info('Atau:       /certificates/attendance/'.$sampleId.'/preview-pdf');
            $this->command->info('Atau:       /certificates/attendance/'.$sampleId.'/download');
        }
    }

    /** Ambil nilai properti pertama yang tersedia dari beberapa kandidat nama kolom */
    private function pick(object $row, array $candidates): ?string
    {
        foreach ($candidates as $c) {
            if (property_exists($row, $c) && !is_null($row->{$c}) && $row->{$c} !== '') {
                return (string) $row->{$c};
            }
        }
        return null;
    }
}
