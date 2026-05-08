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
            'start_time' => '2028-10-15 09:00:00',
            'end_time' => '2025-10-15 16:00:00',
            'type' => 'berbayar',
            'price' => 150000,
            'status' => 'upcoming',
            'image_url' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80',
        ]);

        Seminar::create([
            'title' => 'Pengembangan Mobile Apps',
            'description' => 'Workshop komprehensif tentang pengembangan aplikasi mobile untuk Android dan iOS menggunakan teknologi cross-platform.',
            'details' => "📢IMPORTANT : CHECK THE SESSION TIME IN OUR WEBSITE(The time on the website and the meetup site may not match since we change it ocasionally)\n\nHi there! My name is Chloe.\nI'm a certified English teacher from United States.\nI wanted to make an online language club where people can practice foreign languages by having real casual conversation!\nI'm looking for people who want to practice conversational English by talking about interesting topics and hanging out with people from all over the world in a small online group.\nHere are some examples of what our weekly topics might be like:\n\"What would you do if you come across your crush?\"\n\"Have you ever done the MBTI test? If so, what is your personality type?\"\n\"Do you believe in love at first sight? Why or why not?\"\n\"What are you most worried about right now?\n💎Here are some details💎\n✔️ We meet via Zoom\n✔️ The session will last for 1 hour and consists of 3 different rounds\n✔️ Each round has different topics and discussion questions\n✔️ Each round, the groups are randomly mixed, so you will have a chance to talk to different people every time\n✔️ This isn't just about practicing English, but also about listening to different opinions and learning about different cultures\n✔️ The participation is FREE\n❌ No credit card\n❌ No Ads\n\n📢IMPORTANT : CHECK THE SESSION TIME IN OUR WEBSITE(The time on the website and the meetup site may not match since we change it ocasionally)\n\n💎 How to Join 💎\n\nClick the link(here)\nSign up\n3. Click 'book' in the session that you want to participate.\n4. Show up at the session time and click 'Join' in the session page\n(The Zoom invitation will be sent to your e-mail once you apply too)\n5. Enjoy practicing English with people from all over the world!\n\n📢IMPORTANT : CHECK THE SESSION TIME IN OUR WEBSITE(The time on the website and the meetup site may not match since we change it ocasionally)",
            'start_time' => '2027-11-20 10:00:00',
            'end_time' => '2025-11-20 17:00:00',
            'type' => 'gratis',
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

        Seminar::create([
            'title' => 'Cloud Computing dengan AWS',
            'description' => 'Pelajari cara membangun dan mengelola infrastruktur cloud menggunakan Amazon Web Services. Materi mencakup EC2, S3, RDS, dan layanan AWS lainnya.',
            'start_time' => '2025-06-10 09:00:00',
            'end_time' => '2025-06-10 17:00:00',
            'type' => 'berbayar',
            'price' => 250000,
            'status' => 'upcoming',
            'image_url' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80',
        ]);

        Seminar::create([
            'title' => 'UI/UX Design Masterclass',
            'description' => 'Workshop intensif tentang desain antarmuka dan pengalaman pengguna. Pelajari Figma, design thinking, dan best practices dalam UI/UX design.',
            'start_time' => '2025-07-15 10:00:00',
            'end_time' => '2025-07-15 16:00:00',
            'type' => 'berbayar',
            'price' => 200000,
            'status' => 'upcoming',
            'image_url' => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80',
        ]);

        Seminar::create([
            'title' => 'DevOps Fundamentals',
            'description' => 'Pengenalan konsep DevOps termasuk CI/CD, Docker, Kubernetes, dan automation tools. Cocok untuk developer yang ingin memahami praktik DevOps modern.',
            'start_time' => '2025-08-20 09:00:00',
            'end_time' => '2025-08-20 17:00:00',
            'type' => 'gratis',
            'price' => 0,
            'status' => 'upcoming',
            'image_url' => 'https://images.unsplash.com/photo-1667372393119-3d4c48d07fc9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1170&q=80',
        ]);
    }
}
