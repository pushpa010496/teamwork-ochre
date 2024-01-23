<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Klaravel\Ntrust\Traits\NtrustUserTrait;

class User extends Authenticatable
{
      use NtrustUserTrait; 
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected static $roleProfile = 'user';
     
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
       return $this->belongsToMany('App\Role');  
    }

    public function department(){
       return $this->belongsTo('App\Department');  
    }

     public function designation(){
       return $this->belongsTo('App\Designation');  
    }

     /**
     * Get the phone record associated with the user.
     */
    public function salePersion()
    {
        return $this->hasOne('App\CompanyProfile');
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tasks(){

      return $this->hasMany('App\SheduledTask','alloted');

    }

    public function test(){
        return $this->belongsTo('App\Department','department_id ');
    }

}
