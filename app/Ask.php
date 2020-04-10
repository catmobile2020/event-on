<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ask extends Model
{
    protected $fillable =['question','speaker_id','event_id','user_id'];

    public function speaker()
    {
        return $this->belongsTo(User::class,'speaker_id')->withDefault();
    }

    public function event()
    {
        return $this->belongsTo(Event::class)->withDefault();
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id')->withDefault();
    }
}
