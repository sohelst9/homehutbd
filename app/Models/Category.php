<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'banner',
        'meta_title',
        'meta_descp',
    ];


    public function admin(){
        return $this->belongsTo(admin::class,'admin_id');
    }
    public function Subcategory(){
        return $this->hasMany(Subcategory::class, 'category', 'id');
    }
}
