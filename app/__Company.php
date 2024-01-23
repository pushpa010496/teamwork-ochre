<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\subCategory;
class Company extends Model
{
	public function Author(){
      return $this->belongsTo('App\User','author_id');
    }
   	public function companyprofile(){
	    return $this->hasMany('App\CompanyProfile');
	}
	public function companycatalogs()
	{
	    return $this->hasMany('App\CompanyCatalog');
	}
	public function companypress()
	{
	    return $this->hasMany('App\CompanyPressrealese');
	}
	public function companywp()
	{
	    return $this->hasMany('App\CompanyWhitepaper');
	}
	public function companyvideo()
	{
	    return $this->hasMany('App\CompanyVideo');
	}
	public function companyproduct()
	{
	    return $this->hasMany('App\Product');
	}
}