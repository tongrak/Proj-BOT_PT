<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cart_page</title>
    <link rel="icon" href="/skins/logo_3.png" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/slider.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    @vite('resources/css/app.css')
</head>

<body class="fontA">


    <div class="justify-between w-full h-fit">


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
                <img src="/skins/logo_1.png" id="logo_1" />
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
        <div class="h-screen overflow-y-scroll">

            <!-- Title -->
            <div class="flex pl-64 pt-16 ">
                <h1 class="text-5xl">Cart</h1>
            </div>

            <!-- contents -->
            <div class="">

                <!-- @for($i = 0;$i < 10;$i++)
                <div class="cart">
                    <div class="space-y-1 py-3">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, sed?</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, sed?</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, sed?</p>
                    </div>
                    <button class="del">Delete</button>
                </div>
                @endfor -->

                @if($cartDetails != null)
                @foreach($cartDetails as $cart)
                <div class="cart">

                    <!-- text -->
                    <div class="space-y-1 py-3 pt-8 text-xl">
                        <!-- <p>customerNumber: {{$cart->customerNumber}}</p> -->
                        <p>productCode: {{$cart->productCode}}</p>
                        <p>quantity: {{$cart->quantity}}</p>
                    </div>
                    <form method="POST" action="{{route('remove.from.cart', $cart->productCode)}}">
                        @csrf
                        @method('DELETE')
                        <button class="del">Delete</button>
                    </form>

                </div>
                @endforeach
                @endif


            </div>

            <!-- order button -->
            <form method="post" action="{{route('confirm.order')}}">
            @csrf
                <div class="flex">
                    <div class="bottom-0 right-10 absolute">
                        <button class="text-white rounded-md py-2 px-5 bg-green-400 hover:bg-green-600 active:bg-green-500 text-2xl">Order</button>
                    </div>
                </div>
            </form>


        </div>
        <!-- copyrigth -->
        <div class="bg-slate-500 flex justify-center place-self-end h-10 mt-5">
            <img src="skins/logo_2.png" id="logo_2" />
            <h1 class="text-white pt-1">Team PS-BOT</h1>
        </div>

    </div>




</body>

</html>