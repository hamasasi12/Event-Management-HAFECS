<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MessageTemplate;

class MessageTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MessageTemplate::create([
            'name' => 'Pengingat Seminar',
            'subject' => 'Pengingat: Seminar {{ $seminar->title }} akan segera dimulai',
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
            'is_default' => true
        ]);

        MessageTemplate::create([
            'name' => 'Konfirmasi Pendaftaran',
            'subject' => 'Konfirmasi Pendaftaran Seminar - {{ $seminar->title }}',
            'content' => '<p>Halo {{ $registration->name }},</p>
<p>Terima kasih telah mendaftar untuk mengikuti seminar kami. Berikut adalah detail pendaftaran Anda:</p>
<p><strong>Detail Seminar:</strong></p>
<ul>
    <li>Nama Seminar: {{ $seminar->title }}</li>
    <li>Nama Peserta: {{ $registration->name }}</li>
    <li>Email: {{ $registration->email }}</li>
    <li>No. Telepon: {{ $registration->phone }}</li>
    <li>Link Zoom/Gmeet: {{ $seminar->link }}</li>
    <li>Waktu Mulai: {{ $seminar->start_time->format("d M Y H:i") }}</li>
    <li>Waktu Selesai: {{ $seminar->end_time->format("d M Y H:i") }}</li>
</ul>
<p>Mohon simpan email ini sebagai bukti pendaftaran Anda.</p>
<p>Jika Anda memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami.</p>
<p>Salam,<br>Tim Event Management Hafecs</p>',
            'is_default' => false
        ]);
    }
}
