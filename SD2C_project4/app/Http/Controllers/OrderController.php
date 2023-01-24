<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Pizza;

use Illuminate\Http\Request;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
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
    // public function store(StoreOrderRequest $request)
    public function store(Request $request)
    {
        dd($request->all());
        // $items = $request->order[0];
        // foreach($items as $item)
        // {
        //     doe iets met $item 
        // }
     
        // // Validate the request data
        // $request->validate([
        //     'quantity' => 'required',
        //     'pizzaId' => 'required',
        //     'size' => 'required',
        //     'status' => 'required',
        // ]);
       
       
        // Create a new order and save it to the database
        $order = new Order([
            'status' => $request->status,
        ]);
     
        $order->save();
    
        
        $pizza = Pizza::find($request->get('pizzaId'));
    
        // Attach the pizza to the order and save the relationship to the order_pizza table
        $order->pizzas()->attach($pizza, [
            'size' => $request->get('size'),
            'quantity' => $request->get('quantity'),
        ]);
    
        return redirect('/status')->with('success', 'Order placed successfully.');
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
        //not needed
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $id)
    {
       ;
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
