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
                <a href="{{ url('/catalog') }}">
                    <h1 class="btn_a">Catalog</h1>
                </a>
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
        <div class="h-screen overflow-y-scroll">

            <!-- Title -->
            <div class="flex pl-64 pt-16 space-x-5">
                <h1 class="text-7xl font-bold">Cart</h1>
                <img src="/Models/shopping-cart.png" alt="" width="60px" height="60px" background-position="1500px">
            </div>

            <!-- products -->
            <div class="h-auto">

                @php $total = 0 @endphp
                @if($cartDetails != null)
                @foreach($cartDetails as $cart)
                @php $total += $cart->buyPrice*$cart->quantity @endphp
                <div class="cart">

                    <!-- text -->
                    <div class="space-y-2 py-3 pt-8 text-lg ml-16 my-8 pr-16">
                        <div class="flex space-x-2">
                            <p class="font-bold">Name:</p>
                            <p>{{$cart->productName}}</p>
                        </div>
                        <div class="flex space-x-2">
                            <p class="font-bold">Description:</p>
                            <p>{{$cart->productDescription}}</p>
                        </div>
                        <div class="flex space-x-2">
                            <p class="font-bold">productCode:</p>
                            <p>{{$cart->productCode}}</p>
                        </div>
                        <div class="flex space-x-2">
                            <p class="font-bold">quantity:</p>
                            <p>{{$cart->quantity}}</p>

                            <p class="font-bold pl-16">Price:</p>
                            <p>{{$cart->buyPrice}} $</p>
                        </div>
                        <div class="flex space-x-2">
                            <p class="font-bold">Total Price:</p>
                            <p class="text-red-600">{{$cart->buyPrice*$cart->quantity}} $</p>
                        </div>
                    </div>

                    <!-- delete button -->
                    <div>
                        <form method="POST" action="{{route('remove.from.cart', $cart->productCode)}}">
                            @csrf
                            @method('DELETE')
                            <button class="del">Delete</button>
                        </form>
                    </div>


                </div>
                @endforeach
                @else
                <!-- cart empty -->
                <div class="flex justify-center pt-48 text-8xl">
                    <p class="ring-1 p-8 rounded-2xl ring-pink-200 bg-pink-200 text-white">Cart is empty</p>
                </div>
                @endif


            </div>

            <!-- order button -->
            @if($cartDetails != null)
            @if(($cartStatus->custoConfirm) == 0)

            <form method="POST" action="{{route('confirm.order')}}">
                @csrf
                <div class="">
                    <div class="bottom-0 right-10 absolute">
                        <div class="flex pb-5 space-x-2 pr-2">
                            <p class="text-2xl text-red-500">Cart total : </p>
                            <p class="text-2xl">{{ $total }} USD</p>
                        </div>

                        <button type="submit" class="text-white rounded-md ml-24 py-2 px-5 bg-green-400 hover:bg-green-600 active:bg-green-500 text-2xl">Order</button>
                    </div>
                </div>
            </form>

            @else
            <!-- order button -->

            <form method="POST" action="{{route('cancel.order')}}">
                @csrf
                <div class="">
                    <!-- button -->
                    <div class="bottom-0 right-10 absolute space-y-5">
                        <div class="flex space-x-5">
                            <img class="animate-spin" src="/Models/loading.png" alt="" width="30px" height="30px" background-position="1500px">
                            <p class="text-2xl">Waiting for confirmation</p>


                        </div>
                        <button type="submit" class="flex text-white rounded-md ml-10 py-2 px-5 bg-red-500 hover:bg-red-700 active:bg-green-500 text-2xl">
                            <p class="">Cancel Orders</p>
                        </button>
                    </div>
                </div>
            </form>
            @endif
            @endif
        </div>



        <!-- copyrigth -->
        <div class="bg-slate-500 flex justify-center place-self-end h-10 mt-5">
            <img src="skins/logo_2.png" id="logo_2" />
            <h1 class="text-white pt-1">Team PS-BOT</h1>
        </div>

    </div>




</body>

</html>