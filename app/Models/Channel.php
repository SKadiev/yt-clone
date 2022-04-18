<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    private const CHANEL_PHOTO_DIRECTORY = 'photos/';
    const DEFAULT_USER_IMG = 'default_user.jpg';

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
        $channelImagePath = $this->channelImage->path ?? self::DEFAULT_USER_IMG;

        return Attribute::make(
            get: fn($value) => asset(self::CHANEL_PHOTO_DIRECTORY . $channelImagePath),
        );
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function channelImage()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function subscribers()
    {
        return $this->subscriptions()->count();
    }

}
