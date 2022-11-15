<?php

namespace App\Models\Frontend;

use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];
    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function colors(){
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function sizes(){
        return $this->belongsTo(Size::class, 'size_id');
    }
}
