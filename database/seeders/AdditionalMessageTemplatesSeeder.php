<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MessageTemplate;

class AdditionalMessageTemplatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MessageTemplate::create([
            'name' => 'Pengingat 15 Menit',
            'subject' => 'Pengingat: Seminar {{ $seminar->title }} akan dimulai dalam 15 menit',
            'content' => '<p>Halo {{ $registration->name }},</p>
<p>Kami ingin mengingatkan bahwa seminar <strong>{{ $seminar->title }}</strong> akan segera dimulai dalam 15 menit.</p>
<p><strong>Detail Seminar:</strong></p>
<ul>
    <li>Judul: {{ $seminar->title }}</li>
    <li>Waktu: {{ $seminar->start_time->format("d M Y H:i") }}</li>
    <li>Link: {{ $seminar->link }}</li>
</ul>
<p>Mohon untuk segera bergabung dengan link di atas.</p>
<p>Terima kasih atas partisipasi Anda.</p>
<p>Salam,<br>Tim Event Management Hafecs</p>',
            'is_default' => false
        ]);

        MessageTemplate::create([
            'name' => 'Pengingat 1 Hari',
            'subject' => 'Pengingat: Seminar {{ $seminar->title }} besok',
            'content' => '<p>Halo {{ $registration->name }},</p>
<p>Kami ingin mengingatkan bahwa seminar <strong>{{ $seminar->title }}</strong> akan diselenggarakan besok.</p>
<p><strong>Detail Seminar:</strong></p>
<ul>
    <li>Judul: {{ $seminar->title }}</li>
    <li>Waktu: {{ $seminar->start_time->format("d M Y H:i") }}</li>
    <li>Link: {{ $seminar->link }}</li>
</ul>
<p>Jangan lupa untuk mengikuti seminar tersebut.</p>
<p>Terima kasih atas partisipasi Anda.</p>
<p>Salam,<br>Tim Event Management Hafecs</p>',
            'is_default' => false
        ]);
    }
}
