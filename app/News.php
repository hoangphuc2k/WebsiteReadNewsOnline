<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $table = 'news';
    protected $fillable = ['CateId_FK','Username_FK','Title','Content','Description','KeyWord','Author','Picture'];
    public function listcomment(){
        return $this->hasMany('App\Comment','IdNews_FK','IdNews');
    }
}
