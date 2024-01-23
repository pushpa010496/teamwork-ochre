<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Klaravel\Ntrust\Traits\NtrustPermissionTrait;

class Permission extends Model
{
	use NtrustPermissionTrait;
    
    /*
     * Role profile to get value from ntrust config file.
     */
    protected $fillable = ['name','display_name','description'];
    protected static $roleProfile = 'user';
}
