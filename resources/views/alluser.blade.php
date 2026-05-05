@extends('layout.admin')

@section('title', 'Admin')

@section('content')

    <div class="flex flex-col">
        <h2 class="text-gray-900 font-bold text-[30px]">All USers</h2>
        <p>Manage All User</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mt-10 gap-4">
        <div class="bg-red-500 p-5 text-white flex flex-col gap-2">
            <h3 class="font-bold text-[26px]">Total Users</h3>
            <p class="text-[30px] px-2 font-bold">{{ $data->count() }}</p>
        </div>
        <div class="bg-yellow-500 p-5 text-white flex flex-col gap-2">
            <h3 class="font-bold text-[26px]">Total Post</h3>
            <p class="text-[30px] px-2 font-bold">
                {{ $user->count() }}
            </p>
        </div>
        <div class="bg-gray-500 p-5 text-white flex flex-col gap-2">
            <h3 class="font-bold text-[26px]">Total Users</h3>
            <p class="text-[30px] px-2 font-bold">{{ $data->count() }}</p>
        </div>
    </div>

    <div class="mt-10">
        <div class="bg-gray-100 overflow-x-auto">
            <table class="w-full">
                <thead class="border-2 border-blue-500 bg-blue-200">
                    <tr class="">
                        <th class="text-start p-3">No</th>
                        <th class="text-start p-3">Name</th>
                        <th class="text-start p-3">Phone Number</th>
                        <th class="text-start p-3">Gender</th>
                        <th class="text-start p-3">Created At</th>
                        <th class="text-start p-3">Action</th>
                    </tr>
                </thead>
                @foreach ($data as $item)
                    <tbody class="divide divide-blue-500">
                        <tr class="hover:bg-gray-50 transition duration-100">
                            <td class="p-3">{{ $loop->iteration }}</td>
                            <td class="p-3 flex items-center gap-4">
                                <img src="{{ asset('storage/' . $item->avatar) }}" class="size-13 rounded-full" alt="">
                                <div class="flex flex-col --justify-start">
                                    <p>{{ $item->name }}</p>
                                    <p class="text-[13px]">{{ $item->email }}</p>
                                </div>
                            </td>
                            <td class="p-2">0{{ $item->phone_number }}</td>
                            <td class="p-2">{{ ucwords($item->gender) }}</td>
                            <td class="p-2">{{ $item->created_at }}</td>
                            <td class="p-2">
                                <a href="" class="px-3 py-2 text-blue-500 hover:bg-blue-600 hover:text-blue-200 transition duration-200 rounded bg-blue-500/20 border-2 border-blue-500">Detail</a>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>

@endsection
