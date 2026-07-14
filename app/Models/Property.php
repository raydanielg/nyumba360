<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Property extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'title', 'slug', 'description', 'type', 'status', 'approval_status',
        'region', 'district', 'ward', 'street', 'latitude', 'longitude',
        'rent_amount', 'deposit_amount', 'bedrooms', 'bathrooms', 'area_sqm',
        'is_featured', 'availability_confirmed_at', 'amenities',
        'views_count', 'unlocks_count',
    ];

    protected $casts = [
        'rent_amount' => 'decimal:2',
        'deposit_amount' => 'decimal:2',
        'area_sqm' => 'decimal:2',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
        'is_featured' => 'boolean',
        'amenities' => 'array',
        'availability_confirmed_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($property) {
            if (empty($property->slug)) {
                $property->slug = Str::slug($property->title) . '-' . Str::random(6);
            }
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(PropertyImage::class);
    }

    public function videos(): HasMany
    {
        return $this->hasMany(PropertyVideo::class);
    }

    public function unlocks(): HasMany
    {
        return $this->hasMany(Unlock::class);
    }

    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class);
    }

    public function primaryImage()
    {
        return $this->hasOne(PropertyImage::class)->where('is_primary', true);
    }

    public function isAvailable(): bool
    {
        return $this->status === 'available';
    }

    public function isApproved(): bool
    {
        return $this->approval_status === 'approved';
    }

    public function incrementViews(): void
    {
        $this->increment('views_count');
    }
}
