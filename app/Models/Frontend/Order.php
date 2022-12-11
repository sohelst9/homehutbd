<?php

namespace App\Models\Frontend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $guarded = [];

    public function OrderProductDetails()
    {
        return $this->hasMany(OrderProductDetails::class, 'order_id', 'id');
    }
}
