<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Score extends Authenticatable
{
    public function posts() {
        
        return $this->belongsTo('App\Post');
    }
}
