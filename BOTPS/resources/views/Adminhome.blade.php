<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>admin home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="StyleSheet" href="{{ asset('css/commission.css') }}" />
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
    <!-- Add your custom HEAD content here -->
</head>

<body>

    <!-- header-->
    <div class="header_bg">
        <div class="shop_name_bg">
            <div class="ps_bot_shop">
                PS BOT<br />SHOP
            </div>
        </div>
        <img src="skins/logo_1.png" class="logo_header" />
        <div class="for_admin">For Admin</div>
        <a class="logout_btn" _par="" href="{{ url('/logout') }}">
            Logout
        </a>
    </div>
    @if(session('success'))
        <div class="popup">
            {{session('success')}}
        </div>
    @endif

    <script>
        
    </script>
    <div class="new_customer">New Customer</div>

    <!-- component -->

    @foreach($cartNoRep as $cNr )
        @component('components.newCustomer',['cWr' => $cNr])
        @endcomponent
    @endforeach

    <div class="old_customer">Customer in Commissioned</div>

    <!-- component -->
    @foreach($cartWithRep as $cWr )
        @component('components.order',['cWr' => $cWr])
        @endcomponent
    @endforeach

    <!-- footer -->
    <footer class="footer_frame">
        <div class="footer_div">
            <img src="skins/logo_2.png" class="logo_foot" />
            <div class="team_ps_bot">
                Team PS-BOT
            </div>
        </div>
    </footer>

</body>

</html>