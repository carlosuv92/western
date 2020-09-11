<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table='role_user';

    protected $fillable = [
        'user_id','role_id'
    ];

    public function user(){
        return $this->belongsToMany('App\User', 'id', 'user_id');
    }

    public function role(){
        return $this->belongsToMany('App\Role', 'id', 'role_id');
    }
}
