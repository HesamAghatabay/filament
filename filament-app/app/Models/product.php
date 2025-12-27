<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'category_id',
        'is_visible'
    ];
    protected $casts = [
        'is_visible' => 'boolean',
    ];


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }
}
