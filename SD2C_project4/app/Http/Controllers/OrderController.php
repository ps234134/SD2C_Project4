<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Pizza;
use App\OrderPizza;
use GuzzleHttp\Psr7\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
    $orderPizzas = OrderPizza::all();
    return view('orders.index', compact('orderPizzas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {

       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $request->validate([
            'quantity' => 'required|max:25',
            'pizzaId' => 'required|max:11',
            'size' => 'required|max:20',
            'status' => 'required|max:191',
        ]);
    
        // Create a new order
        $order = new Order([
            'status' => $request->get('status'),
        ]);
        $order->save();
        dd($order);
       


        // Create a new order_pizza
        $orderPizza = new OrderPizza([
            'order_id' => $order->id,
            'quantity' => $request->get('quantity'),
            'pizza_id' => $request->get('pizzaId'),
            'size' => $request->get('size'),
        ]);
        $orderPizza->save();
    
        return redirect('/status')->with('success', 'Order saved.');  
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
        return view('/status', ['id' => $order[$id]], ['order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //not needed
    }

    // public function status(Request $request) {
    //     $pizza_name = $request->input('pizza_name');
    //     $price = $request->input('price');
    //     $size = $request->input('size');
    //     $total_price = $request->input('total_price');

    //     //store in session or pass to view
    //     session(['pizza_name' => $pizza_name]);
    //     session(['price' => $price]);
    //     session(['size' => $size]);
    //     session(['total_price' => $total_price]);
    //     return view('/status', compact('pizza_name', 'price', 'size', 'total_price'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $id)
    {
        // $validatedData = $request->validate([
        //     'order_id' => 'required|exists:orders,id',
        //     'pizza_name' => 'required|exists:pizzas,pizza_name',
        //     'base_price' => 'required|exists:pizzas,base_price',
        //     'quantity' => 'required|excists:order_pizza,quantity',
        //     'size' => 'required',

        // ]);
        // $order = Order::find($id);
        // $order->pizza_name = $request->get('pizza_name');
        // $order->base_price = $request->get('base_price');
        // $order->quantity = $request->get('quantity');

        // $order->save();

        // return redirect('#')
        //     ->with('success', 'Order updated successfully');
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