<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function dislikes()
    {
        return $this->morphMany(Dislike::class, 'dislikeable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function doesUserLikeComment()
    {
        return $this->likes()
            ->whereUserId(auth()->id())
            ->where('likeable_type', Comment::class)->exists();
    }

    public function doesUserDislikeComment()
    {
        return $this->dislikes()
            ->whereUserId(auth()->id())
            ->where('dislikeable_type', Comment::class)->exists();
    }

    public function replies()
    {
        return $this->hasMany(CommentReply::class, 'reply_on_comment_id');
    }
}
