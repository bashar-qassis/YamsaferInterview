<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public $timestamps = false;

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function scopeCheapest($query)
    {
        return $query->orderBy('price', 'asc');
    }
}
