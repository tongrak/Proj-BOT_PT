<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>home_page</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="StyleSheet" href="{{ asset('css/register.css') }}" />
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script> -->
    @vite('resources/css/app.css')
</head>

<body>
    
<div class="justify-between">


        <!-- navBar -->
        <div class="flex bg-fuchsia-600 h-20 pl-16 shadow-2xl justify-between">

            <!-- 2 box -->
            <div class="flex space-x-16 ">
                <div class="text-fuchsia-600 bg-white px-5 pt-3 mb-1">
                    <h1 class="">PS BOT<br />SHOP</h1>
                </div>
                <div class="pt-5">
                    <a href="{{ url('/home') }}">
                        <h1 class="text-xl font-bold font-mono text-white rounded-2xl px-5 py-2 ring-1 ring-white">Home</h1>
                    </a>
                </div>
            </div>

            <!-- logo -->
            <div class="pl-16">
                <img src="skins/logo_1.png" id="logo_1" />
            </div>

            <!-- 3 box -->
            <div class="flex space-x-4 pt-5 pr-5">
                <a href="{{ url('/login') }}">
                    <h1 class="text-xl font-bold font-mono text-white rounded-lg px-5 py-2 ring-1 ring-white">Login</h1>
                </a>
                <a href="{{ url('/register') }}">
                    <h1 class="text-xl font-bold font-mono text-white rounded-lg px-5 py-2 ring-1 ring-white">Sign-up</h1>
                </a>
                <a href="{{ url('/cart') }}">
                    <h1 class="text-xl font-bold font-mono text-white rounded-lg px-5 py-2 ring-1 ring-white">Cart</h1>
                </a>
            </div>
        </div>

        <!-- contents -->
        <div class="h-screen">
            <h1>test gg</h1>
        </div>

        <!-- copyrigth -->
        <div class="bg-slate-500 flex justify-center place-self-end">
            <img src="skins/logo_2.png" id="logo_2" />
            <h1 class="text-white pt-1">Team PS-BOT</h1>
        </div>
    </div>






</body>

</html>