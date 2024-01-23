<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    
    
    protected $guarded = [];
    
    public function companies()
    {
        return $this->hasMany('App\Company','technology_id','id');
    }
    public function company_profiles()
    {
        return $this->hasManyThrough('App\CompanyProfile','App\Company')
                     ->where('fiscal_year',$this->financialyear())->where('deal_amount','!=','0');
    }
    public static function financialyear()
    {
        if(date('m') >= 06) {
            $d = date('Y-m-d', strtotime('+1 years'));
           return date('Y') .'-'.date('Y', strtotime($d));
         } else {
           $d = date('Y-m-d', strtotime('-1 years'));
           return date('Y', strtotime($d)).'-'.date('Y');
         }
    }
    public function filterByCompanyProfile()
    {
        return $this->hasManyThrough('App\CompanyProfile','App\Company');
    }  
}
