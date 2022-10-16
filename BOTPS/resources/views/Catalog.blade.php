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
    <title>Testing Pages</title>
</head>

<body>
    <!-- navBar -->
    <div class="flex bg-blue-300 pl-5 py-2 space-x-4">
        <a href="{{ url('/home') }}">
            <h1 class="text-xl font-bold font-mono text-gray-100 justify-start">Home</h1>
        </a>
        <a href="{{ url('/login') }}">
            <h1 class="text-xl font-bold font-mono text-gray-100 justify-end">Login</h1>
        </a>
        <a href="{{ url('/register') }}">
            <h1 class="text-xl font-bold font-mono text-gray-100">Register</h1>
        </a>
    </div>

    <div class="m-5 py-2 grid-flow-row auto-rows-max">
        <h1 class="text-xl">Product in Catalog</h1>
    </div>

    <div class="mt-8 rounded-lg bg-gray-100 mx-80">
        <div class="m-5 py-2">
            <row>
                <col>
                Classic cars |
                </col>
                <col>
                Motorcycles |
                </col>
                <col>
                Plains |
                </col>
                <col>
                Ships
                </col>
            </row>
        </div>
        <div class="m-5 py-2 grid-flow-row auto-rows-max">
            <row>
                <col>
                Trains |
                </col>
                <col>
                Trucks & Buses |
                </col>
                <col>
                Vintage cars |
                </col>
                <col>
                More
                </col>
            </row>
        </div>
    </div>
    </div>


</body>

</html>