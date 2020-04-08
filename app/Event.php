<?php

namespace App;

use App\Filters\EventFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable=['name','description','start_date','end_date','city','active','address','lat','lng','company_id'];

    protected $dates=['start_date','end_date'];

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

    public function scopeFilter($query,EventFilter $filter)
    {
        return $filter->apply($query);
    }

    public function getStatusAttribute()
    {
        if ($this->end_date < today())
        {
            $status = 1; // completed
        }elseif ($this->start_date > today())
        {
            $status = 0; // Not Start Yet
        }else
        {
            $status = 2; // live now
        }
        return $status;
    }

    public function getRemainingTimeAttribute()
    {
        return $this->start_date->diff(now())->format('%dd %hh %im');
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
