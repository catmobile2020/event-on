<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable=['name','description','start_date','end_date','city','active','address','lat','lng','company_id'];

    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }

    public function getPhotoAttribute()
    {
        if (isset($this->image->url))
            return $this->image->full_url;
        return null;
    }

    public function scopeActive($q)
    {
        $q->where('active',1);
    }

    public function company()
    {
        return $this->belongsTo(Company::class)->withDefault();
    }

    public function days()
    {
        return $this->hasMany(Day::class);
    }

    public function rate()
    {
        return $this->morphMany(Rate::class, 'rateable');
    }

    public function admins()
    {
        return $this->belongsToMany(Admin::class);
    }

    public function talks()
    {
        return $this->hasManyThrough(Talk::class,Day::class)->has('speakers')->with('speakers');
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
