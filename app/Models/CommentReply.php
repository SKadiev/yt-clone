<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    use HasFactory;

    public function commentOwner()
    {
        return $this->belongsTo(Comment::class, ownerKey: 'reply_on_comment_id');
    }

    public function replyComment()
    {
        return $this->hasOne(Comment::class, 'id', 'comment_id');
    }
}
