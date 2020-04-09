<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $fillable=['title','date','active','event_id'];
protected $dates=['date'];
    public function image()
    {
        return $this->morphOne('App\Image', 'imageable')->withDefault();
    }
    public function getPhotoAttribute()
    {
        if ($this->image->url)
            return $this->image->full_url;
        return null;
    }

    public function scopeActive($q)
    {
        $q->where('active',1);
    }

    public function event()
    {
        return $this->belongsTo(Event::class)->withDefault();
    }

    public function talks()
    {
        return $this->hasMany(Talk::class);
    }

    public function rate()
    {
        return $this->morphMany(Rate::class, 'rateable');
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }

    public function trash()
    {
        $photo = public_path().$this->image->url;
        if (is_file($photo))
        {
            @unlink($photo);
            $this->image()->delete();
        }
        $this->delete();
    }
}
