<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable=['name','website','description','active','token'];

    public function image()
    {
        return $this->morphOne('App\Image', 'imageable')->withDefault();
    }
    public function getLogoAttribute()
    {
        if ($this->image->url)
            return $this->image->full_url;
        return null;
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function speakers()
    {
        return $this->users()->where('type','=',1);
    }

    public function attendees()
    {
        return $this->users()->where('type','=',2);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class);
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
