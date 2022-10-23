<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="StyleSheet" href="{{ asset('css/styles.css') }}" />
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
    <!-- Add your custom HEAD content here -->

</head>

<body>
    <div id="content-container">
        <div id="_bg__register_page"></div>

        <div id="master_of_all_page">
            <div id="foot_bg"></div>
            <div id="nav_bg"></div>
            <div id="team_ps_bot">
                Team PS-BOT
            </div>
            <div id="shop_name_bg"></div>
            <div id="ps_bot_shop">
                PS BOT<br />SHOP
            </div>

            <a id="home_btn_frame" _par="" href="home">
                <div id="Home_btn_border"></div>
                <div id="home_btn">
                    Home
                </div>

            </a>
            <img src="skins/logo_1.png" id="logo_header" />
            <img src="skins/logo_2.png" id="logo_foot" />

            <div id="line_long"></div>

            <div id="don_t_have_an_account_">
                Don't have an account?
            </div>

            <a id="create_account_frame" _par="" href="register">
                <div id="create_account_border"></div>
                <div id="create_account_btn">
                    Create your account here
                </div>
            </a>

            <div id="login">
                Login
            </div>

            <form method="post" action="{{ route('login.perform') }}">
                @csrf
                <div id="username_login">
                    Username
                </div>
                <div id="username_login_form">
                    <input style="height:31px; font-size:15px" type="text" class="form-control" name="username" required="required" size="45" autofocus>
                </div>

                <div id="password_login">
                    Password
                </div>
                <div id="password_login_form">
                    <input style="height:31px; font-size:15px" type="text" class="form-control" name="password" required="required" size="45" autofocus>
                </div>

                <button id="login_log_border" type="submit">
                    <div id="login_log_btn">
                        Login
                    </div>
                </button>
                
            </form>

        </div>

    </div>
</body>

</html>