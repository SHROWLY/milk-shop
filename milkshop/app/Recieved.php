<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recieved extends Model
{
  public function finds()
    {
        return $this->belongsTo('App\FindModel');
    }
}
