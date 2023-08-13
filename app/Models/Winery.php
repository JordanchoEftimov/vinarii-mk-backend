<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
