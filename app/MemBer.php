<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemBer extends Model
{
    //
    
    protected $table = "mem_bers";
    
    protected $fillable = ['Usemember','Password', 'Email', 'Fullname','Status'];
    public function new(){
        return $this->belongsTo('App\News','IdNews_FK','IdNews');
    }
}
