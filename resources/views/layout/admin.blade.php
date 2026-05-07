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
    <div class="w-60 h-screen hidden md:hidden lg:block bg-gray-900 z-20 fixed p-4">
        <h1 class="text-white font-medium text-[25px]">Blog Admin Panel</h1>
        <ul class="text-white mt-15 w-full flex flex-col gap-2">
            <a href="/dashboard">
                <li
                    class="w-full transition duration-200 hover:bg-gray-800 p-3 {{ request()->routeIs('dashboard') ? 'bg-gray-800' : '' }}">
                    Dashboard</li>
            </a>
            <a href="/dashboard/alluser">
                <li
                    class="w-full transition duration-200 hover:bg-gray-800 p-3 {{ request()->routeIs('allusers') ? 'bg-gray-800' : '' }}">
                    All User</li>
            </a>
            <a href="/dashboard/post">
                <li
                    class="w-full transition duration-200 hover:bg-gray-800 p-3 {{ request()->routeIs('allpost') ? 'bg-gray-800' : '' }}">
                    All Post</li>
            </a>

        </ul>
        <div class="mt-100 p-2 w-full">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" onclick="return confirm('Sure to Logout?')"
                    class="px-3 py-2 w-full cursor-pointer bg-red-500/50 border-2 text-white border-red-500 hover:bg-red-500 transition duration-200 font-medium rounded">Logout</button>
            </form>
        </div>
    </div>
    <div class="w-full pl-5 lg:pl-64 bg-white h-20 shadow fixed left-0 z-10 items-center justify-between flex px-10">
        <h1 class="font-medium text-[20px] lg:text-[36px] md:text-[30px]">
            Dashboard Admin
        </h1>
        <div class="flex flex-col">
            <p>{{ $user->name }}</p>
            <p class="text-end">{{ ucwords($user->role) }}</p>
        </div>
    </div>

    <div class="bg gray-100 pl-5 pr-5 lg:pl-66 pt-24 lg:pr-8">
        @yield('content')
    </div>
</body>

</html>
