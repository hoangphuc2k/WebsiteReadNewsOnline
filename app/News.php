<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $table = 'news';

    protected $primaryKey = 'IdNews';
    
    protected $fillable = ['CateId_FK','id_user_FK','Title','Content','Description','KeyWord','Author','Picture'];
    public function listcomment(){
        return $this->hasMany('App\Comment','IdNews_FK','IdNews');
    }
}
