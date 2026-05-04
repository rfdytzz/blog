<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>@yield('title')</title>
</head>

<body>
    <div class="w-60 h-screen bg-gray-900 fixed p-4">
        <h1 class="text-white font-medium text-[25px]">Blog Admin Panel</h1>
        <ul class="mt-10 text-white w-full">
            <a href="" class="p-3 bg-gray-800 w-full">Dashboard</a>
        </ul>
    </div>
    <div class="bg gray-100 ml-60">
        @yield('content')
    </div>
</body>

</html>
