<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/skins/logo_3.ico" type="image/x-icon">
    <link rel="StyleSheet" href="{{ asset('css/styles.css') }}" />
    <link rel="StyleSheet" href="{{ asset('css/auth.css') }}" />
    <script src="https://secure.exportkit.com/cdn/js/ek_googlefonts.js?v=6"></script>
    <!-- Add your custom HEAD content here -->

</head>

<body>
    <div id="content-container">
        <div id="_bg__register_page"></div>

        <div id="master_of_all_page">
            <x-navbar />
            <div id="foot_bg"></div>
            <div id="team_ps_bot">
                Team PS-BOT
            </div>
            <img src="skins/logo_1.png" id="logo_header" />
            <img src="skins/logo_2.png" id="logo_foot" />
            <x-notificationBox />
            <div id="line_long"></div>

            <div id="don_t_have_an_account_">
                Don't have an account?
            </div>

            <a id="create_account_frame" _par="" href="register">
                Create your account here
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
                    Login
                </button>

            </form>

        </div>

    </div>
</body>

</html>