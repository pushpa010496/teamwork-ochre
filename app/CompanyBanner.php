<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyBanner extends Model
{
    protected $table = 'company_banners';
     protected $guarded = [];
      public function company()
	  {
	    return $this->belongsTo('App\Company','company_id');
	  }
}
