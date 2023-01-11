@extends('layouts.app-layout')
@section('content')
    <div class="grid grid-cols-2">
        <div class="container flex flex-wrap justify-center py-16 w-full    ">
            <div class="grid grid-cols-3 gap-14">
                @foreach ($pizzas as $pizza)
                    <div class="pizza_menu col-4 py-8 g-white rounded-lg p-4 shadow-md">
                        <div class="relative flex justify-center">
                            <img src="{{ asset($pizza->img) }}" alt="Pizza">
                        </div>
                        <div class="px-2">
                            <div class="mt-4">
                                <h2 class="font-medium">{{ $pizza->pizza_name }}</h2>
                                <label class="block text-sm font-medium text-gray-700 mb-2" for="size">Size:</label>
                                <select
                                    class="block w-full py-2 px-3 border rounded-md bg-white text-gray-700 focus:outline-none focus:border-indigo-300">
                                    <option>Small</option>
                                    <option>Medium</option>
                                    <option>Large</option>
                                </select>
                            </div>
                            <div class="mt-4">
                                <button
                                    class="px-4 py-2 font-medium text-white bg-indigo-500 rounded-md hover:bg-indigo-600 focus:outline-none "onclick="addToOrder({{ $pizza->id }})">
                                    Place Order
                                </button>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
        <div class="container flex flex-wrap justify-center py-16" style="position: relative">
            <div class="bestellingen-card rounded-lg shadow-md bg-gray-100">
                <div class="p-4 flex-col items-end" style="position: sticky; top: 0;">
                    <h2 class="text-lg font-medium">Bestellingen</h2>
                    <div class="mt-2">
                        <p>Total: <span id="total"></span></p>
                    </div>
                    <div class="mt-4">
                        <button class="px-4 py-2 font-medium text-white bg-indigo-500 rounded-md hover:bg-indigo-600 focus:outline-none">Plaats bestelling</button>
                    </div>
                </div>
            </div>
    @endsection
