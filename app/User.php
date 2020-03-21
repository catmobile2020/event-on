<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','phone', 'active', 'bio', 'type', 'password', 'reset_token', 'company_id','country_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'reset_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

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

    public function scopeSpeakers($q)
    {
        $q->where('type',1);
    }

    public function registers()
    {
        return $this->hasMany(Register::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class)->withDefault();
    }

    public function country()
    {
        return $this->belongsTo(Country::class)->withDefault();
    }

    public function talks()
    {
        return $this->belongsToMany(Talk::class);
    }

    public function rate()
    {
        return $this->morphMany(Rate::class, 'rateable');
    }

    public function myEvents()
    {
        return $this->belongsToMany(Event::class);
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
