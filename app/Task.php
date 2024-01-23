<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
     public function taskrel(){
      return $this->hasMany('App\SheduledTask','task_id');
    }

    public function project(){
	    return $this->belongsTo('App\Project');
	}

	public function employees(){
	     return $this->belongsToMany('App\User');
	}

	public function movedBy(){
	     return $this->belongsTo('App\User','moved_by');
	}

	public function comments(){
	     return $this->hasMany('App\TaskComment')->orderBy('id','desc');
	}

}
