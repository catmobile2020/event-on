<?php


namespace App\Filters;


class EventFilter extends Filters
{
    protected $var_filters=['month','topic','speaker_id'];

    public function month($value)
    {
        return $this->builder->where(function ($q) use ($value){
            $q->whereMonth('start_date',$value)->orWhereMonth('end_date',$value);
        });
    }

    public function topic($value)
    {
        return $this->builder->where(function ($q) use ($value){
            $q->where('name','like','%'.$value.'%')->orWhere('description','like','%'.$value.'%');
        });
    }

    public function speaker_id($value)
    {
        return $this->builder->whereHas('talks',function ($q) use ($value){
              $q->whereHas('speakers',function ($speaker) use ($value){
                  $speaker->where('id',$value);
              });
        });
    }
}
