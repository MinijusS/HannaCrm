<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    //Creating relationship between sub-categories and posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    //Creating relationship between sub-categories and categories
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
