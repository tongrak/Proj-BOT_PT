<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cart_page</title>
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
            <div class="flex space-x-16 ">
                <div class="text-fuchsia-600 bg-white px-5 pt-3 mb-1">
                    <h1 class="">PS BOT</h1>
                    <h1 class="pl-2">SHOP</h1>
                </div>
                <div class="pt-5">
                    <a href="{{ url('/home') }}">
                        <h1 class="btn_a">Home</h1>
                    </a>
                </div>
            </div>

            <!-- logo -->
            <div class="pr-10">
                <img src="skins/logo_1.png" id="logo_1" />
            </div>

            <!-- 3 box -->
            <div class="flex space-x-4 pt-5 pr-5">
                <!-- <a href="{{ url('/login') }}">
                    <h1 class="text-xl font-bold font-sans text-white rounded-2xl px-6 py-2.5 ring-1 ring-white transition ease-in-out  hover:-translate-y-1 hover:scale-110 duration-100">Login</h1>
                </a>
                <a href="{{ url('/register') }}">
                    <h1 class="text-xl font-bold font-sans text-white rounded-2xl px-6 py-2.5 ring-1 ring-white transition ease-in-out  hover:-translate-y-1 hover:scale-110 duration-100">Sign-up</h1>
                </a> -->
                <a href="{{ url('/home') }}">
                    <h1 class="btn_a">logout</h1>
                </a>
            </div>
        </div>

        <!-- contents -->
        <div class="h-screen overflow-y-scroll">

            <!-- Title -->
            <div class="flex pl-64 pt-16 ">
                <h1 class="text-5xl">Cart</h1>
            </div>

            <!-- contents -->
            <div class="">

                <!-- box 1
                <div class="bg-slate-200 flex justify-center mx-56 mt-10">
                    <p class="p-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere corrupti praesentium adipisci, est eveniet rem accusantium assumenda sed. Ad eveniet numquam, hic et possimus ea nobis neque saepe consequatur praesentium!</p>
                </div> -->

                @foreach( $cartdetails as $cart )
                <tr>
                    @php $total += $cart->price*$cart->quantity @endphp
                    <td>{{ $cart->name }}</td>
                    <td>{{ $cart->price }}</td>
                    <td>{{ $cart->quantity }}
                    <td data-th="Subtotal" class="">{{$cart->price*$cart->quantity}}</td>
                </tr>
                @endforeach



            </div>

            <!-- order button -->
            <div class="flex">
                <div class="bottom-0 right-10 absolute">
                    <button class="text-white rounded-md py-2 px-5 bg-green-400 hover:bg-green-600 active:bg-green-500 text-xl">Order</button>
                </div>
            </div>

        </div>
        <!-- copyrigth -->
        <div class="bg-slate-500 flex justify-center place-self-end h-10 mt-5">
            <img src="skins/logo_2.png" id="logo_2" />
            <h1 class="text-white pt-1">Team PS-BOT</h1>
        </div>

    </div>




</body>

</html>