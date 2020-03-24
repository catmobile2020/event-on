<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{
    protected $fillable=['title','desc','location','time_from','time_to','active','day_id'];

    public function scopeActive($q)
    {
        $q->where('active',1);
    }

    public function day()
    {
      return $this->belongsTo(Day::class)->withDefault();
    }

    public function speakers()
    {
        return $this->belongsToMany(User::class);
    }

    public function rates()
    {
        return $this->morphMany(Rate::class, 'rateable');
    }

    public function getTotalRateAttribute()
    {
        return $this->rates()->count()  ? $this->rates()->sum('rate') / $this->rates()->count() : 'Not Have Rate Yet!';
    }
}
