<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Winery extends Model
{
    use HasFactory;

    protected $fillable = [
        'legal_name',
        'logo_image',
        'cover_image',
        'address',
        'email',
        'phone',
        'description',
        'working_hours',
        'user_id',
    ];

    protected $appends = [
        'logo_image_src',
        'cover_image_src',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function wines(): HasMany
    {
        return $this->hasMany(Wine::class);
    }

    public function logoImageSrc(): Attribute
    {
        return Attribute::get(fn () => Storage::url($this->logo_image));
    }

    public function coverImageSrc(): Attribute
    {
        return Attribute::get(fn () => Storage::url($this->cover_image));
    }
}
