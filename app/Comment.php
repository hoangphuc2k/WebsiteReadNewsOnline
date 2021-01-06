<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'comments';

    protected $fillable = ['IdNews_FK','Title','Context','Usemember_FK','Status'];
}
