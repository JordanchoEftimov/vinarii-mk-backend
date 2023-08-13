<?php

namespace App\Models;

use App\Enums\UserRole;
use App\Enums\WineType;
use App\Enums\Country;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'region',
        'vintage',
        'price',
        'wine_type',
        'country',
        'description',
        'alcohol_content',
        'size_liters',
        'user_id',
    ];

    protected $appends = [
        'wine_type_name',
        'country_name',
    ];

    protected $casts = [
        'wine_type' => WineType::class,
        'country' => Country::class,
    ];

    public function wineTypeName(): Attribute
    {
        return Attribute::get(function () {
            return WineType::name($this->wine_type);
        });
    }

    public function countryName(): Attribute
    {
        return Attribute::get(function () {
            return Country::name($this->country);
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFromAuthWinery($query)
    {
        return $query->where('user_id', auth()->id());
    }

    protected static function boot()
    {
        parent::boot();
        self::creating(function (Wine $wine) {
            if (auth()->check() && auth()->user->role === UserRole::WINERY) {
                $wine->user()->associate(auth()->id());
            }
        });
    }
}
