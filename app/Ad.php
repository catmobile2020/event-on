<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable=['is_image','video_url','active','company_id'];

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

    public function company()
    {
        return $this->belongsTo(Company::class)->withDefault();
    }

    public function scopeActive($q)
    {
        $q->where('active',1);
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
