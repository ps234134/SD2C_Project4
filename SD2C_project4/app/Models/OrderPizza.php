<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderPizza extends Model
{
    protected $table = 'order_pizzas';
    protected $fillable = [
        'order_id', 'quantity', 'pizza_id', 'size'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function pizza()
    {
        return $this->belongsTo(Pizza::class);
    }
}