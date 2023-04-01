<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    // all database entries are fillable now
    protected $guarded = [];

    // making a relationship with BlogCategory table
    // blogs `blog_category_id` is has the same value AS blog_categories `id`   
    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id', 'id');
        // `blog_category_id` from blogs table BELONGS TO `id` blog_categories table
    }


    
}
