<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function getRouteKeyName()
    {
        return 'uid';
    }

    public function getThumbnailAttribute()
    {
        return asset('thumnails/' . $this->image?->path);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function scopePublicVideos(Builder $query)
    {
        return $query->where('visibility', 'public');
    }

    public function comments()
    {
        return $this->morphToMany(Comment::class, 'commentable');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function dislikes()
    {
        return $this->hasMany(Dislike::class);
    }


    public function getUploatedDateAttribute()
    {
        $d = new Carbon($this->created_at);
        return $d->toFormattedDateString();
    }

    public function doesUserLikeVideo()
    {
        return $this->likes()->whereUserId(auth()->id())->exists();
    }

    public function doesUserDislikeVideo()
    {
        return $this->dislikes()->whereUserId(auth()->id())->exists();
    }


}
