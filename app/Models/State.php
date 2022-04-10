<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
     
    public function laboratoires()
    {
        return $this->hasMany('App\Labos');
    }
}
