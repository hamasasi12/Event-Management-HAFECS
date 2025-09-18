<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageLog extends Model
{
    protected $fillable = [
        'seminar_id',
        'template_id',
        'recipient_count',
        'status',
        'error_message'
    ];

    protected $casts = [
        'recipient_count' => 'integer'
    ];

    public function seminar()
    {
        return $this->belongsTo(Seminar::class);
    }

    public function template()
    {
        return $this->belongsTo(MessageTemplate::class);
    }
}
