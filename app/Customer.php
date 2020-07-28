<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
// class Customer extends Model
{
	use Notifiable; //cahap 10
    protected $guarded = [];

    public function setPasswordAttribute($value)
	{
	    $this->attributes['password'] = bcrypt($value);
	}
}
