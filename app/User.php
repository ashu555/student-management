<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','uesrname', 'email', 'password','active','role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->hasOne('App\Role','id','role_id');
    }

    public function checkIfUserHasRole($check_role)
    {
        return (strtolower($check_role) == strtolower($this->role->name)) ? true :null;
    }

    public function hasRole($roles)
    {
        if (is_array($roles))
        {
            foreach($roles as $check_role){
                if ($this->checkIfUserHasRole($check_role))
                {
                    return true;
                }
            }
        }else{
            return $this->checkIfUserHasRole($roles);
        }
        return false;
    }
}
