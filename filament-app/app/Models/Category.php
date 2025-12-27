<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'parent_id',
        'position',
        'is_visible',
        'seo_title',
        'seo_description',
        'seo_keywords'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->belongsToMany(product::class, 'category_product');
    }
}
