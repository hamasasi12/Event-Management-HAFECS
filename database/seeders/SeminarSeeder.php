<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Seminar;

class SeminarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Seminar::create([
            'title' => 'Teknologi Web Terkini',
            'description' => 'Pelajari teknologi web terbaru yang sedang berkembang pesat saat ini. Workshop ini akan membahas berbagai framework dan tools modern.',
            'start_time' => '2025-10-15 09:00:00',
            'end_time' => '2025-10-15 16:00:00',
            'price' => 150000,
            'status' => 'upcoming',
            'image_url' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80',
        ]);

        Seminar::create([
            'title' => 'Pengembangan Mobile Apps',
            'description' => 'Workshop komprehensif tentang pengembangan aplikasi mobile untuk Android dan iOS menggunakan teknologi cross-platform.',
            'start_time' => '2025-11-20 10:00:00',
            'end_time' => '2025-11-20 17:00:00',
            'price' => 200000,
            'status' => 'upcoming',
            'image_url' => 'https://images.unsplash.com/photo-1551650975-87deedd944c3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80',
        ]);

        Seminar::create([
            'title' => 'Machine Learning Dasar',
            'description' => 'Pengenalan konsep dasar machine learning dan implementasinya dalam berbagai bidang. Cocok untuk pemula yang ingin memulai karir di bidang AI.',
            'start_time' => '2025-09-05 13:00:00',
            'end_time' => '2025-09-05 18:00:00',
            'price' => 175000,
            'status' => 'completed',
            'image_url' => 'https://images.unsplash.com/photo-1677442135722-5f11e06a4e6d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80',
        ]);
    }
}
