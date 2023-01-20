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
                @foreach ($requestData as $pizza)
                    <tr>
                        <td>{{$pizza->pizzaId}}</td>
                        <td>{{$pizza->size}}</td>
                        <td>{{$pizza->pivot->quantity}}</td>
                        <td>{{$pizza->pivot->price}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
