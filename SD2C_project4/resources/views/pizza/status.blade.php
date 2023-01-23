<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Order Details</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Pizza Name</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                reads out the array, wip not sure if it works yet
             @foreach($request as $key => $value)
            <p>{{ $key }}: {{ $value }}</p> 
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
