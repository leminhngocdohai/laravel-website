<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products_orders()
    {
        return $this->hasMany(ProductOrder::class, 'orders_id', 'id');
    }
}
