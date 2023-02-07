<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function PizzaPrice($size) {
        if($size == 'Small'){
            return $this->base_price * 0.8;
        } else
        if($size == 'Medium'){
            return $this->base_price * 1;
        } else {
            return $this->base_price * 1.2;
        }
    }
}
