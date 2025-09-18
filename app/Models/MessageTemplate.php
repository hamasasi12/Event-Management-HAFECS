<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageTemplate extends Model
{
    protected $fillable = [
        'name',
        'subject',
        'content',
        'is_default'
    ];

    protected $casts = [
        'is_default' => 'boolean'
    ];

    // Allow creating instances without saving to database
    public $exists = false;
}
