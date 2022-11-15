<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable =[
        'name',
        'logo',
        'meta_title',
        'meta_descp',
    ];
    public function admin(){
        return $this->belongsTo(admin::class, 'added_by');
    }
}
