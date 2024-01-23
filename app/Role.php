<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Klaravel\Ntrust\Traits\NtrustRoleTrait;

class Role extends Model
{
   use NtrustRoleTrait;

    /*
     * Role profile to get value from ntrust config file.
     */
    protected $fillable = ['name','display_name','description'];
    protected static $roleProfile = 'user';
}
