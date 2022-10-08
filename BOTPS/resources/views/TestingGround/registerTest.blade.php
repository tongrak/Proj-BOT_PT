<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite('resources/css/app.css')
</head>

<body>
    <!-- navBar -->
    <div class="flex bg-blue-300 pl-5 py-2 space-x-4">
        <a href="{{ url('/home') }}">
            <h1 class="text-xl font-bold font-mono text-gray-100 justify-start">Home</h1>
        </a>
        <a href="{{ url('/login') }}">
            <h1 class="text-xl font-bold font-mono text-gray-100 justify-end">Login</h1>
        </a>
        <a href="{{ url('/register') }}">
            <h1 class="text-xl font-bold font-mono text-gray-100">Register</h1>
        </a>
    </div>

    <!-- box-text-1 -->
    <div class="mt-8 rounded-lg bg-gray-100 mx-80">
        <div class="m-5 py-2 grid-flow-row auto-rows-max">

            <div class="">
                <h1 class="text-xl">Register</h1>
                <form method="post" action="{{ route('test.register') }}" >
                    @csrf
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                </form>
            </div>
            <div class="">
                This is test page
            </div>

        </div>
    </div>

</body>

</html>