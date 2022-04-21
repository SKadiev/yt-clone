<?php

namespace App\Models;

use App\Classes\AuthUserScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Dislike extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function dislikeable()
    {
        return $this->morphTo();
    }

    public function scopeCurrentUser($query)
    {
        return $query->where('user_id', auth()->id());
    }


}
