@extends('layout.main')

@section('title', $data->title)

@section('content')

    <div class="w-full bg-white h-20 shadow items-center flex px-10">
        <h1 class="font-medium text-[36px]">
            {{ $data->user->name }} / {{ $data->id }}
        </h1>
    </div>

    <div class="w-full p-5">
        <div class="bg-white rounded shadow p-10 flex flex-col gap-10">
            <div class="flex flex-col">
                <p>Author : {{ $data->user->name }}</p>
                <h1 class="font-bold text-[40px]">{{ $data->title }}</h1>
                <p class="text-gray-600">{{ ucwords($data->category) }} | {{ $data->subtitle }}</p>
                <p class="mt-2">Created at : {{ $data->created_at }} WIB</p>
            </div>
            <p>{{ $data->content }}</p>
            <a href="{{ url()->previous() }}" class="p-3 bg-blue-500 rounded w-fit text-white">Back</a>
        </div>
    </div>

@endsection
