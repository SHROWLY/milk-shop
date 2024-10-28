<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaints extends Model
{
   public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function finds()
    {
        return $this->belongsTo('App\FindModel');
    }
}
