<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable=['rate','comment','user_id'];

    public function rateable()
    {
        return $this->morphTo();
    }
}
