<?php

namespace App\Models;

use App\Enums\Country;
use App\Enums\UserRole;
use App\Enums\WineType;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

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
        'winery_id',
        'image',
    ];

    protected $appends = [
        'wine_type_name',
        'country_name',
        'main_image_src',
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

    public function mainImageSrc(): Attribute
    {
        return Attribute::get(function () {
            return Storage::url($this->image);
        });
    }

    public function winery(): BelongsTo
    {
        return $this->belongsTo(Winery::class);
    }

    public function scopeFromAuthWinery($query)
    {
        return $query->where('winery_id', auth()->user()->winery->id);
    }

    protected static function boot()
    {
        parent::boot();
        self::creating(function (Wine $wine) {
            if (auth()->check() && auth()->user()->role === UserRole::WINERY) {
                $wine->winery()->associate(auth()->user()->winery()->id);
            }
        });
    }
}
