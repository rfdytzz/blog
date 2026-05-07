@extends('layout.main')

@section('title', $author->name)

@section('content')

    <div class="w-full h-fit bg-white shadow items-center flex px-15 justify-between">
        <div class="flex gap-4 items-center py-5">
            <img src="{{ asset('storage/' . $author->avatar) }}" class="size-20 rounded-full" alt="">
            <div class="flex flex-col">
                <h1 class="font-medium text-[36px]">
                    {{ $author->name }}
                </h1>
                <p class="-mt-2">{{ $author->bio }}</p>
            </div>
        </div>
        <div class="flex flex-col gap-2 ">
            <p class="text-end">Share this Profile</p>
            <div class="flex gap-3">
                <a href="https://whatsapp.com" class="flex items-center gap-2 bg-green-500 text-white p-2 rounded"><i
                        class='bx bxl-whatsapp text-[25px] mt-1'></i> WhatsApp</a>
                <a href="https://whatsapp.com" class="flex items-center gap-2 bg-blue-500 text-white p-2 rounded"><i
                        class='bx bxl-facebook text-[25px] mt-1'></i> Facebook</a>
            </div>
        </div>
    </div>

    <div class="py-6 px-5 md:px-10 lg:px-15 min-w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
            @foreach ($data as $item)
                @if ($item->user->name == $author->name)
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
