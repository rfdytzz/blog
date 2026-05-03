@extends('layout.main')

@section('title', 'About')

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
                    <a href=""
                        class="hover:bg-gray-100 {{ request()->routeIs('profile') ? 'bg-gray-100' : '' }} rounded p-3 flex-1 transition duration-200">Account
                        Information</a>
                    <a href="/profile/change-password"
                        class="hover:bg-gray-100 {{ request()->routeIs('change_password') ? 'bg-gray-100' : '' }} rounded p-3 flex-1 transition duration-200">Change
                        Password</a>
                </ul>
            </div>
            <div class="bg-white flex shadow-sm border border-gray-100 p-8 flex-1">
                <div class="flex flex-col gap-6 w-full">
                    <h1 class="text-2xl font-bold text-gray-800">Account Information</h1>

                    <form action="{{ route('update.user', $user->id) }}" class="space-y-8" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="flex items-center gap-8" x-data="{ photoPreview: null }">
                            <div class="relative">
                                <img src="{{ asset('storage/' . $user->avatar) }}" alt="Profile"
                                    class="size-32 rounded-full object-cover ring-4 ring-gray-50 shadow-sm" />
                            </div>

                            <div class="flex flex-col gap-3">
                                <label class="block mb-2.5 text-sm font-medium text-heading" for="file_input">Upload
                                    Avatar</label>
                                <input
                                    class="cursor-pointer p-2 rounded bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full shadow-xs placeholder:text-body"
                                    id="file_input" name="avatar" type="file">
                                <p class="text-[11px] text-gray-400 font-medium uppercase tracking-wider">
                                    JPG, PNG (Max 10MB)
                                </p>
                            </div>
                        </div>

                        <div class="grid gap-6">
                            <div class="flex gap-5">
                                <div class="flex flex-1 flex-col gap-2">
                                    <label for="name" class="text-sm font-semibold text-gray-700 ml-1">Full Name</label>
                                    <input type="text" id="name" required name="name" value="{{ $user->name }}"
                                        placeholder="Your name"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none text-gray-600 placeholder:text-gray-400">
                                </div>
                                <div class="flex flex-1 flex-col gap-2">
                                    <label for="name" class="text-sm font-semibold text-gray-700 ml-1">Email</label>
                                    <input type="text" required id="name" name="email" value="{{ $user->email }}"
                                        disabled placeholder="Your Email"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none text-gray-600 placeholder:text-gray-400">
                                </div>
                            </div>
                            <div class="flex gap-5">
                                <div class="flex flex-1 flex-col gap-2">
                                    <label for="name" class="text-sm font-semibold text-gray-700 ml-1">Phone
                                        Number</label>
                                    <input type="text" id="name" required name="phone_number"
                                        value="{{ $user->phone_number }}" placeholder="Phone Number"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none text-gray-600 placeholder:text-gray-400">
                                </div>
                                <div class="flex flex-1 flex-col gap-2">
                                    <label for="name" class="text-sm font-semibold text-gray-700 ml-1">Birthdate</label>
                                    <input type="date" name="birthdate" id="name" required
                                        value="{{ $user->birthdate }}" placeholder="Your Email"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none text-gray-600 placeholder:text-gray-400">
                                </div>
                            </div>

                            <div class="flex flex-1 flex-col gap-2">
                                <label for="name" name="birthdate"
                                    class="text-sm font-semibold text-gray-700 ml-1">Gender</label>
                                <select id="name" required name="gender"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none text-gray-600 placeholder:text-gray-400">
                                    <option>Select Gender</option>
                                    <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female
                                    </option>
                                </select>
                            </div>


                            <button type="submit"
                                class="w-fit  px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg transition-colors shadow-lg shadow-blue-500/20">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
    </div>

@endsection
