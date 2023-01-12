@extends('layouts.app-layout')
@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-2 justify-items-center py-8">
        <div class="pizzas-container grid grid-cols-1 lg:grid-cols-2 gap-20">
            @foreach ($pizzas as $pizza)
                <div class="pizza-card rounded-lg shadow-md bg-white">
                    <div class="relative flex justify-center">
                        <img src="{{ asset($pizza->img) }}" alt="Pizza">
                    </div>
                    <div class="px-2 py-4">
                        <h2 class="font-medium">{{ $pizza->pizza_name }}</h2>
                        <label class="block text-sm font-medium text-gray-700 mb-2" for="size">Size:</label>
                        <select
                            class="block w-full py-2 px-3 border rounded-md bg-white text-gray-700 focus:outline-none focus:border-indigo-300">
                            <option>Small</option>
                            <option>Medium</option>
                            <option>Large</option>
                        </select>
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
        {{-- <div class="shopping-cart-icon" id="shopping-cart" style="position: relative">
            <div>
                <i class="bx bx-cart bx-lg" style="position: sticky; top: 0;"></i>
            </div>
        </div> --}}
        <div class="bottom-sticky">
            <div class="shopping-cart-icon" id="shopping-cart" onclick="showOrders()" style="position: relative">
                <div>
                    <i class="bx bx-cart bx-lg" style="position: sticky; top: 0; color:red;"></i>
                </div>
            </div>
        </div>
        <div class="bestellingen-container" style="position: relative">
            <div class="bestellingen-card rounded-lg shadow-md bg-gray-100" style="position: sticky; top: 0;">
                <h2 class="text-lg font-medium p-4 border-b-2">Bestelling</h2>
                <div class="orders-list p-4 flex-col items-start" style="height: calc(100vh - 200px);">
                    <!-- Orders will be displayed here -->
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio sed in, quaerat magnam harum nihil?
                    Laudantium, sunt. Laudantium possimus ipsum sint saepe aspernatur inventore iure dignissimos enim,
                    consequatur a? Nesciunt!
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quisquam, dolorem minima magni hic a
                    facere cumimpedit, modi laudantium ullam quos. Ut placeat fugiat eum quos libero neque cupiditate
                    architecto.
                </div>
                <div class="p-4 flex-col bg-white">
                    <div class="my-2 font-medium">
                        <p>Totaal <span id="total"></span></p>
                    </div>
                    <div class="mt-4 flex justify-center">
                        <button
                            class="px-4 py-2 font-medium text-white bg-indigo-500 rounded-md hover:bg-indigo-600 focus:outline-none"
                            style="width: 300px">Plaats
                            bestelling</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
