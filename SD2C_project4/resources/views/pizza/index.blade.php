@extends('layouts.app-layout')
@section('content')
    <div id="home" class="relative z-10 header-hero">
        <div class="container z-20" id="hero">
            <div class="justify-center row">
                <div class="w-full lg:w-5/6 xl:w-2/3">
                    <div class="pt-48 pb-64 header-content">
                        <div class="flex items-center">
                            <h3 class="mb-5 text-3xl font-semibold leading-tight text-gray-900 md:text-5xl">Welkom bij Stonks
                            </h3>
                            <img src="{{ asset('assets/img/logo.png') }}" class="h-9 mr-3 sm:h-32" alt="Logo" />
                        </div>

                        <p class="mb-10 text-xl text-gray-700">Elke dag vanaf 16:30 tot 01:00 open!<br>
                            Bel: <a href="tel:+31642121289" class="underline">+31642121289</a> om een bestelling te maken of
                            bestel via de webshop! </p>
                        <ul class="flex flex-wrap">
                            <li><button
                                    class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-xl font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                                    <a
                                        class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                        Bestel nu
                                    </a>
                                </button></li>
                        </ul>
                    </div> <!-- header content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- header content -->
    <div class="py-8 main-content">
        <div class="flex flex-wrap mx-10">
            <div class="w-full md:w-1/2">
                <h1 class="text-4xl font-semibold mb-5inline-flex items-center justify-center">About Us</h1>
                <p class="text-gray-700 text-justify text-lg">Stonks Pizza is een lokale pizzatent die gevestigd is in de stad en gekend is voor de heerlijke smaken en de verse ingrediënten die we gebruiken. Wij geloven in het maken van authentieke pizza's die in onze houtgestookte oven gebakken worden.
                    Ons doel is om onze klanten de meest smakelijke pizza's aan te bieden die we kunnen maken. Wij zijn trots op ons team van professionele koks die ervaring hebben in de pizza-industrie en geobsedeerd zijn met het creëren van de perfecte pizza. Onze pizza's zijn gemaakt met de beste ingrediënten en altijd vers.
                    Al onze vestigingen zijn gezellig ingericht met een rustieke en gezellige sfeer. Wij nodigen u uit om onze pizzas te komen proeven, onze klanten waarderen onze pizza's voor de smaak en de kwaliteit. Wij zijn verheugd om u te laten genieten van onze pizza's en u een geweldige tijd te bezorgen.</p>

            </div>
            <div class="w-full md:w-1/2 inline-flex items-center justify-center">
                <img src="{{asset('assets/img/pizza_chef.jpg')}}" alt="Pizzas" class="w-4/6  object-cover rounded">
            </div>
        </div>
    </div>
@endsection
