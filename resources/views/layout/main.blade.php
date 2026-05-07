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
    <div class="bg-gray-800 px-5 h-20 md:px-10 lg:px-10 py-3 fixed right-0 left-0 shadow-2xl top-0 z-10">
        <div class="flex justify-between items-center text-white">
            <a href="">
                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                    alt="Your Company" class="size-13" />
            </a>
            <div class="hidden md:block lg:block">
                <ul class="flex gap-5">
                    <a href="/">
                        <li
                            class="rounded-md py-2 px-3 hover:bg-gray-700 transition duration-200 {{ request()->routeIs('home') ? 'bg-gray-900' : '' }}">
                            Home</li>
                    </a>
                    <a href="/blog">
                        <li
                            class="rounded-md py-2 px-3 hover:bg-gray-700 transition duration-200 {{ request()->routeIs('blog') ? 'bg-gray-900' : '' }}">
                            Blog</li>
                    </a>
                    @auth
                        <a href="{{ route('myblog', $user->id) }}">
                            <li
                                class="rounded-md py-2 px-3 hover:bg-gray-700 transition duration-200 {{ request()->routeIs('myblog') ? 'bg-gray-900' : '' }}">
                                MyBlog</li>
                        </a>
                    @endauth
                    <a href="/about">
                        <li
                            class="rounded-md py-2 px-3 hover:bg-gray-700 transition duration-200 {{ request()->routeIs('about') ? 'bg-gray-900' : '' }}">
                            About</li>
                    </a>
                    <a href="/contact">
                        <li
                            class="rounded-md py-2 px-3 hover:bg-gray-700 transition duration-200 {{ request()->routeIs('contact') ? 'bg-gray-900' : '' }}">
                            Contact</li>
                    </a>
                </ul>
            </div>
            <div class="flex items-center gap-5">
                @guest
                    <a href="/login"
                        class="px-3 py-2 bg-green-500/50 border-2 border-green-500 hover:bg-green-500 transition duration-200 font-medium rounded">Login</a>
                @endguest
                @auth
                    @if ($user->avatar)
                        <a href="/profile">
                            <img src="{{ asset('storage/' . $user->avatar) }}" alt=""
                                class="size-12 rounded-full outline -outline-offset-1 outline-white/10" />
                        </a>
                    @else
                        <a href="/profile">
                            <i class='bx bx-user-circle text-[50px]'></i>
                        </a>
                    @endif
                @endauth
                <div class="block md:hidden lg:hidden">
                    <button onclick="openSidebar()" class="flex flex-col gap-2 cursor-pointer">
                        <span class="h-0.5 bg-white w-7"></span>
                        <span class="h-0.5 bg-white w-7"></span>
                        <span class="h-0.5 bg-white w-7"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="overlay" onclick="openSidebar()" class="bg-black/60 inset-0 z-20 fixed hidden"></div>

    <div id="sidebar"
        class="transition shadow-2xl p-5 duration-200 h-screen w-70 bg-gray-800 fixed z-30 top-0 left-0 -translate-x-full">
        <div class="flex flex-col">
            <div class="flex items-center gap-4">
                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                    alt="Your Company" class="size-13" />
                <h1 class="text-[30px] text-white font-medium">Blog</h1>
            </div>
            <ul class="mt-9 flex flex-col text-white gap-5">
                <a href="/"">
                    <li
                        class="text-[20px] px-3 py-2 transition duration-200 rounded-md hover:bg-gray-700 {{ request()->routeIs('home') ? 'bg-gray-900' : '' }}">
                        Home</li>
                </a>
                <a href="/blog">
                    <li
                        class="text-[20px] px-3 py-2 transition duration-200 rounded-md hover:bg-gray-700 {{ request()->routeIs('blog') ? 'bg-gray-900' : '' }}">
                        Blog</li>
                </a>
                @auth
                    <a href="{{ route('myblog', $user->id) }}">
                        <li
                            class="text-[20px] px-3 py-2 transition duration-200 rounded-md hover:bg-gray-700 {{ request()->routeIs('myblog') ? 'bg-gray-900' : '' }}">
                            Myblog</li>
                    </a>
                @endauth
                <a href="/about">
                    <li
                        class="text-[20px] px-3 py-2 transition duration-200 rounded-md hover:bg-gray-700 {{ request()->routeIs('about') ? 'bg-gray-900' : '' }}">
                        About</li>
                </a>
                <a href="/contact">
                    <li
                        class="text-[20px] px-3 py-2 transition duration-200 rounded-md hover:bg-gray-700 {{ request()->routeIs('contact') ? 'bg-gray-900' : '' }}">
                        Contact</li>
                </a>
            </ul>
        </div>
    </div>

    <div class="bg-gray-100 min-h-screen mt-20">
        @yield('content')
    </div>

    <script>
        function openSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');

            overlay.classList.toggle('hidden');
            overlay.classList.toggle('block');
            sidebar.classList.toggle('translate-x');
            sidebar.classList.toggle('-translate-x-full');
        }
    </script>
</body>

</html>
