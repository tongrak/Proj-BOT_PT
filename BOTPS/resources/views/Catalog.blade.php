<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite('resources/css/app.css')
</head>


<head>
    <title>Testing Page</title>
</head>

<body>
    <div class="flex flex-auto justify-center bg-gray-700">
        <!-- <a href="{{ config('app.url')}}/products">Back</a> -->
        <h1>Here lay backend-dev's hope and dream for </h1>
    </div>
    <div class="grid grid-cols-1 justify-center">
        @foreach($products as $product)
        <div class="bg-gray-700">
            <h4>Name: {{$product->productName}}</h4>
            <p>Code: {{$product -> productCode}}</p>
        </div>
        @endforeach
    </div>

</body>

</html>