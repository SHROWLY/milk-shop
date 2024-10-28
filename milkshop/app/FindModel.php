<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;
class FindModel extends Model
{   use Taggable;
	 public function user()
    {
        return $this->belongsTo('App\User');
    }  
   public function category()
    {
        return $this->belongsTo('App\Category');
    }
     public function area()
    {
        return $this->belongsTo('App\Area');
    } 
    public function billings()
    {
        return $this->hasMany('App\Billing');
    } 
    public function complaints()
    {
        return $this->hasMany('App\Complaints');
    } 
    public function recieveds()
    {
        return $this->hasMany('App\Recieved');
    } 
}
