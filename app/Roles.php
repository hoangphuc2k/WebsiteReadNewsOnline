<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    //
    protected $table = 'roles';
    protected $fillable = ['RoleName'];
    public function listuser(){
        return $this->hasMany('App\User','RoleCode_FK','RoleCode');
    }
}
