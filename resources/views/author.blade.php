@extends('layout.main')

@section('title', $author->name)

@section('content')

    <div class="w-full bg-white h-20 shadow items-center flex px-10">
        <h1 class="font-medium text-[36px]">
            {{ $author->name }}
        </h1>
    </div>

    <div class="py-6 px-5 md:px-10 lg:px-15 min-w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
            @foreach ($data as $item)
                @if ($item->user->name == $author->name)
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

@endsection
