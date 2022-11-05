<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

<head>
    <meta charset="UTF-8">
    <title>home_page</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slider.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
    @vite('resources/css/app.css')
</head>



<body>
    <!-- navBar -->
    <div class="nav">

        <!-- 2 box -->
        <div class="flex space-x-16 ">
            <div class="text-fuchsia-600 bg-white px-5 pt-3 mb-1">
                <h1 class="">PS BOT</h1>
                <h1 class="pl-2">SHOP</h1>
            </div>
            <div class="pt-5">
                <!-- <a href="{{ url('/') }}">
            <h1 class="text-xl font-sans text-white rounded-2xl px-6 py-2.5 ring-1 ring-white transition ease-in-out  hover:-translate-y-1 hover:scale-110 duration-100">Home</h1>
        </a> -->
            </div>
        </div>

        <!-- logo -->
        <div class="logo">
            <img src="skins/logo_1.png" id="logo_1" />
        </div>

        <!-- 3 box -->
        <div class="flex space-x-4 pt-5 pr-5">
            <a href="{{ url('/login') }}">
                <h1 class="btn_a">Login</h1>
            </a>
            <a href="{{ url('/register') }}">
                <h1 class="btn_a">Sign-up</h1>
            </a>
            <!-- <a href="{{ url('/cart') }}">
        <h1 class="text-xl font-bold font-sans text-white rounded-2xl px-6 py-2.5 ring-1 ring-white transition ease-in-out  hover:-translate-y-1 hover:scale-110 duration-100">Cart</h1>
    </a> -->
        </div>
    </div>

    <!-- contents -->
    <div class="h-screen">

        <!-- search box -->
        <form action="{{ route('catalog.show.search', ['term' => 'term' ])}}" method="get">
            <div class="flex justify-center pt-24">
                <input type="search" name="term" placeholder="Search Products..." class="search">
                <button type="submit" class="bg-sky-500 hover:bg-sky-700 border border-slate-300 rounded-md w-16"><i class="fa fa-search"></i></button>
            </div>
        </form>

        <div class="m-5 py-2 grid-flow-row auto-rows-max">
            <h1 class="text-xl">Product in Catalog</h1>
        </div>

        <div class="mt-8 rounded-lg bg-gray-100 mx-80">
            <div class="m-5 py-2">
                <row>
                    <col>
                    <button>Classic cars</button> |
                    </col>
                    <col>
                    <button>Motorcycles</button> |
                    </col>
                    <col>
                    <button>Plains</button> |
                    </col>
                    <col>
                    <button>Ships</button>
                    </col>
                </row>
            </div>
            <div class="m-5 py-2 grid-flow-row auto-rows-max">
                <row>
                    <col>
                    <button>Trains</button> |
                    </col>
                    <col>
                    <button>Trucks & Buses</button> |
                    </col>
                    <col>
                    <button>Vintage cars</button>
                    </col>

                </row>
            </div>
        </div>
        <div class="m-5 py-2 grid-flow-row auto-rows-max">
            @foreach($products as $product)
            <div class="bg-gray-700">
                <h4>Name: {{$product->productName}}</h4>
                <p>Code: {{$product -> productCode}}</p>
            </div>
            @endforeach
        </div>
        <!-- copyrigth -->
        <div class="bg-slate-500 flex justify-center place-self-end h-10">
            <img src="skins/logo_2.png" id="logo_2" />
            <h1 class="text-white pt-1">Team PS-BOT</h1>
        </div>
    </div>



</body>


</html>