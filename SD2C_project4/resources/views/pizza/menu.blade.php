@extends('layouts.app-layout')
@section('content')
    <div class="container flex flex-wrap">
        <div class="col">
            <div class="w-full md:w-1/2 inline-flex items-center justify-center">
                @foreach ($pizzas as $pizza)
                    <div class="col-4">
                        <h2>{{ $pizza->pizza_name }}</h2>
                        <p>{{ $pizza->description }}</p>
                        <button class="btn btn-primary" onclick="addToOrder({{ $pizza->id }})">Order</button>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="col">
            <div class="w-full md:w-1/2 inline-flex items-center justify-center">
                <div class="col-4">
                    <h2>Order</h2>

                </div>
            </div>
        </div>
    </div>
@endsection
