<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    public function posts()   
    {
        return $this->hasMany('App\Post');  
    }
}
