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
        <a class="logout_btn_border" _par="" href="home">
            <div class="logout_btn">Logout</div>
        </a>
    </div>

    <div class="new_customer">New Customer</div>

    <!-- component -->
    <x-order/>
    <x-order/>

    <div class="old_customer">Customer in Commissioned</div>

    <!-- component -->
    <div class="comm_div">
        <div class="customer_name">Customer Name:</div>

        <!-- product description -->
        <div>
            <div style="display: flex;">
                <div class="product_description">-Product Name : </div>
                <div class="quantity">Quantity:</div>
                <div class="price">Price:</div>
            </div>

        </div>

        <!-- btn -->
        <div class="btn_frame">
            <div class="cancel_btn">
                <div class="cancel_text">
                    Cancel Order
                </div>
            </div>
            <div class="confirm_btn">
                <div class="confirm_text">
                    Confirm Order
                </div>
            </div>
        </div>
    </div>

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