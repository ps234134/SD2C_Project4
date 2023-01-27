<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/img/logo.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/img/logo.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/img/logo.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/img/logo.png')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script type="text/javascript" src="./assets/js/pizzaOrderV2.js"></script>



    @vite('resources/css/app.css')
    <title>Stonks Pizza</title>

</head>

<body>

    <div class="d-flex flex-column min-vh-100">
        <div> 
            <!-- Your header content here -->
            <header>
                @include('layouts.nav')
            </header>
        </div>
        <main class="flex-grow-1">
            @yield('content')
        </main>
        @include('layouts.footer')
    </div>
</body>

</html>
