<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyArticle extends Model
{
	 protected $guarded = [];
  
    public function company()
    {
    	return $this->belongsTo('App\Company');
    }
}
