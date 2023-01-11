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
                                    <option value="small">Small</option>
                                    <option value="medium">Medium</option>
                                    <option value="large">Large</option>
                                </select>
                            </div>
                            <div class="mt-4">
                                <button
                                    class="px-4 py-2 font-medium text-white bg-indigo-500 rounded-md hover:bg-indigo-600 focus:outline-none "onclick="addToOrder({{ $pizza->id }})">
                                    Add to order
                                </button>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
        <div class="container flex flex-wrap justify-center py-16 w-full">
            <div class="first-letter:">
                <div class="col-4" id="order">
                    <h2>Order</h2>
                    <script>  displayOrder() </script>
                </div>
            </div>
        </div>
    </div>
@endsection
