<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    //
    public function employeree(){
      return $this->hasMany('App\User');
    }
}
