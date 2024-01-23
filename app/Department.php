<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
   public function employeree(){
      return $this->hasMany('App\Employee','department');
    }

    public function head(){
      return $this->belongsTo('App\User','dept_head');
    }

    public function employerees(){
      return $this->hasMany('App\User');
    }
   
}
