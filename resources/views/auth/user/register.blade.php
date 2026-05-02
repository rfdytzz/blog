@extends('layout.raw')

@section('title', 'Register')

@section('content')

    <div class="w-full h-screen flex justify-center items-center my-0 md:my-0 lg:my-10">
        <div class="shadow-xl px-5 py-10 w-150 focus-within:shadow-2xl transition duration-200">
            <div class="font-bold w-full md:w-100 lg:w-100 text-[45px] md:pl-30 pl-0 lg:pl-39 text-center">Register</div>
            @if (session('failed'))
                <div id="session"
                    class="mt-8 bg-red-500 flex justify-between items-center p-4 rounded mx-5 text-white mb-4">
                    {{ session('failed') }}
                    <i class='bx bx-x text-[20px] cursor-pointer' onclick="closeSession()"></i>
                </div>
            @endif
            @if (session('success'))
                <div id="session"
                    class="mt-8 bg-green-500 flex justify-between items-center p-4 rounded mx-5 text-white mb-4">
                    {{ session('success') }}
                    <i class='bx bx-x text-[20px] cursor-pointer' onclick="closeSession()"></i>
                </div>
            @endif
            <form id="form" action="{{ route('register') }}" method="POST" class="mt-8 flex flex-col gap-5 px-5">
                @csrf
                <div
                    class="flex rounded focus-within:outline-2 focus-within:outline-gray-900 focus-within:shadow-xl outline-2 outline-gray-500 transition duration-200 items-center p-2 gap-2">
                    <i class='bx bx-user text-[30px]'></i>
                    <input type="text" name="name" placeholder="Name" class="w-full focus:outline-0">
                </div>
                <div
                    class="flex rounded focus-within:outline-2 focus-within:outline-gray-900 focus-within:shadow-xl outline-2 outline-gray-500 transition duration-200 items-center p-2 gap-2">
                    <i class='bx bx-envelope text-[30px]'></i>
                    <input type="text" name="email" placeholder="Email" class="w-full focus:outline-0">
                </div>
                <div
                    class="flex rounded focus-within:outline-2 focus-within:outline-gray-900 focus-within:shadow-xl outline-2 outline-gray-500 transition duration-200 items-center p-2 gap-2">
                    <i class='bx bx-phone text-[30px]'></i>
                    <input type="tel" name="phone_number" placeholder="Phone Number" class="w-full focus:outline-0">
                </div>
                <div
                    class="flex rounded focus-within:outline-2 focus-within:outline-gray-900 focus-within:shadow-xl outline-2 outline-gray-500 transition duration-200 items-center p-2 gap-2">
                    <i class='bx bx-male-sign text-[30px]'></i>
                    <select name="gender" class="focus:outline-0 w-full">
                        <option selected>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div
                    class="flex rounded focus-within:outline-2 focus-within:outline-gray-900 focus-within:shadow-xl outline-2 outline-gray-500 transition duration-200 items-center p-2 gap-2">
                    <i class='bx bx-calendar text-[30px]'></i>
                    <input type="date" name="birthdate" class="w-full focus:outline-0">
                </div>
                <hr>
                <div
                    class="flex justify-between rounded focus-within:outline-2 focus-within:outline-gray-900 focus-within:shadow-xl outline-2 outline-gray-500 transition duration-200 items-center p-2 gap-2">
                    <div class="flex gap-2 w-full">
                        <i class='bx bx-lock-alt text-[30px]'></i>
                        <input id="password" minlength="8" name="password" type="password" placeholder="Password"
                            class="focus:outline-0 w-full flex-1">
                    </div>
                    <i onclick="toggle()" id="toggle" class='bx bx-hide text-[30px] cursor-pointer'></i>
                </div>
                <div class="flex justify-between mb-5">
                    <div class="flex gap-2 items-center">
                        <input type="checkbox" class="" name="" id="">
                        Remember Me
                    </div>
                </div>
                <button
                    class="w-full bg-green-500/70 hover:bg-green-500 transition duration-200 border-2 border-green-500 text-white py-2 rounded cursor-pointer text-[20px]">Register</button>
                <p class="text-center">have an Account? <a href="/login" class="text-blue-500">Login</a></p>
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
