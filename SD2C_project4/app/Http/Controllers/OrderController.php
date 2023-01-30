<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Pizza;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;




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
        // * will validate everything from the order array, with the given keys after *.
        $request->validate([

            'order.*.quantity' => 'required|numeric',
            'order.*.pizzaId' => 'required|exists:pizzas,id',
            'order.*.size' => 'required|in:Small,Medium,Large',
        ]);


        // Create a new order and save it to the database
        $order = new Order([
            'status' => $request->status,
        ]);
        $order->save();


        try {

            // Create a new order and save it to the database
            $order = new Order([
                'status' => $request->status,
            ]);
            $order->save();

            // reads values from order array and saves them as seperate variables to make a db entry in order_pizza
            foreach ($request->order as $orderItem) {
                $quantity = $orderItem['quantity'];
                $pizzaId = $orderItem['pizzaId'];
                $size = $orderItem['size'];

                $pizza = Pizza::find($pizzaId);
                $order->pizzas()->attach($pizza, ['quantity' => $quantity, 'size' => $size,]);
            }

            // adds orderId with the value of the id from $order
            return redirect()->route('order.show', ['orderId' => $order->id]);
        } catch (\Throwable $th) {

            return redirect()->back()->with('error', 'Error message')->with('alert', 'alert("Plaats uw order")');
        }
    }

    public function status(Request $request)
    {

        $order = Order::find($request->orderId);
        foreach ($order->pizzas as $pizza) {
            switch ($pizza->pivot->size) {
                case 'Small':
                    $pizza->calculated_price = $pizza->base_price * 0.8;
                    break;
                case 'Medium':
                    $pizza->calculated_price = $pizza->base_price;
                    break;
                case 'Large':
                    $pizza->calculated_price = $pizza->base_price * 1.2;
                    break;
                default:
                    $pizza->calculated_price = $pizza->base_price;
            }
        }
        return view('pizza.status', ['order' => $order]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        // Delete all the order_pizza relationships associated with the order
        $order->pizzas()->detach();

        // Delete the order
        $order->delete();

        return redirect('/home')->with('success', 'Bestelling verwijderd.');
    }
}
