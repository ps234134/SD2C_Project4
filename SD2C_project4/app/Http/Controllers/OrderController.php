<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Pizza;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:pizzas,id',
            'base_price' => 'required|exists:pizzas,base_price',
            'size' => 'required',
                         
            ]);
    
            // Calculate Order Price
            $pizza = Pizza::find($validatedData['id']);
            $base_price = $validatedData['base_price'];
            $size = $validatedData['size'];


            switch($size){
                case('small'):
                    $size_price = $base_price*0.8;

                break;

                case('medium'):
                    $size_price = $base_price*1;
                break;

                case('large'):
                    $size_price = $base_price*1.2;
                break;

                default:
                return view('#')->with('size', $size)->with('fail', 'something went wrong with choosing a size');
            }

            // Create a new order
            $order = new Order();
            $order->pizza_id = $validatedData['pizza_id'];
            $order->size = $validatedData['size'];
           
            $order->total_price += $size_price;
            $order->save();
    
            // Send the order details to the view
            return view('#')->with('order', $order);
            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
       
        $order = Order::find($request->order_id);
        $pizza = Pizza ::find($request->pizza_id);
        //ataches pizza to order and sets the quantity of the pizza on the order.
        $order->pizzas()->attach($pizza->id, ['quantity' => $request->quantity]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $id)
    {
        $order = Order::find($id);
        return view('#', ['id' => $order[$id]], ['order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect('#')
            ->with('success', 'order deleted successfully');
    }

}
