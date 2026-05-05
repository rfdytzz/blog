@extends('layout.admin')

@section('title', 'Admin')

@section('content')

    <div class="flex flex-col">
        <h2 class="text-gray-900 font-bold text-[30px]">Dashboard</h2>
        <p>Manage All User</p>
    </div>

    <div class="grid grid-cols-3 mt-10 gap-4">
        <div class="bg-red-500 p-5">1</div>
        <div class="bg-yellow-500 p-5">2</div>
        <div class="bg-blue-500 p-5">3</div>
        <div class="bg-green-500 p-5 col-span-2">4</div>
        <div class="bg-gray-500 p-5">5</div>
    </div>

@endsection