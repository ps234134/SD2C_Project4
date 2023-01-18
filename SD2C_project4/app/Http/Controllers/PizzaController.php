<?php

namespace App\Http\Controllers;



use App\Models\Pizza;
use App\Models\Order;
use App\Http\Requests\StorePizzaRequest;
use App\Http\Requests\UpdatePizzaRequest;

use Illuminate\Http\Request;



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
        return view('pizza.menu', ['pizzas' => $pizzas]);

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

    public function status(Request $request) {
        $pizza_name = $request->input('pizza_name');
        $price = $request->input('price');
        $size = $request->input('size');
        $total_price = $request->input('total_price');

        //store in session or pass to view
        session(['pizza_name' => $pizza_name]);
        session(['price' => $price]);
        session(['size' => $size]);
        session(['total_price' => $total_price]);
        return view('/status', compact('pizza_name', 'price', 'size', 'total_price'));

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
