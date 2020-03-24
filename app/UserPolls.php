<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPolls extends Model
{
    protected $fillable =['poll_option_id','poll_id','user_id'];
}
