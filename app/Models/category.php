<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = [
        'title','slug'
    ];

    function posts(){
        return $this->hasMany(Post::class);
    }

    
}
