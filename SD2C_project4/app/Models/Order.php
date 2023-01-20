<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pizzas()
    {
        return $this->hasMany(Pizza::class);
    }

    public function orderPizzas()
    {
        return $this->hasMany(OrderPizza::class);
    }
}
