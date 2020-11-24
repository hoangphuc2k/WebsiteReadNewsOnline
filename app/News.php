<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $table = 'news';
    protected $fillable = ['CateId_FK','Username_FK','Title','Content','Description','KeyWord','Author','Picture'];
}
