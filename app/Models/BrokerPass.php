<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BrokerPass extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'payment_id', 'starts_at', 'expires_at',
        'status', 'auto_renew',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'expires_at' => 'datetime',
        'auto_renew' => 'boolean',
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

    public function daysRemaining(): int
    {
        return max(0, now()->diffInDays($this->expires_at, false));
    }
}
