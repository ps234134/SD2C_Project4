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
     * Display the specified resource.
     *
     * @param  \App\Models\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function show(Pizza $id)
    {
        $pizza = Pizza::find($id);
        return view('pizza.status', ['id' => $pizza[$id]], ['pizza' => $pizza]);
    }
}
