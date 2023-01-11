<?php

namespace App\Http\Controllers;
<<<<<<< HEAD
=======

>>>>>>> 76b978a5a74f8f2b7b7614d49235a23fa9ccc2fc
use App\Models\Pizza;
use App\Models\Order;
use App\Http\Requests\StorePizzaRequest;
use App\Http\Requests\UpdatePizzaRequest;
<<<<<<< HEAD
use Illuminate\Http\Request;
=======

>>>>>>> 76b978a5a74f8f2b7b7614d49235a23fa9ccc2fc

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pizzas = Pizza::all();
<<<<<<< HEAD
=======

>>>>>>> 76b978a5a74f8f2b7b7614d49235a23fa9ccc2fc
        return view('pizza.menu', ['pizzas' => $pizzas]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {
<<<<<<< HEAD
=======

>>>>>>> 76b978a5a74f8f2b7b7614d49235a23fa9ccc2fc
            $validatedData = $request->validate([
                'pizza_id' => 'required|exists:pizzas,id',
                'size' => 'required',

            ]);

            // Calculate Order Price
            $pizza = Pizza::find($validatedData['pizza_id']);
            $base_price = $pizza->base_price;

            $size_price = $pizza->sizes->where('name', $validatedData['size'])->first()->price;

            $total_price = $base_price + $size_price;

            // Create a new order
            $order = new Order();
            $order->pizza_id = $validatedData['pizza_id'];
            $order->size = $validatedData['size'];
            $order->toppings = isset($validatedData['toppings']) ? json_encode($validatedData['toppings']) : null;
            $order->total_price = $total_price;
            $order->save();

            // Send the order details to the view
            return view('order.confirmation')->with('order', $order);
<<<<<<< HEAD
=======

>>>>>>> 76b978a5a74f8f2b7b7614d49235a23fa9ccc2fc
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePizzaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePizzaRequest $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function show(Pizza $id)
    {
        $pizza = Pizza::find($id);
        return view('#', ['id' => $pizza[$id]], ['pizza' => $pizza]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function edit(Pizza $pizza)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePizzaRequest  $request
     * @param  \App\Models\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePizzaRequest $request, Pizza $pizza)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pizza $pizza)
    {
        //
    }
}
