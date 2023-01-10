<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Stonks Pizza</title>
</head>
<body>
    <header>
        @yield('nav')
    </header>
        @yield('content')
</body>
</html>
