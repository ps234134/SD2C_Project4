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
    }

    public function status (Request $request){

        $order=Order::find($request->orderId);
        // dd($order);

        return view('pizza.status', ['order' => $order]);

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
