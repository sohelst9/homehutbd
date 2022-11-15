<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }

    public function galleryImages()
    {
        return $this->hasMany(ProductGallery::class, 'product_id');
    }

    public static function catProductCount($category_id)
    {
        $catCount = Product::where('category_id', $category_id)->count();
        return $catCount;
    }
}
