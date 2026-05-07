@extends('layout.main')

@section('title', 'My Blog')

@section('content')

    <div class="w-full bg-white h-20 shadow items-center flex px-10">
        <h1 class="font-medium text-[36px]">
            {{ $author->name }}
        </h1>
    </div>

    @auth
        <div class="flex flex-col px-15 py-7 justify-center w-full">
            <a href="/blog/create"
                class="flex rounded w-full hover:bg-blue-400 transition duration-200 bg-blue-500 p-3 justify-center text-[20px] text-white font-medium">Create
                Your Post</a>
        </div>
    @endauth

    <form action="{{ route('myblog', $user->id) }}" method="GET" class="flex flex-col">
        <div class="flex justify-center flex-col md:flex-row lg:flex-row w-full px-15 gap-4">
            <div
                class="flex focus-within:border-blue-500 focus-within:bg-white transition duration-200 shadow focus-within:shadow-xl items-center rounded w-full border-2 p-3 gap-3 border-gray-300">
                <i class='bx bx-search text-[30px]'></i>
                <input type="text" placeholder="Search Title" class="focus:outline-0 flex-1" name="search"
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
        <div class="px-4">
            @if (session('success'))
                <div id="session"
                    class="bg-green-500/20 rounded items-center border-2 p-3 text-green-500 flex justify-between border-green-500">
                    {{ session('success') }}
                    <i class='bx bx-x text-[20px] cursor-pointer' onclick="closeSession()"></i>
                </div>
            @endif
            @if (session('failed'))
                <div id="session"
                    class="bg-red-500/20 rounded items-center border-2 p-3 text-red-500 flex justify-between border-red-500">
                    {{ session('failed') }}
                    <i class='bx bx-x text-[20px] cursor-pointer' onclick="closeSession()"></i>
                </div>
            @endif
        </div>
    </form>


    <div class="py-6 px-5 md:px-10 lg:px-15 min-w-full">
        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4">
            @foreach ($data as $item)
                @if ($item->user->name == $author->name)
                    <div class="shadow flex flex-col h-full bg-white p-6 hover:shadow-xl rounded transition duration-200">
                        <div class="flex flex-col lg:flex-row justify-between">
                            <div class="flex gap-5 items-center">
                                <form action="{{ route('delete', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Sure to Delete this Post?')"
                                        class="bg-red-400 hover:bg-red-500 transition duration-200 px-3 text-white rounded py-2 cursor-pointer">Delete
                                        post</button>
                                </form>
                                <a href="{{ route('edit', $item->id) }}"
                                    class="bg-yellow-400 hover:bg-yellow-500 transition duration-200 px-3 text-white rounded py-2 cursor-pointer">Edit
                                    post</a>
                                <p class="font-semibold text-sm">{{ ucwords($item->category) }}</p>
                            </div>
                            <div class="flex flex-col text-start lg:text-end mt-5 lg:mt-0">
                                Created at {{ $item->created_at }} WIB 
                                Updated at {{ $item->updated_at }} WIB
                                <p class="text-gray-500 text-sm">{{ $item->created_at->diffForHumans() }}</p>
                            </div>
                        </div>

                        <div class="mt-3">
                            <h1 class="text-[26px] font-medium leading-tight">{{ $item->title }}</h1>
                            <p class="mt-3 text-gray-600">{{ Str::limit($item->content, '200') }}</p>
                        </div>

                        <div class="flex justify-between items-end mt-auto pt-8">
                            <p
                                class="hover:text-blue-800 hover:border-b-2 hover:border-blue-500 transition duration-200 text-sm font-medium">
                                {{ $item->user->name }}
                            </p>
                            <a href="/blog/detail/{{ $item->id }}"
                                class="flex items-center gap-1 hover:text-blue-800 transition duration-200">
                                <p>Read more</p>
                                <i class='bx bx-right-arrow-alt mt-1'></i>
                            </a>
                        </div>
                    </div>
                @endif
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
