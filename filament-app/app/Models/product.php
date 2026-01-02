<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class product extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'name',
        'slug',
        'description',
        'category_id',
        'is_visible',
        'image',
        'alt'
    ];
    protected $casts = [
        'is_visible' => 'boolean',
        'image' => 'string',
        'description' => 'array',
    ];


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }

    protected static function booted(): void
    {
        // این بخش وقتی اجرا می‌شود که رکورد "کاملاً" (Force Delete) پاک شود
        static::forceDeleted(function (Product $product) {
            if (! is_null($product->image) && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
        });
    }
}
