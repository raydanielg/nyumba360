<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LandlordSubscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'payment_id', 'plan_name', 'amount',
        'listing_limit', 'featured_slots', 'starts_at', 'expires_at', 'status',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'starts_at' => 'datetime',
        'expires_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }

    public function isActive(): bool
    {
        return $this->status === 'active' && $this->expires_at > now();
    }
}
