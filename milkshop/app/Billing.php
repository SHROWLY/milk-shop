<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{ 
public function finds()
    {
        return $this->belongsTo('App\FindModel');
    }
    public function users()
    {
        return $this->belongsTo('App\FindModel');
    }
}
