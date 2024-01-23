<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
  protected $table = 'company_profiles';
   protected $guarded = [];
  public function Author(){
      return $this->belongsTo('App\User','author_id');
    }
  public function company()
  {
    return $this->belongsTo('App\Company');
  }
  public function user()
  {
      return $this->belongsTo('App\User');
  }
}