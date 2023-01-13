@extends('layouts.app-layout')
@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-4xl font-semibold">Contact Us</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 py-16">
        <div class="mb-4">
            <h2 class="text-2xl font-medium">Contact Information</h2>
            <p class="text-lg py-2">123 Pizza Place</p>
            <p class="text-lg py-2">Pizza City, Pizza State</p>
            <p class="text-lg py-2">123-456-7890</p>
            <p class="text-lg py-2">info@pizzapalace.com</p>
        </div>
        <div>
            <h2 class="text-lg font-medium">Location</h2>
            <div class="relative">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
@endsection
