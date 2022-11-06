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
            <img src="{{asset('skins/logo_1.png')}}" id="logo_1" />
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

    @if(session('success'))
    <div class="popup1 mt-5">
        {{session('success')}}
    </div>
    @endif
    @if(session('fail'))
    <div class="popup2 mt-5">
        {{session('fail')}}
    </div>
    @endif

    <!-- contents -->
    <div class="h-screen pt-16">

        <!-- search box -->
        <form action="{{ route('catalog.show.search', ['term' => 'term' ])}}" method="get">
            <div class="flex justify-center pt-24">
                <input type="search" name="term" placeholder="Search Products..." class="search">
                <button type="submit" class="bg-sky-500 hover:bg-sky-700 border border-slate-300 rounded-md w-16"><i class="fa fa-search"></i></button>
            </div>
        </form>

        <div class="flex  pt-16">
            <h1 class="productInCatalog ">Products in Catalog</h1>
            <img src="/Models/shoppingBag.png" width="80px" height="60px" background-position="15px">
        </div>

        <div>
            <div class="table">


                <form action="{{ route('catelog.show.category', "Classic cars")}}" method="get">
                    <button type="submit">
                        <button class="product_btn">

                            <div class="justify-center">
                                <img class="move ml-16" src="/Models/car.png" width="80px" height="60px" background-position="15px">
                                <p class="pt-5 pl-2">Classic cars</p>
                            </div>
                        </button>
                    </button>
                </form>

                <form action="{{ route('catelog.show.category', "Motorcycles") }} " method="get">
                    <button type="submit">
                        <button class="product_btn">


                            <div class="justify-center">
                                <img class="move ml-16" src="/Models/scooter.png" width="80px" height="60px" background-position="15px">
                                <p class="pt-5 pl-2">Motorcycles</p>
                            </div>
                        </button>
                    </button>
                </form>


                <form action="{{ route('catelog.show.category', "Planes")}}" method="get">
                    <button type="submit">
                        <button class="product_btn">


                            <div class="justify-center">
                                <img class="move  ml-16" src="/Models/airplane.png" width="80px" height="60px" background-position="15px">
                                <p class="pt-5 pl-2">Planes</p>
                            </div>
                        </button>
                    </button>
                </form>




                <form action="{{ route('catelog.show.category', "Ships")}}" method="get">
                    <button type="submit">
                        <button class="product_btn">


                            <div class="justify-center">
                                <img class="move  ml-16" src="/Models/cruise-ship.png" width="80px" height="60px" background-position="15px">
                                <p class="pt-5 pl-2">Ships</p>
                            </div>
                        </button>
                    </button>
                </form>

            </div>
            <div class="table">


                <form action="{{ route('catelog.show.category', "Trains")}}" method="get">
                    <button type="submit">
                        <button class="product_btn">


                            <div class="justify-center">
                                <img class="move  ml-16" src="/Models/train.png" width="80px" height="60px" background-position="15px">
                                <p class="pt-5 pl-2">Trains</p>
                            </div>
                        </button>
                    </button>
                </form>


                <form action="{{ route('catelog.show.category', "Trucks and Buses")}}" method="get">
                    <button type="submit">
                        <button class="product_btn">


                            <div class="justify-center">
                                <img class="move  ml-16" src="/Models/double-decker-bus.png" width="80px" height="60px" background-position="15px">
                                <p class="pt-5 pl-2">Trucks & Buses</p>
                            </div>
                        </button>
                    </button>
                </form>

                <form action="{{ route('catelog.show.category', "Vintage cars")}}" method="get">
                    <button type="submit">
                        <button class="product_btn">


                            <div class="justify-center">
                                <img class="move  ml-16" src="/Models/van.png" width="80px" height="60px" background-position="15px">
                                <p class="pt-5 pl-2">Vintage cars</p>
                            </div>
                        </button>
                    </button>
                </form>

                <form action="{{ route('catalog.show.search', ['term' => 'term' ])}}" method="get">
                    <button type="submit">
                        <button class="product_btn">
                            <input type="search" name="term" value="" class="invisible">

                            <div class="justify-center">
                                <img class="move ml-16" src="/Models/online-shopping.png" width="80px" height="60px" background-position="15px">
                                <p class="pt-5 pl-2">All products</p>
                            </div>
                        </button>
                    </button>
                </form>

            </div>

        </div>


        @foreach($products as $product)
        <div class="comm_div">
            <div class="m-5 py-2">


                <button class="productName ">Name: {{$product->productName}}</button>
                <div>
                    <button class="productCodeItalic">Code: {{$product -> productCode}}

                        , Line: {{$product -> productLine}}

                        , Scale: {{$product -> productScale}}</button>
                </div>


            </div>
            <div class="m-10 py-2 grid-flow-row auto-rows-max">
                <row>
                    <col>
                    <div class="description">Vendor: {{$product -> productVendor}}</div>
                    </col>

                    <div class="description">Description: {{$product -> productDescription}}</div>
                    </col>

                    <col>
                    <div class="description">Stock: {{$product -> quantityInStock}}</div>
                    </col>

                    <col>
                    <div class="description">Price: {{$product -> buyPrice}} $</div>
                    </col>
                </row>
                <div class="btn_right">
                    <!-- check role -->
                    @if(Session::has('login-id'))

                    <div class="addToCart_btn">
                        <a href="{{route('add.to.cart', $product->productCode)}}">
                            <p>Add to cart</p>
                        </a>

                    </div>
                    @endif

                </div>
            </div>
        </div>

        @endforeach

        <!-- copyrigth -->
        <div class="bg-slate-500 flex justify-center place-self-end h-10">
            <img src="{{asset('skins/logo_2.png')}}" id="logo_2" />
            <h1 class="text-white pt-1">Team PS-BOT</h1>
        </div>
    </div>



</body>


</html>