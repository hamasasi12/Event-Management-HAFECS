<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeminarRegistration extends Model
{
    use HasFactory;

   protected $fillable = [
    'user_id',
    'seminar_id',
    'name',
    'email',
    'phone',
    'jenjang_sekolah',
    'asal_sekolah',
    'jabatan',
    'kota_kabupaten',
    'provinsi',
    'ulasan',
    'is_paid',
    'attendance_status',
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function seminar()
    {
        return $this->belongsTo(Seminar::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
