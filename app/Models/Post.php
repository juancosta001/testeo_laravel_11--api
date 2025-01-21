<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','slug','content','category_id','description','posted','image'

    ];
    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = $value ? Str::slug($value) : Str::slug($this->attributes['title']);
    }
}
