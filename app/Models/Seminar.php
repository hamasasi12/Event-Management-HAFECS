<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Seminar extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_time',
        'end_time',
        'price',
        'status',
        'image_url',
        'type',
        'link',
        'platform',
        'trainer_id',
        'materi',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function scopeUpcoming($query)
    {
        return $query->where('start_time', '>=', now())
            ->orderBy('start_time', 'asc');
    }

    public function registrations()
    {
        return $this->hasMany(SeminarRegistration::class);
    }

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    /**
     * Get the hashid attribute.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function hashid(): Attribute
    {
        return Attribute::make(
            get: fn () => Hashids::encode($this->id),
        );
    }
}
