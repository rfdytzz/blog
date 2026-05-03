@extends('layout.main')

@section('title', 'Change Password')

@section('content')

    <div class="w-full bg-white justify-between h-25 shadow items-center flex px-10">
        <h1 class="font-medium text-[36px]">
            Profile Account
        </h1>
        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" onclick="return confirm('Sure to Logout?')"
                    class="px-3 py-2 cursor-pointer bg-red-500/50 border-2 border-red-500 hover:bg-red-500 transition duration-200 font-medium rounded">Logout</button>
            </form>
        @endauth
    </div>


    <div class="w-full p-5">
        <div class="flex flex-col md:flex-row lg:flex-row w-full">
            <div class="bg-gray-200 w-full md:w-60 lg:w-60 p-5">
                <ul class="flex flex-col gap-3">
                    <a href="/profile"
                        class="hover:bg-gray-100 {{ request()->routeIs('profile') ? 'bg-gray-100' : '' }} rounded p-3 flex-1 transition duration-200">Account
                        Information</a>
                    <a href="/profile/change-password"
                        class="hover:bg-gray-100 {{ request()->routeIs('change.page') ? 'bg-gray-100' : '' }} rounded p-3 flex-1 transition duration-200">Change
                        Password</a>
                </ul>
            </div>
            <div class="bg-white flex-col gap-9 flex shadow-sm border border-gray-100 p-8 flex-1">
                <h1 class="text-2xl font-bold text-gray-800">Change Password</h1>
                @if (session('failed'))
                    <div id="session"
                        class="bg-red-500/20 border-2 border-red-500 p-3 rounded flex items-center justify-between">
                        {{ session('failed') }}
                        <i class='bx bx-x cursor-pointer' onclick="closeSession()"></i>
                    </div>
                @endif
                @if (session('success'))
                    <div id="session"
                        class="bg-green-500/20 border-2 border-green-500 p-3 rounded flex items-center justify-between">
                        {{ session('success') }}
                        <i class='bx bx-x cursor-pointer' onclick="closeSession()"></i>
                    </div>
                @endif
                <form action="{{ route('change.password', $user->id) }}" method="POST" class="flex flex-col gap-5">
                    @csrf
                    <div class="flex flex-1 flex-col gap-2">
                        <label for="name" class="text-sm font-semibold text-gray-700 ml-1">Old Password</label>
                        <input type="password" id="old_password" required name="old_password" minlength="8"
                            placeholder="Your old Password"
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none text-gray-600 placeholder:text-gray-400">
                    </div>
                    <div class="flex flex-1 flex-col gap-2">
                        <label for="name" class="text-sm font-semibold text-gray-700 ml-1">New Password</label>
                        <input type="password" required id="new_password" name="new_password" minlength="8" placeholder="New Password"
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none text-gray-600 placeholder:text-gray-400">
                    </div>
                    <div class="flex gap-3 px-2">
                        <input class="focus:outline-0" type="checkbox" onclick="showHidePassword()" name="" id="toggle">
                        <label for="">Show Password</label>
                    </div>
                    <button type="submit" class="cursor-pointer bg-blue-500 py-3 rounded text-white">Change
                        Password</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function closeSession() {
            const session = document.getElementById('session');

            session.classList.add('hidden')
        }

        function showHidePassword() {
            const old_password = document.getElementById('old_password');
            const new_password = document.getElementById('new_password');

            if (old_password.type == 'password') {
                old_password.setAttribute('type', 'text')
                new_password.setAttribute('type', 'text')
            } else {
                old_password.setAttribute('type', 'password')
                new_password.setAttribute('type', 'password')
            }
        }
    </script>

@endsection
