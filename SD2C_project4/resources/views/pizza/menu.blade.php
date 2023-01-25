@extends('layouts.app-layout')
@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-2 justify-items-center py-8">
        <div class="pizzas-container grid grid-cols-1 md:grid-cols-2 gap-20">
            @foreach ($pizzas as $pizza)
                <div class="pizza-card rounded-lg shadow-md bg-white">
                    <div class="relative flex justify-center">
                        <img id="pizza-img-{{ $pizza->id }}" src="{{ asset($pizza->img) }}" alt="Pizza">
                    </div>
                    <script>
                        let basePrices = {};
                    </script>
                    <div class="px-2 py-4">
                        <div class="flex justify-between text-justify">
                            <h2 class="font-medium" id="pizza-{{ $pizza->id }}">{{ $pizza->pizza_name }}</h2>
                            <p class="text-m" id="price-{{ $pizza->id }}">€{{ $pizza->base_price }}</p>
                        </div>
                        <label class="block text-sm font-medium text-gray-700 mb-2" for="size">Size:</label>
                        <select
                            class="block w-full py-2 px-3 border rounded-md bg-white text-gray-700 focus:outline-none focus:border-indigo-300"
                            onchange="updatePrice({{ $pizza->id }}, this.value)" id="size-{{ $pizza->id }}">
                            <option value="1">Medium</option>
                            <option value="0.8">Small</option>
                            <option value="1.2">Large</option>
                        </select>
                        <div class="mt-4">
                            <button
                                class="px-4 py-2 font-medium text-white bg-indigo-500 rounded-md hover:bg-indigo-600 focus:outline-none"onclick="addToOrder({{ $pizza->id }})">
                                Toevoegen
                            </button>
                        </div>
                        <script>
                            // Store the base price of the pizza in the basePrices object when the page loads
                            basePrices[{{ $pizza->id }}] = {{ $pizza->base_price }};
                        </script>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="bottom-sticky">
            <div class="shopping-cart-icon" id="shopping-cart" onclick="showOrders()" style="position: relative">
                <span class="cart-quantity font-bold" id="cart-quantity">0</span>
                <div>
                    <i class="bx bx-cart bx-lg" style="position: sticky; top: 0; color:red;"></i>
                </div>
            </div>
        </div>

        <div class="bestellingen-container">
            <div class="bestellingen-card rounded-lg shadow-md bg-gray-100" style="position: sticky; top: 0;">
                <h2 class="text-lg font-medium p-4 border-b-2">Bestelling</h2>


                <form action="{{ route('pizza.order') }}" method="POST">
                    @csrf
                    <input type="hidden" name="status" value="Word bereid">

                    <div class="orders-list flex-col items-start px-4 overflow-y-auto" style="height: calc(100vh - 200px);">
                        <!-- Orders will be displayed here -->
                    </div>
                    <div class="p-4 flex-col bg-white">
                        <div class="my-2 font-medium">
                            <p>Totaal:  <span id="total">€0.00</span></p>
                        </div>
                        <div class="mt-4 flex justify-between">
                            <button type="submit"
                                class="px-4 py-1 font-medium text-white bg-indigo-500 rounded-md hover:bg-indigo-600 focus:outline-none"
                                style="width: 150px">Plaats
                                bestelling</button>

                                <button type="button" onclick="removeOrder()"
                                class="px-4 py-1 font-medium text-white bg-indigo-500 rounded-md hover:bg-indigo-600 focus:outline-none"
                                style="width: 150px">Annuleer
                                bestelling</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div class="backdrop"></div>
    </div>
@endsection
