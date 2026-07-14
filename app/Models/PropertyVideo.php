<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertyVideo extends Model
{
    use HasFactory;

    protected $fillable = ['property_id', 'video_path', 'thumbnail_path'];

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
