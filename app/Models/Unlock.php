<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Unlock extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'property_id', 'payment_id', 'receipt_number',
        'amount_paid', 'unlocked_at', 'is_refunded',
    ];

    protected $casts = [
        'amount_paid' => 'decimal:2',
        'unlocked_at' => 'datetime',
        'is_refunded' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }
}
