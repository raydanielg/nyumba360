<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable(['name', 'email', 'password', 'role', 'phone', 'region', 'district', 'property_type_preference', 'budget_range', 'bio', 'preferred_wards', 'min_rooms', 'move_timeline', 'priorities'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'preferred_wards' => 'array',
        'priorities' => 'array',
    ];

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class);
    }

    public function unlocks(): HasMany
    {
        return $this->hasMany(Unlock::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class);
    }

    public function kyc(): HasOne
    {
        return $this->hasOne(KycDocument::class);
    }

    public function brokerPasses(): HasMany
    {
        return $this->hasMany(BrokerPass::class);
    }

    public function activeBrokerPass(): HasOne
    {
        return $this->hasOne(BrokerPass::class)->where('status', 'active')->where('expires_at', '>', now())->latest();
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(LandlordSubscription::class);
    }

    public function activeSubscription(): HasOne
    {
        return $this->hasOne(LandlordSubscription::class)->where('status', 'active')->where('expires_at', '>', now())->latest();
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isLandlord(): bool
    {
        return $this->role === 'landlord';
    }

    public function isBroker(): bool
    {
        return $this->role === 'broker';
    }

    public function isSeeker(): bool
    {
        return $this->role === 'tenant';
    }

    public function isKycVerified(): bool
    {
        return $this->kyc && $this->kyc->status === 'approved';
    }

    public function hasUnlocked(Property $property): bool
    {
        return $this->unlocks()->where('property_id', $property->id)->exists();
    }

    public function hasFavorited(Property $property): bool
    {
        return $this->favorites()->where('property_id', $property->id)->exists();
    }
}
