<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Pendaftaran Seminar</title>
</head>
<body>
    <h2>Halo {{ $registration->name }},</h2>
    
    <p>Terima kasih telah mendaftar untuk mengikuti seminar kami. Berikut adalah detail pendaftaran Anda:</p>
    
    <table>
        <tr>
            <td><strong>Nama Seminar:</strong></td>
            <td>{{ $seminar->title }}</td>
        </tr>
        <tr>
            <td><strong>Nama Peserta:</strong></td>
            <td>{{ $registration->name }}</td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td>{{ $registration->email }}</td>
        </tr>
        <tr>
            <td><strong>No. Telepon:</strong></td>
            <td>{{ $registration->phone }}</td>
        </tr>
        <tr>
            <td><strong>Link Zoom/Gmeet:</strong></td>
            <td>{{ $seminar->link }}</td>
        </tr>
        <tr>
            <td><strong>Waktu Mulai:</strong></td>
            <td>{{ $seminar->start_time->format('d M Y H:i') }}</td>
        </tr>
        <tr>
            <td><strong>Waktu Selesai:</strong></td>
            <td>{{ $seminar->end_time->format('d M Y H:i') }}</td>
        </tr>
    </table>

    @if($password)
    <div style="margin-top: 25px; padding: 15px; border: 1px solid #e2e8f0; background-color: #f8fafc; border-radius: 8px;">
        <h3 style="margin-top: 0; color: #1e293b;">Informasi Akun Anda</h3>
        <p style="margin-bottom: 5px;">Kami telah membuatkan akun otomatis untuk Anda agar bisa mengakses materi seminar di Dashboard:</p>
        <ul style="list-style: none; padding-left: 0;">
            <li><strong>Email:</strong> {{ $registration->email }}</li>
            <li><strong>Password:</strong> {{ $password }}</li>
        </ul>
        <p style="font-size: 0.875rem; color: #64748b; margin-top: 10px;"><em>*Demi keamanan, mohon segera ubah password Anda di halaman profil setelah login.</em></p>
    </div>
    @endif
    
    <p style="margin-top: 20px;">Mohon simpan email ini sebagai bukti pendaftaran Anda.</p>
    
    <p>Jika Anda memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami.</p>
    
    <p>Salam,<br>
    Tim Event Management Hafecs</p>
</body>
</html>