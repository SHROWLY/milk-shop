<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['name'];
	public function finds() {
		return $this->hasMany('App\FindModel');
	}
	public function users() {
		return $this->hasMany('App\User');
	}
}
