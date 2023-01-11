<?php

namespace App\Http\Controllers;
<<<<<<< HEAD
use App\Models\Pizza;
use App\Http\Requests\StorePizzaRequest;
use App\Http\Requests\UpdatePizzaRequest;
=======
use Illuminate\Http\Request;
>>>>>>> main

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        $pizzas = Pizza::all();
        return view('#', ['pizzas' => $pizzas]);
=======
        return view('pizza.index');
>>>>>>> main
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function create($request)
    {
        {
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
        }

=======
    public function create()
    {
        //
>>>>>>> main
    }

    /**
     * Store a newly created resource in storage.
     *
<<<<<<< HEAD
     * @param  \App\Http\Requests\StorePizzaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePizzaRequest $request)
    {

=======
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
>>>>>>> main
    }

    /**
     * Display the specified resource.
     *
<<<<<<< HEAD
     * @param  \App\Models\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function show(Pizza $id)
    {
        $pizza = Pizza::find($id);
        return view('#', ['id' => $pizza[$id]], ['pizza' => $pizza]);
=======
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
>>>>>>> main
    }

    /**
     * Show the form for editing the specified resource.
     *
<<<<<<< HEAD
     * @param  \App\Models\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function edit(Pizza $pizza)
=======
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
>>>>>>> main
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
<<<<<<< HEAD
     * @param  \App\Http\Requests\UpdatePizzaRequest  $request
     * @param  \App\Models\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePizzaRequest $request, Pizza $pizza)
=======
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
>>>>>>> main
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
<<<<<<< HEAD
     * @param  \App\Models\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pizza $pizza)
=======
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
>>>>>>> main
    {
        //
    }
}
