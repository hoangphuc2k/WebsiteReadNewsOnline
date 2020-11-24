<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemBer extends Model
{
    //
    protected $guard = 'members';
    
    protected $table = "mem_bers";
    
    protected $fillable = ['Usermember','Password', 'Email', 'Fullname'];
}
