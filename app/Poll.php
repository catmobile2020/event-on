<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $fillable =['question','user_id'];

    public function speaker()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function options()
    {
        return $this->hasMany(PollOption::class);
    }

    public function userPolls()
    {
        return $this->hasMany(UserPolls::class);
    }
}
