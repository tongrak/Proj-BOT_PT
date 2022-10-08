<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite('resources/css/app.css')
</head>


<head>
    <title>Testing Page</title>
</head>

<body>
    <div class="flex flex-auto justify-center bg-gray-700">
        <!-- <a href="{{ config('app.url')}}/products">Back</a> -->
        <h1>Here lay backend-dev's hope and dream for </h1>
    </div>
    <div >
        <form method="post"  action="{{route('test.create')}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <h1>Create your productline:</h1>
            <div class="flex">
                <h4>Name:</h4>
                <input type="text" class="form-control" name="productLine" value="{{ old('productLine') }}" placeholder="Deez" required="required" autofocus>
            </div>
            <div class="flex">
                <h4>Description:</h4>
                <input type="text" class="form-control" name="textDescription" value="{{ old('textDescription') }}" placeholder="Nuts" required="required" autofocus>
            </div>
            <button type="submit">Create</button>

        </form>
    </div>

</body>

</html>