<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Creating relationship between categories and posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    //Creating relationship between categories and sub-categories
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
