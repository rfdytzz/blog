@extends('layout.main')

@section('title', 'Create')

@section('content')

    <div class="w-full bg-white h-20 shadow items-center flex px-10">
        <h1 class="font-medium text-[36px]">
            Create Post
        </h1>
    </div>

    <div class="bg-white flex justify-center shadow-2xl border border-gray-100 p-8 flex-1">
        <div class="flex flex-col gap-6 w-300">
            <h1 class="text-[30px] font-bold text-gray-800">Post Create</h1>

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

            <form action="{{ route('post.create') }}" class="space-y-8" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-1 flex-col gap-2">
                    <label for="name" class="text-sm font-semibold text-gray-700 ml-1">Post Thumbnail (nullable)</label>
                    <input type="file" id="thumbnail" required name="thumbnail" placeholder="Title"
                        class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none text-gray-600 placeholder:text-gray-400">
                </div>

                <div class="grid gap-6">
                    <div class="flex flex-1 flex-col gap-2">
                        <label for="name" class="text-sm font-semibold text-gray-700 ml-1">Post Title</label>
                        <input type="text" id="name" required name="title" placeholder="Title"
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none text-gray-600 placeholder:text-gray-400">
                    </div>
                    <div class="flex gap-5">
                        <div class="flex flex-1 flex-col gap-2">
                            <label for="name" class="text-sm font-semibold text-gray-700 ml-1">Sub Title
                                (nullable)</label>
                            <input type="text" id="name" required name="subtitle" placeholder="Sub Title"
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none text-gray-600 placeholder:text-gray-400">
                        </div>
                        <div class="flex flex-1 flex-col gap-2">
                            <label for="name" name="birthdate" class="text-sm font-semibold text-gray-700 ml-1">Post
                                Category</label>
                            <select id="name" required name="category"
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none text-gray-600 placeholder:text-gray-400">
                                <option>Select Category</option>
                                <option value="article">Article</option>
                                <option value="story">Story</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex flex-1 flex-col gap-2">
                        <label for="name" class="text-sm font-semibold text-gray-700 ml-1">Content</label>
                        <textarea
                            class="w-full p-3 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all outline-none text-gray-600 placeholder:text-gray-400"
                            name="content" id="" cols="30" rows="10"></textarea>
                    </div>

                    <div class="flex gap-3">
                        <button type="submit"
                            class="w-fit  px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg transition-colors shadow-lg shadow-blue-500/20">
                            Save
                        </button>
                        <a href="{{ url()->previous() }}"
                            class="w-fit  px-8 py-3 bg-gray-600 hover:bg-gray-700 text-white font-bold rounded-lg transition-colors shadow-lg shadow-blue-500/20">
                            Back
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
