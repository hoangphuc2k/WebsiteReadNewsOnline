<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    //
    protected $table = 'SaveNews';
    protected $fillable = ['RoleName','Status'];
    public function listuser(){
        return $this->hasMany('App\User','RoleCode_FK','RoleCode','Status');
    }
}
