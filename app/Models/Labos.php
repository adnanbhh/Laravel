<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Labos extends Model
{
    protected $table='Labos';
    protected $fillable =['name','email','post','image','state_id'];

    public function state()
    {
        return $this->belongsTo('App\State');
    }
}
