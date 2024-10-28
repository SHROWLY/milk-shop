<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use willvincent\Rateable\Rateable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Notifiable;
    use Rateable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'username', 'email', 'password',];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function finds() {
        return $this->hasMany('App\FindModel');
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
