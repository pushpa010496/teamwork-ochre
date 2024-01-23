<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	public function teams(){
		return $this->belongsToMany('App\Team');
	}

	public function client(){
		return $this->belongsTo('App\Client','client_id');
	}

	public function employees(){
		return $this->belongsToMany('App\User');
	}

	public function tasks(){
		return $this->hasMany('App\Task');
	}

	public function comments(){
		return $this->hasMany('App\ProjectComment')->orderBy('id','desc');
	}
	
}
