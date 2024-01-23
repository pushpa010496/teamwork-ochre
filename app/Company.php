<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    protected $guarded = [];
    
    public function comments(){
		return $this->hasMany('App\CompanyComment')->orderBy('id','desc');
	}
		public function enquiry(){
	    return $this->hasMany('App\Enquiry');
    }
    public function technologie()
    {
        return $this->belongsTo(Technology::class);
    }

    public function tech()
    {
        return $this->hasOne(Technology::class);
    }
    public function salespersoninfo()
    {
        return $this->belongsTo(User::class);
    }
    public function profile()
    {
        return $this->hasOne('App\CompanyProfile');
    }
    public function profiles()
    {
        return $this->hasMany('App\CompanyProfile');
    }
     public function latestprofiles()
    {
        return $this->hasMany('App\CompanyProfile')->latest();
    }
    public function getCompanyIds()
    {
        return $this->profiles->pluck('id');
    }

    public function banners()
    {
        return $this->hasMany('App\CompanyBanner');
    }
    public function newslatters()
    {
        return $this->hasMany('App\CompanyNewsletter');
    }
    public function articles()
    {
        return $this->hasMany('App\CompanyArticle');
    }
    public function interviews()
    {
        return $this->hasMany('App\CompanyInterview');
    }
    public function emailmarketings()
    {
        return $this->hasMany('App\CompanyEmailMarketing');
    }
    public function contentmarketings()
    {
        return $this->hasMany('App\CompanyContentMarketing');
    }
    public function webinars()
    {
        return $this->hasMany('App\CompanyWebinar');
    }
    public function socialmediamarketings()
    {
         return $this->hasMany('App\CompanySocialMediaMarketing');
    }
    public function guaranteeds()
    {
         return $this->hasMany('App\CompanyRFQ');
    }

}
