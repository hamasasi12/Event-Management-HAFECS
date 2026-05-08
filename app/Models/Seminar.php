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
        'slug',
        'event_type',
        'description',
        'details',
        'materi',
        'start_time',
        'end_time',
        'registration_start',
        'registration_end',
        'price',
        'discount_price',
        'discount_until',
        'capacity',
        'type',
        'link',
        'platform',
        'location',
        'is_featured',
        'has_certificate',
        'status',
        'image_url',
        'trainer_id',
        'custom_trainer_name',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'registration_start' => 'datetime',
        'registration_end' => 'datetime',
        'discount_until' => 'datetime',
        'is_featured' => 'boolean',
        'has_certificate' => 'boolean',
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

    /**
     * Get the slug attribute from the title.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function slug(): Attribute
    {
        return Attribute::make(
            get: fn () => \Illuminate\Support\Str::slug($this->title),
        );
    }
}
