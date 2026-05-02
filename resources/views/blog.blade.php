@extends('layout.main')

@section('title', 'Blog')

@section('content')

    <div class="w-full bg-white h-20 shadow items-center flex px-10">
        <h1 class="font-medium text-[36px]">
            Blog
        </h1>
    </div>

    @auth
        <div class="flex flex-col px-15 py-7 justify-center w-full">
            <a href="/blog/create"
                class="flex rounded w-full hover:bg-blue-400 transition duration-200 bg-blue-500 p-3 justify-center text-[20px] text-white font-medium">Create
                Your Blog</a>
        </div>
    @endauth

    <form action="{{ route('blog') }}" method="GET" class="flex flex-col">
        <div class="grid grid-cols-8 px-15 py-7 justify-center w-full gap-5">
            <div
                class="flex col-span-8 flex-1 items-center focus-within:outline-2 focus-within:outline-blue-500 p-3 gap-4 bg-white rounded outline-2 transition duration-200 shadow focus-within:shadow-xl">
                <i class='bx bx-search text-[30px]'></i>
                <input type="text" class="flex-1 focus:outline-0" placeholder="Search Title or Author" name="search"
                    id="">
            </div>
            <div class="flex gap-5">
                <div
                    class="focus-within:outline-blue-500 w-fit items-center flex outline-2 px-3 shadow focus-within:shadow-xl transition duration-200 rounded bg-white">
                    <select name="filter" id="" class="text-[20px] focus:outline-0">
                        <option value="">All</option>
                        <option value="article">Article</option>
                        <option value="story">Story</option>
                    </select>
                </div>
                <button type="submit"
                    class="bg-green-400 transition duration-200 border-2 border-gray-900 cursor-pointer hover:bg-green-500 items-center flex px-5 rounded text-white text-[20px]">
                    Filter
                </button>
                <div class="hidden md:block lg:block">
                    <a href="{{ url()->current() }}"
                        class="bg-white w-fit hover:outline-blue-500 p-3 shadow hover:shadow-xl transition duration-200 flex items-center rounded outline-2">
                        <i class='bx bx-refresh text-[40px]'></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="text-end mr-15">
            <p class="italic">*Enter or Filter to Search</p>
        </div>
    </form>


    <div class="py-6 px-5 md:px-10 lg:px-15 min-w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
            @foreach ($data as $item)
                <div class="shadow flex flex-col h-full bg-white p-6 hover:shadow-xl rounded transition duration-200">
                    <div class="flex justify-between">
                        <p class="font-semibold text-sm">{{ ucwords($item->category) }}</p>
                        <p class="text-gray-500 text-sm">14 days ago</p>
                    </div>

                    <div class="mt-3">
                        <h1 class="text-[26px] font-medium leading-tight">{{ $item->title }}</h1>
                        <p class="mt-3 text-gray-600">{{ Str::limit($item->content, '200') }}</p>
                    </div>

                    <div class="flex justify-between items-end mt-auto pt-8">
                        <a href="" class="hover:text-blue-800 transition duration-200 text-sm font-medium">
                            {{ $item->user->name }}
                        </a>
                        <a href="/blog/detail/{{ $item->id }}" class="flex items-center gap-1 hover:text-blue-800 transition duration-200">
                            <p>Read more</p>
                            <i class='bx bx-right-arrow-alt mt-1'></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
