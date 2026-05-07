@extends('layout.admin')

@section('title', 'All Users - Admin')

@section('content')

    <div class="flex flex-col">
        <h2 class="text-gray-900 font-bold text-[30px]">All Post</h2>
        <p>Manage All Post</p>
    </div>

    <div class="grid grid-cols-3 mt-10 gap-4">
        <div class="bg-white rounded shadow p-5 col-span-2 row-span-2 hover:shadow-xl transition duration-200">
            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>
        <div class="bg-white rounded shadow p-5 hover:shadow-xl transition duration-200">
            <div class="flex items-center gap-2">
                <div class="p-2">
                    <i class='bx bx-user text-[26px] rounded-full shadow p-2'></i>
                </div>
                <div class="flex flex-col">
                    <h3 class="font-bold">Total User</h3>
                    <p>{{ $user->count() }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded shadow p-5 hover:shadow-xl transition duration-200">
            <div class="flex items-center gap-2">
                <div class="p-2">
                    <i class='bx bx-user text-[26px] rounded-full shadow p-2'></i>
                </div>
                <div class="flex flex-col">
                    <h3 class="font-bold">Total Post</h3>
                    <p>{{ $totalPost }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-10 mb-5">
        <form action="" class="flex gap-2">
            <div
                class="flex items-center w-full p-3 border-2 focus-within:border-blue-500 transition duration-200 shadow focus-within:shadow-xl border-gray-300 rounded gap-3">
                <i class='bx bx-search text-[30px]'></i>
                <input class="flex-1 focus:outline-0 text-[18px]" type="text" placeholder="Search here" name="search"
                    id="">
            </div>
            <a href="{{ url()->current() }}"
                class="p-3 flex-1 flex items-center shadow border border-gray-300 hover:shadow-xl cursor-pointer transition duration-200 rounded">
                <i class='bx bx-refresh text-[30px]'></i>
            </a>
        </form>
    </div>
    <div class="bg-gray-100 overflow-x-auto shadow hover:shadow-2xl transition duration-200">
        <table class="w-full">
            <thead class="border-2 border-blue-500 bg-blue-200">
                <tr class="">
                    <th class="text-start p-3">No</th>
                    <th class="text-start p-3">Id</th>
                    <th class="text-start p-3">Title</th>
                    <th class="text-start p-3">Author</th>
                    <th class="text-start p-3">Category</th>
                    <th class="text-start p-3">Created At</th>
                    <th class="text-start p-3">Action</th>
                </tr>
            </thead>
            @foreach ($data as $item)
                <tbody class="border border-gray-300">
                    <tr class="hover:bg-gray-50 transition duration-100">
                        <td class="p-3">{{ $loop->iteration }}</td>
                        <td class="p-3">{{ $item->id }}</td>
                        <td class="p-3 flex items-center gap-4">
                            <div class="flex flex-col --justify-start">
                                <p>{{ $item->title }}</p>
                            </div>
                        </td>
                        <td class="p-3">{{ $item->user->name }}</td>
                        <td class="p-3 flex justify-center">
                            @if ($item->category == 'article')
                                <div class="py-1 px-2 bg-blue-500/20 border-2 border-blue-500 rounded-full text-[11px]">
                                    {{ ucwords($item->category) }}
                                </div>
                            @endif
                            @if ($item->category == 'story')
                                <div class="py-1 px-2 bg-green-500/20 border-2 border-green-500 rounded-full text-[10px]">
                                    {{ ucwords($item->category) }}
                                </div>
                            @endif
                        </td>
                        <td class="p-3">{{ $item->created_at }}</td>
                        <td class="p-3">
                            <a href=""
                                class="px-3 py-2 text-blue-500 hover:bg-blue-600 hover:text-blue-200 transition duration-200 rounded bg-blue-500/20 border-2 border-blue-500">Detail</a>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
    <div class="mt-6 pb-10">
        {{ $data->links() }}
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: '# of Votes',
                    data: {!! json_encode($values) !!},
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

@endsection
