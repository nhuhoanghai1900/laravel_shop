<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['name', 'phone', 'email', 'address', 'note', 'delivery_to_home', 'payment_cod'];

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }
}
