<!DOCTYPE html>
<html lang="en">

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

<body class="fontA">


    <div class="justify-between w-full h-fit">


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

            <!-- check role -->
            @if(Session::has('login-id')){
            <div class="flex space-x-4 pt-5 pr-5">
                <a href="{{ url('/cart') }}">
                    <h1 class="btn_a">Cart</h1>
                </a>
                <a href="{{ url('/logout') }}">
                    <h1 class="btn_a">Logout</h1>
                </a>
            </div>

            }
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
            <!-- 3 box -->
            <!-- <div class="flex space-x-4 pt-5 pr-5">
                <a href="{{ url('/login') }}">
                    <h1 class="btn_a">Login</h1>
                </a>
                <a href="{{ url('/register') }}">
                    <h1 class="btn_a">Sign-up</h1>
                </a> -->
            <!-- <a href="{{ url('/cart') }}">
                    <h1 class="text-xl font-bold font-sans text-white rounded-2xl px-6 py-2.5 ring-1 ring-white transition ease-in-out  hover:-translate-y-1 hover:scale-110 duration-100">Cart</h1>
                </a> -->
            <!-- </div> -->
        </div>

        <!-- contents -->
        <div class="h-auto">

            <!-- search box -->
            <form action="{{ route('catalog.show.search', ['term' => 'term' ])}}" method="get">
                <div class="flex justify-center pt-24">
                    <input type="search" name="term" placeholder="Search Products..." class="search">
                    <button type="submit" class="bg-sky-500 hover:bg-sky-700 border border-slate-300 rounded-md w-16"><i class="fa fa-search"></i></button>
                </div>
            </form>

            <!-- Top Hits -->
            <div class="flex pl-64 pt-16 space-x-2">
                <h1 class="tophit">Top Hits</h1>
                <img src="/Models/fire.jpg" alt="" width="30px" height="20px" background-position="1500px">
            </div>


            <!-- Products -->
            <div class="carousel flex pt-10">

                @for($i = 0;$i < 10; $i++) <div class="mx-10 container" width="300" height="400">
                    <form action="{{ route('catalog.show.search', ['term' => 'term' ])}}" method="get">
                        <button type="submit">
                            <input type="search" name="term" value="{{$products[$i]->productName}}" class="invisible">
                            <img src="{{$imageAddresses[$i]}}" alt="" class="border-2 " onmouseover="show(this)">
                            <div class="overlay">
                                <div class="textA">Name: {{$products[$i]->productName}} <br> Code: {{$products[$i] -> productDescription}} </div>
                            </div>
                        </button>

                    </form>
            </div>
            @endfor
        </div>

    </div>

    <!-- Line -->
    <div class="ring-1 ring-gray-800 mx-20 mb-5 mt-20">
    </div>

    <div class="flex justify-center mb-5 pt-5">
        <p class="text-6xl">----- For More Products -----</p>
    </div>

    <!-- Catalog button -->
    <div class="flex justify-center pb-20">

        <a href="{{ url('/catalog') }}">
            <h1 class="catalog">Catalog</h1>
        </a>
    </div>

    <!-- copyrigth -->
    <div class="bg-slate-500 flex justify-center place-self-end h-10">
        <img src="skins/logo_2.png" id="logo_2" />
        <h1 class="text-white pt-1">Team PS-BOT</h1>
    </div>
    </div>

    <!-- import jquery and slick -->
    <script src="/js/jquery.js"></script>
    <script src="/js/slick.min.js"></script>

    <!-- slider -->
    <script>
        $('.carousel').slick({
            dots: false,
            infinite: false,
            speed: 1000,
            slidesToShow: 4,
            slidesToScroll: 3,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    </script>

</body>

</html>