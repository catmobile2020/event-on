<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name','active','country_id'];

    public function country()
    {
        return $this->belongsTo(Country::class)->withDefault();
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
