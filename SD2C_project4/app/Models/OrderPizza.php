<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderPizza extends Model
{
<<<<<<< HEAD
    protected $table = 'order_pizzas';
    protected $fillable = [
        'order_id', 'quantity', 'pizza_id', 'size'
    ];
=======
    use HasFactory;
    protected $guarded = [];
>>>>>>> 0ce7272ef7e43b8735fa9f430253e3794cabe934

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
<<<<<<< HEAD
=======

>>>>>>> 0ce7272ef7e43b8735fa9f430253e3794cabe934
    public function pizza()
    {
        return $this->belongsTo(Pizza::class);
    }
<<<<<<< HEAD
}
=======

    
}



>>>>>>> 0ce7272ef7e43b8735fa9f430253e3794cabe934
