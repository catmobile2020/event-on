<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $fillable=['name','zoom_link','meeting_id','start_date','user_id'];

    protected $dates=['start_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
