<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Trainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'bio',
        'position',
        'skills',
        'image_url',
        'status',
        'title'
    ];

    protected $casts = [
        'skills' => 'array',
    ];

    public function seminars()
    {
        return $this->hasMany(Seminar::class);
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