<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyComment extends Model
{
    public function company(){
	    return $this->belongsTo('App\Company');
	}

	public function project(){
	    return $this->belongsTo('App\Company');
	}

	public function author(){
	     return $this->belongsTo('App\User','user_id');
	}
}
