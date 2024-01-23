<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskComment extends Model
{
    public function task(){
	    return $this->belongsTo('App\Task');
	}

	public function author(){
	     return $this->belongsTo('App\User','user_id');
	}
}
