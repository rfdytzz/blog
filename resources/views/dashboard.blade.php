@extends('layout.admin')

@section('title', 'Admin')

@section('content')

    <div class="flex flex-col">
        <h2 class="text-gray-900 font-bold text-[30px]">Dashboard</h2>
        <p>Manage All User</p>
    </div>

    <div class="grid grid-cols-3 mt-10 gap-4">
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
                    <i class='bx bxs-news text-[26px] rounded-full shadow p-2'></i>
                </div>
                <div class="flex flex-col">
                    <h3 class="font-bold">Total Article</h3>
                    <p>{{ $totalArticle }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded shadow p-5 hover:shadow-xl transition duration-200">
            <div class="flex items-center gap-2">
                <div class="p-2">
                    <i class='bx bx-history text-[26px] rounded-full shadow p-2'></i>
                </div>
                <div class="flex flex-col">
                    <h3 class="font-bold">Total Story</h3>
                    <p>{{ $totalStory }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded shadow col-span-2 row-span-2 p-5 hover:shadow-xl transition duration-200">
            <canvas id="myChart"></canvas>
        </div>
        <div class="bg-white rounded shadow p-5 hover:shadow-xl transition duration-200">
            <div class="flex items-center gap-2">
                <div class="p-2">
                    <i class='bx bx-history text-[26px] rounded-full shadow p-2'></i>
                </div>
                <div class="flex flex-col">
                    <h3 class="font-bold">Total Story</h3>
                    <p>{{ $user->count() }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded shadow p-5 hover:shadow-xl transition duration-200">
            <div class="flex items-center gap-2">
                <div class="p-2">
                    <i class='bx bx-history text-[26px] rounded-full shadow p-2'></i>
                </div>
                <div class="flex flex-col">
                    <h3 class="font-bold">Total Story</h3>
                    <p>{{ $user->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Total',
                    data: {!! json_encode($data) !!},
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 30
                    }
                }
            }
        });
    </script>

@endsection
