<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = [
        'category',
        'subcategory',
        'banner',
        'meta_title',
        'meta_descp',
    ];


    public function admin(){
        return $this->belongsTo(admin::class,'added_by');
    }

    public function Category(){
        return $this->belongsTo(Category::class, 'category');
   }

}
