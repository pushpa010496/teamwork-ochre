<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function employees(){
	     return $this->belongsToMany('App\User');
	}

	public function department(){
	    return $this->belongsTo('App\Department');
	}

}
