<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Feedback extends Model
{
    protected $fillable = [
        'q1',
        'q2',
        'q3',
        'q4',
        'comment',
        'user_id',
        'day_id',
    ];

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
