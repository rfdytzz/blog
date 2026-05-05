@extends('layout.raw')

@section('title', 'Login')

@section('content')

    <div class="w-full h-screen flex justify-center items-center">
        <div
            class="lg:shadow-xl md:shadow-xl shadow-none  px-5 py-10 focus-within:shadow-none md:focus-within:shadow-2xl lg:focus-within:shadow-2xl  transition duration-200">
            <div class="font-bold w-full md:w-100 lg:w-100 text-[45px] text-center">Login</div>
            <div class="px-5 mt-5">
                @if (session('success'))
                    <div id="session"
                        class="bg-green-500/20 rounded items-center border-2 p-4 text-green-500 flex justify-between border-green-500">
                        {{ session('success') }}
                        <i class='bx bx-x text-[20px] cursor-pointer' onclick="closeSession()"></i>
                    </div>
                @endif
                @if (session('failed'))
                    <div id="session"
                        class="bg-red-500/20 rounded items-center border-2 p-4 text-red-500 flex justify-between border-red-500">
                        {{ session('failed') }}
                        <i class='bx bx-x text-[20px] cursor-pointer' onclick="closeSession()"></i>
                    </div>
                @endif
            </div>
            <form id="form" action="{{ route('login.user') }}" method="POST" class="mt-8 flex flex-col gap-5 px-5">
                @csrf
                <div
                    class="flex p-3 gap-2 border-2 border-gray-300 rounded shadow focus-within:shadow-xl transition duration-200 focus-within:border-blue-500">
                    <i class='bx bx-envelope text-[30px]'></i>
                    <input type="email" name="email" placeholder="Email" class="focus:outline-0 w-full">
                </div>
                <div
                    class="flex p-3 gap-2 border-2 border-gray-300 rounded shadow focus-within:shadow-xl transition duration-200 focus-within:border-blue-500">
                    <div class="flex gap-2 w-full">
                        <i class='bx bx-lock-alt text-[30px]'></i>
                        <input id="password" minlength="8" name="password" type="password" placeholder="Password"
                            class="focus:outline-0 flex-1">
                    </div>
                    <i onclick="toggle()" id="toggle" class='bx bx-hide text-[30px] cursor-pointer'></i>
                </div>
                <div class="flex justify-between mb-5">
                    <div class="flex gap-2 items-center">
                        <input type="checkbox" class="" name="" id="">
                        Remember Me
                    </div>
                    <a href="" class="hover:text-blue-500 transition duration-200">Forgot Password?</a>
                </div>
                <button
                    class="w-full bg-green-500/70 hover:bg-green-500 transition duration-200 border-2 border-green-500 text-white py-2 rounded cursor-pointer text-[20px]">Login</button>
                <p class="text-center">Dont have an Account? <a href="/register" class="text-blue-500">Register</a></p>
            </form>
        </div>
    </div>

    <script>
        function closeSession() {
            const session = document.getElementById('session');

            session.classList.add('hidden');
        }

        function toggle() {
            const password = document.getElementById('password');
            const toggle = document.getElementById('toggle');

            if (password.type == 'password') {
                password.setAttribute('type', 'text');

                toggle.classList.remove('bx-hide');
                toggle.classList.add('bx-show');
            } else {
                password.setAttribute('type', 'password');

                toggle.classList.remove('bx-show');
                toggle.classList.add('bx-hide');
            }
        }
    </script>

@endsection
