<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Pizza;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class OrderController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StoreOrderRequest $request)
    public function store(Request $request)
    {
        try {

            // dd($request->all());

            // Create a new order and save it to the database
            $order = new Order([
                'status' => $request->status,
            ]);
            $order->save();

            // reads values from order array and saves them as seperate variables to make a db entry in order_pizza
            foreach ($request->order as $orderItem) {
                //  dd($order);
                $quantity = $orderItem['quantity'];
                $pizzaId = $orderItem['pizzaId'];
                $size = $orderItem['size'];
                // dd($size);  

                $pizza = Pizza::find($pizzaId);
                $order->pizzas()->attach($pizza, ['quantity' => $quantity, 'size' => $size,]);
            }

            // // Validate the request data
            // $request->validate([
            //     'quantity' => 'required',
            //     'pizzaId' => 'required',
            //     'size' => 'required',
            //     'status' => 'required',
            // ]);

            // adds orderId with the value of the id from $order
            return redirect()->route('order.show', ['orderId' => $order->id]);
        } catch (\Throwable $th) {

            return redirect()->back()->with('error', 'Error message')->with('alert', 'alert("Plaats uw order")');
        }
    }

    public function status(Request $request)
    {

        $order = Order::find($request->orderId);
        // dd($order);

        return view('pizza.status', ['order' => $order]);
    }
}
