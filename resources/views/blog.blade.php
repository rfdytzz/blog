@extends('layout.main')

@section('title', 'Blog')

@section('content')

    <div class="w-full bg-white h-20 shadow items-center flex px-10">
        <h1 class="font-medium text-[36px]">
            Blog
        </h1>
    </div>

    <div class="flex flex-col px-15 py-7 justify-center w-full">
        <a href="/blog/create"
            class="flex rounded w-full hover:bg-blue-400 transition duration-200 bg-blue-500 p-3 justify-center text-[20px] text-white font-medium">Create
            Your Post</a>
    </div>

    <form action="{{ route('blog') }}" method="GET" class="flex flex-col">
        <div class="flex justify-center flex-col md:flex-row lg:flex-row w-full px-15 gap-4">
            <div
                class="flex focus-within:border-blue-500 focus-within:bg-white transition duration-200 shadow focus-within:shadow-xl items-center rounded w-full border-2 p-3 gap-3 border-gray-300">
                <i class='bx bx-search text-[30px]'></i>
                <input type="text" placeholder="Search Title or Author" class="focus:outline-0 flex-1" name="search"
                    id="">
            </div>
            <div class="flex gap-4">
                <a href="{{ url()->current() }}">
                    <div
                        class="flex items-center w-fit bg-white border-2 transition duration-200 border-gray-300 rounded shadow hover:shadow-xl cursor-pointer p-3">
                        <i class='bx bx-refresh text-[30px]'></i>
                    </div>
                </a>
                <div
                    class="flex items-center w-fit bg-white border-2 transition duration-200 border-gray-300 rounded shadow hover:shadow-xl cursor-pointer p-3">
                    <select name="filter" id="" class="focus:outline-0">
                        <option value="">All</option>
                        <option value="article">Article</option>
                        <option value="story">Story</option>
                    </select>
                </div>
                <button
                    class="flex-1 flex justify-center items-center w-fit bg-blue-500 text-white border-2 transition duration-200 border-gray-300 rounded shadow hover:shadow-xl cursor-pointer p-3">
                    Filter
                </button>
            </div>
        </div>
        <p class="italic px-16 text-gray-600 py-2">*Enter to search and filter</p>
    </form>

    <div class="py-6 px-5 md:px-10 lg:px-15 min-w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
            @foreach ($data as $item)
                <div class="shadow flex flex-col h-full bg-white p-6 hover:shadow-xl rounded transition duration-200">
                    <div class="flex justify-between">
                        <p class="font-semibold text-sm">{{ ucwords($item->category) }}</p>
                        <p class="text-gray-500 text-sm">{{ $item->created_at->diffForHumans() }}</p>
                    </div>

                    <div class="mt-3">
                        <h1 class="text-[26px] font-medium leading-tight">{{ $item->title }}</h1>
                        <p class="mt-3 text-gray-600">{{ Str::limit($item->content, '200') }}</p>
                    </div>

                    <div class="flex justify-between items-end mt-auto pt-8">
                        <a href="{{ route('author', $item->user->id) }}"
                            class="hover:text-blue-800 hover:border-b-2 hover:border-blue-500 transition duration-200 text-sm font-medium">
                            {{ $item->user->name }}
                        </a>
                        <a href="/blog/detail/{{ $item->id }}"
                            class="flex items-center gap-1 hover:text-blue-800 transition duration-200">
                            <p>Read more</p>
                            <i class='bx bx-right-arrow-alt mt-1'></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function closeSession() {
            const session = document.getElementById('session');

            session.classList.add('hidden');
        }
    </script>

@endsection
