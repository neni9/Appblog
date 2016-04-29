<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    	protected $fillable = ['name','uri','post_id','size','mime'];
	
     public function post()
     {
         return $this->hasOne('App\Post');
     }
}
