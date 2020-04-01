<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    protected $fillable =['value','type'];

    public function image()
    {
        return $this->morphOne('App\Image', 'imageable')->withDefault();
    }
    public function getPhotoAttribute()
    {
        if ($this->image->url)
            return $this->image->full_url;
        return asset('assets/admin/images/default-image.jpg');
    }
}
