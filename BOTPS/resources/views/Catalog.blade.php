<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

<head>
    <meta charset="UTF-8">
    <title>Catalog</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slider.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="StyleSheet" href="{{ asset('css/commission.css') }}" />
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
    @vite('resources/css/app.css')
</head>



<body>
    <!-- navBar -->
    <div class="nav">

        <!-- 2 box -->
        <div class="flex space-between">
            <a href="{{ url('/') }}" class="px-5">
                <div class="text-fuchsia-600 bg-white px-9 h-20 pt-2 ">
                    <h1 class="text-lg font-medium">PS BOT</h1>
                    <h1 class="pl-2 text-lg font-medium">SHOP</h1>
                </div>
            </a>

            <div class="pt-5">
                @if(Session::has('login-id'))
                <p class="text-white text-2xl ring-1 rounded-2xl px-5 ring-white mt-2"> ID : {{Session::get("login-id")}}</p>
                @endif
            </div>
        </div>

        <!-- logo -->
        <div class="logo">
            <img src="skins/logo_1.png" id="logo_1" />
        </div>

        <!-- check role -->
        @if(Session::has('login-id'))
        <div class="flex space-x-4 pt-5 pr-5">
            <a href="{{ url('/cart') }}">
                <h1 class="btn_a">Cart</h1>
            </a>
            <a href="{{ url('/logout') }}">
                <h1 class="btn_a">Logout</h1>
            </a>
        </div>


        @else
        <div class="flex space-x-4 pt-5 pr-5">
            <a href="{{ url('/login') }}">
                <h1 class="btn_a">Login</h1>
            </a>
            <a href="{{ url('/register') }}">
                <h1 class="btn_a">Sign-up</h1>
            </a>
        </div>


        @endif

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
            <h1 class="new_customer">Products in Catalog</h1>
        </div>

        <!-- <div class="comm_div">
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
        </div> -->


        @foreach($products as $product)
        <div class="comm_div">
            <div class="m-5 py-2">
                <row>
                    <col>
                    <button>Name: {{$product->productName}}</button>
                    </col>
                    <col>
                    <button>Code: {{$product -> productCode}}</button>
                    </col>
                    <col>
                    <button>Line: {{$product -> productLine}}</button>
                    </col>
                    <col>
                    <button>Scale: {{$product -> productScale}}</button>
                    </col>
                </row>
            </div>
            <div class="m-5 py-2 grid-flow-row auto-rows-max">
                <row>
                    <col>
                    <button>Vendor : {{$product -> productVendor}}</button>
                    </col>
                    <col>
                    <button>Description: {{$product -> productDescription}}</button>
                    </col>
                    <col>
                    <button>Stock: {{$product -> quantityInStock}}</button>
                    </col>
                    <col>
                    <button>Price: {{$product -> buyPrice}}</button>
                    </col>
                    <div class="confirm_btn">
                        <p><a href="{{route('add.to.cart', $product->productCode)}}">Add to cart</a></p>

                    </div>
                </row>
            </div>
        </div>

        @endforeach

        <!-- @foreach($products as $product)
        <div class="mx-5 py-2 grid-flow-row auto-rows-max ">
           
            <div class="bg-gray-700">
                <h4>Name: {{$product->productName}}</h4>
                <p>Code: {{$product -> productCode}}</p>
                <div class="confirm_btn">
                    <p><a href="{{route('add.to.cart', $product->productCode)}}">Add to cart</a></p>

                </div>
            </div>
        </div>
        @endforeach -->


        <!-- copyrigth -->
        <div class="bg-slate-500 flex justify-center place-self-end h-10">
            <img src="skins/logo_2.png" id="logo_2" />
            <h1 class="text-white pt-1">Team PS-BOT</h1>
        </div>
    </div>



</body>


</html>