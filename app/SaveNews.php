<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaveNews extends Model
{
    //
    protected $table = 'savenews';
    protected $fillable = ['iduser','idnews'];

}
