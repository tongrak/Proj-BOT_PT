<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>

<body>
    <!-- navBar -->
    <div class="justify-start flex bg-blue-300 pl-5 py-2 space-x-4">
        <a href="{{ url('/home') }}">
            <h1 class="text-xl font-bold font-mono text-gray-100">Home</h1>
        </a>
        <a href="{{ url('/login') }}">
            <h1 class="text-xl font-bold font-mono text-gray-100">Login</h1>
        </a>
        <a href="{{ url('/register') }}">
            <h1 class="text-xl font-bold font-mono text-gray-100">Register</h1>
        </a>
    </div>


    <!-- box-text-3 -->
    <div class="mt-8 rounded-lg bg-gray-50 mx-80">
        <div class="m-5 py-2 grid-flow-row auto-rows-max">
            <div class="m-1 justify-center flex">
                <h1 class="text-xl">Login Page</h1>
            </div>
            <form method="post" action="{{ route('test.login') }}" >
            @csrf
                <div class="space-x-2 justify-center flex">
                    <h1>username</h1>
                    <input type="text" class="border-2" name="username">
                </div>
                <div class="space-x-2 mt-2 justify-center flex">
                    <h1>password</h1>
                    <input type="text" class="border-2" name="password">
                </div>
                <div class="justify-center flex my-5 space-x-2 pl-10">
                    <button class="bg-green-500 rounded-full p-1 px-2" type='submit'>Login</button>
                    <a href="{{ url('/register') }}" class="p-1 px-2">Register</a>
                </div>
            </form>
            


        </div>
    </div>

</body>

</html>