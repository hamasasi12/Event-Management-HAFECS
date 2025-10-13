<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'seminar_id',
        'token',
    ];

    protected $casts = [
        'scanned_at' => 'datetime',
    ];

    public function seminar()
    {
        return $this->belongsTo(Seminar::class);
    }

    public function registration()
    {
        return $this->belongsTo(SeminarRegistration::class, 'seminar_registration_id');
    }
}
