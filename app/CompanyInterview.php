<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyInterview extends Model
{
    protected $guarded = [];
     public function company()
	  {
	    return $this->belongsTo('App\Company','company_id');
	  }
}
