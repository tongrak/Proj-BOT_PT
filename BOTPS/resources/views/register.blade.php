<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        </div>
        <x-notificationBox />
        <img src="skins/line_2.png" id="line_short" />
        <div id="already_have_an_account_">
            Already have an account?
        </div>

        <a id="login_btn_frame" _par="" href="login">
            Login here
        </a>

        <div id="sign_up">
            Sign-up
        </div>


        <form method="post" action="{{ route('register.perform') }}">
            @csrf
            <div id="first_name">
                First Name
            </div>
            <div id="first_name_form">
                <input style="height:31px; font-size:15px" type="text" class="form-control" name="contactFirstName" required="required" placeholder="required" size="45" autofocus>
            </div>

            <div id="last_name">
                Last Name (used for username)
            </div>
            <div id="last_name_form">
                <input style="height:31px; font-size:15px" type="text" class="form-control" name="contactLastName" required="required" placeholder="required" size="45" autofocus>
            </div>

            <div id="cop_name">
                Corporation Name (used for password)
            </div>
            <div id="cop_name_form">
                <input style="height:31px; font-size:15px" type="text" class="form-control" name="customerName" required="required" placeholder="required" size="45" autofocus>
            </div>

            <div id="address1">
                Address Line 1
            </div>
            <div id="address1_form">
                <input style="height:31px; font-size:15px" type="text" class="form-control" name="addressLine1" required="required" placeholder="required" size="45" autofocus>
            </div>

            <div id="address2">
                Address Line 2
            </div>
            <div id="address2_form">
                <input style="height:31px; font-size:15px" type="text" class="form-control" name="addressLine2" size="45" autofocus>
            </div>

            <div id="phone">
                Phone
            </div>
            <div id="phone_form">
                <input style="height:31px; font-size:15px" type="text" class="form-control" name="phone" required="required" placeholder="required" size="45" autofocus>
            </div>

            <div id="city">
                City
            </div>
            <div id="city_form">
                <input style="height:31px; font-size:15px" type="text" class="form-control" name="city" required="required" placeholder="required" size="45" autofocus>
            </div>

            <div id="state">
                State
            </div>
            <div id="state_form">
                <input style="height:31px; font-size:15px" type="text" class="form-control" name="state" size="45" autofocus>
            </div>

            <div id="postalcode">
                PostalCode
            </div>
            <div id="postal_code_form">
                <input style="height:31px; font-size:15px" type="text" class="form-control" name="postalCode" size="45" autofocus>
            </div>

            <div id="country">
                Country
            </div>
            <div id="country_form">
                <input style="height:31px; font-size:15px" type="text" class="form-control" name="country" required="required" placeholder="required" size="45" autofocus>
            </div>

            <button id="sign_up_btn_border" type="submit">
                Sign-up
            </button>
        </form>

    </div>
</body>

</html>