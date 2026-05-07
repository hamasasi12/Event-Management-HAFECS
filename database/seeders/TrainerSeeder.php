<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Trainer;
use Illuminate\Support\Facades\Hash;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trainers = [
            [
                'name' => 'Hamas Akif Sanie, A.Md.Kom',
                'email' => 'hamasakif@example.com',
                'title' => 'Master Trainer',
                'phone' => '+6281234567890',
                'bio' => 'Trainer profesional dengan pengalaman lebih dari 10 tahun dalam pengembangan soft skills dan manajemen waktu. Spesialis dalam work-life balance dan produktivitas.',
                'position' => 'Senior Trainer HAFECs',
                'skills' => ['Work-Life Balance', 'Time Management', 'Productivity', 'Soft Skills'],
                'image_url' => asset('images/admin/pa yudhis.png'),
                'status' => 'active',
            ],
            [
                'name' => 'Dr. Yudhi Pratama, S.Kom., M.T.',
                'email' => 'yudhipratama@example.com',
                'title' => 'Trainer',
                'phone' => '+6281234567891',
                'bio' => 'Ahli dalam bidang teknologi informasi dan pengembangan aplikasi mobile. Memiliki pengalaman dalam pelatihan digital transformation.',
                'position' => 'Lead Technology Trainer',
                'skills' => ['Mobile App Development', 'Digital Transformation', 'IT Strategy'],
                'image_url' => asset('images/admin/pa yudhis.png'),
                'status' => 'active',
            ],
            [
                'name' => 'Siti Nurhaliza, S.Psi., M.Psi.',
                'email' => 'sitinurhaliza@example.com',
                'title' => 'Trainer',
                'phone' => '+6281234567892',
                'bio' => 'Psikolog dan trainer terkenal dalam pengembangan diri dan emotional intelligence. Fokus pada kesehatan mental dan work-life balance.',
                'position' => 'Senior Psychology Trainer',
                'skills' => ['Emotional Intelligence', 'Mental Health', 'Self Development', 'Stress Management'],
                'image_url' => asset('images/admin/pa yudhis.png'),
                'status' => 'active',
            ],
            [
                'name' => 'Budi Santoso, S.T., M.Eng.',
                'email' => 'budisantoso@example.com',
                'title' => 'Trainer',
                'phone' => '+6281234567893',
                'bio' => 'Pakar dalam pengembangan kurikulum teknik dan pendidikan vokasi. Pengalaman lebih dari 15 tahun dalam pendidikan dan pelatihan teknik.',
                'position' => 'Curriculum Development Expert',
                'skills' => ['Curriculum Development', 'Vocational Education', 'Engineering Training', 'Workshop Facilitation'],
                'image_url' => asset('images/admin/pa yudhis.png'),
                'status' => 'active',
            ],
            [
                'name' => 'Ayu Lestari, S.E., M.M.',
                'email' => 'ayulestari@example.com',
                'title' => 'Trainer',
                'phone' => '+6281234567894',
                'bio' => 'Business consultant dan trainer dalam bidang manajemen dan kepemimpinan. Pengalaman luas dalam meningkatkan produktivitas organisasi.',
                'position' => 'Business Management Trainer',
                'skills' => ['Leadership', 'Business Management', 'Productivity Enhancement', 'Team Building'],
                'image_url' => asset('images/admin/pa yudhis.png'),
                'status' => 'active',
            ],
        ];

        foreach ($trainers as $trainer) {
            Trainer::create([
                'name' => $trainer['name'],
                'email' => $trainer['email'],
                'phone' => $trainer['phone'],
                'bio' => $trainer['bio'],
                'position' => $trainer['position'],
                'skills' => $trainer['skills'],
                'image_url' => $trainer['image_url'],
                'status' => $trainer['status'],
                'title' => $trainer['title'],
            ]);
        }
    }
}
