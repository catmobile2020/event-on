<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    public function rateable()
    {
        return $this->morphTo();
    }
}
