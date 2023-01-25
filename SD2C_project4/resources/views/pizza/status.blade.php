@extends('layouts.app-layout')
@section('content')
    <div class="status-container flex justify-center">
        <div class="info-container bg-gray-200">
            <div class="status-pizza">
                <div class="box">
                    <img src="{{ asset('assets/img/output-onlinegiftools.gif') }}" />
                </div>
                <div class="progress-bar">
                    <div class="progress-container">
                        <div class="Loading"></div>
                    </div>
                </div>
                <div class="snippet flex flex-wrap px-16 my-4" data-title="dot-falling">
                    <h1 class="font-medium text-lg">Bestelling wordt voorbereid</h1>
                    <div class="stage">
                        <div class="dot-falling"></div>
                    </div>
                </div>
            </div>
            <div class="contact-container">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-16">
                    <div class="mb-4">
                        <h2 class="text-lg font-medium">Contact Informatie</h2>
                        <p class="text-md">123 Pizza Place</p>
                        <p class="text-md">Pizza City, Pizza State</p>
                        <p class="text-md"><a href="tel:123-456-7890">123-456-7890</a></p>
                        <p class="text-md"><a href="mailto:info@pizzapalace.com">info@pizzapalace.com</a></p>
                    </div>
                    <div>
                        <h2 class="text-lg font-medium">Locatie</h2>
                        <div class="relative">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                                width="100%" height="250px" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-list p-16">
                <h1 class="font-medium text-lg my-6">Je bestelling</h1>

                <div class="status-items flex flex-wrap">
                    @php
                        $total = 0;
                    @endphp
                    <!--- gets an array of Pizza models from the Order model trough the pizzas relation in Order model
                                    with pivot you refer to the pivot table info--->
                    @foreach ($order->pizzas as $pizza)
                        <div class="orders flex justify-between my-6 rounded-lg shadow-md bg-gray-100 p-4 ">
                            <div>
                                <p>{{ $pizza->pizza_name }}</p>
                                <p>Grootte: {{ $pizza->pivot->size }}</p>
                                <p>Hoeveelheid: {{ $pizza->pivot->quantity }}</p>
                                <p>Prijs: €{{ number_format($pizza->base_price, 2) }}</p>
                            </div>
                            <div>
                                <img id="status-img-{{ $pizza->id }}" src="{{ asset($pizza->img) }}" alt="Pizza">
                            </div>
                        </div>

                        @php
                            $total += $pizza->base_price * $pizza->pivot->quantity;
                        @endphp

                    @endforeach


                </div>
                <div>
                    <p id="status_total" class="rounded-lg shadow-md bg-gray-100 p-4 ">Totaal: €{{number_format($total,2)}}</p>
                </div>
            </div>
        </div>

    </div>
@endsection
