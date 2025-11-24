<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'seminar_registration_id',
        'order_id',
        'amount',
        'status',
        'snap_token',
        'transaction_id',
        'payment_type',
        'payment_time',
        'payment_details',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'payment_time' => 'datetime',
        'payment_details' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function seminarRegistration()
    {
        return $this->belongsTo(SeminarRegistration::class);
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
