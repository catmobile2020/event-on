<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable =['name','active'];

    public function scopeActive($q)
    {
        $q->where('active',1);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }

}
