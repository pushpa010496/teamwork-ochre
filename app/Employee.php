<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function departmentrel(){
      return $this->belongsTo('App\Department','department');
    }

    public function designation(){
      return $this->belongsTo('App\Designation','designation');
    }
}
