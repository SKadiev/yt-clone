<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    private const CHANEL_PHOTO_DIRECTORY = 'photos/';

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($value) => asset(self::CHANEL_PHOTO_DIRECTORY . $value),
        );
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
