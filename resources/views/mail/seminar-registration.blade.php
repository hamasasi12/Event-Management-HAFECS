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
    
    <p>Mohon simpan email ini sebagai bukti pendaftaran Anda.</p>
    
    <p>Jika Anda memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami.</p>
    
    <p>Salam,<br>
    Tim Event Management Hafecs</p>
</body>
</html>