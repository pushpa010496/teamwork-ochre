<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    //
    public function companys(){
      return $this->belongsTo('App\Company','company');
    }
}
