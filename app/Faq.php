<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable =['question','answer','active','company_id'];

    public function company()
    {
        return $this->belongsTo(Company::class)->withDefault();
    }
}
