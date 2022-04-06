<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sex extends Model
{
    public function posts()   
    {
        return $this->hasMany('App\Post');  
    }
}
