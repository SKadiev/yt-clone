<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;


    public function likeable()
    {
        return $this->morphTo();
    }

    public function scopeCurrentUser($query)
    {
        return $query->where('user_id', auth()->id());
    }
}
