<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function videos()
    {
        return $this->morphedByMany(Video::class, 'commentable');
    }
}
