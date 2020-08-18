<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Creating relationship between post and category
    public function categories()
    {
        return $this->hasOne(Category::class);
    }

    //Creating relationship between post and sub-category
    public function subCategories()
    {
        return $this->hasOne(SubCategory::class);
    }
}
