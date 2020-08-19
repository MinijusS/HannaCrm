<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'category_id', 'subcategory_id', 'description'];

    //Creating relationship between post and category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //Creating relationship between post and sub-category
    public function subCategories()
    {
        return $this->hasOne(SubCategory::class);
    }
}
