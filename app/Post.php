<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function getPaginateByLimit(int $limit_count = 5)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function sex()
    {
        return $this->belongsTo('App\Sex');
    }
    
    public function breed()
    {
        return $this->belongsTo('App\Breed');
    }
    
    public function area()
    {
        return $this->belongsTo('App\Area');
    }
    
    public function size()
    {
        return $this->belongsTo('App\Size');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    protected $fillable = [
    'image_path',
    'name',
    'backgrooud',
    'personality',
    'condition',
    'period',
    'age',
    'sex_id',
    'breed_id',
    'area_id',
    'size_id',
    'fix',
    'vaccine',
    'adopt',
    'user_id',
    ];
}