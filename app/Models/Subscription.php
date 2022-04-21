<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function channels()
    {
        return $this->belongsTo(Channel::class);
    }

}
