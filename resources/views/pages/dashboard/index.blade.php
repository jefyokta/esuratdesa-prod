@extends('layouts.dashboard')


@section('content')
    <div class="flex justify-between my-5 p-5">
        <h1 class="font-semibold text-4xl">Dashboard</h1>
    </div>
    <div class="flex flex-wrap mb-24 justify-center">

        <a href="/dashboard/residents"
            class="flex mx-5 w-full md:w-96 flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            {{-- <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                src="/docs/images/blog/image-4.jpg" alt=""> --}}
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Jumlah Penduduk</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $residents }} Orang</p>
            </div>
        </a>
        <a href="/dashboard/letters"
            class="flex mx-5 w-full md:w-96 flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            {{-- <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                src="/docs/images/blog/image-4.jpg" alt=""> --}}
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Jumlah Surat</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $letters }} Surat</p>
            </div>
        </a>

    </div>
    <div class="w-full flex justify-center">

        <div id="chart" class="w-full md:w-96 flex flex-wrap justify-center flex-col items-center">
            <h1 class=" font-semibold text-xl mb-5">Surat</h1>
            <canvas id="ctx"></canvas>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", async function() {
            const done = async () => {
                const r = await fetch('/api/letters?o=done');
                const json = await r.json();
                return json.count;
            };

            const pending = async () => {
                const r = await fetch('/api/letters?o=pending');
                const json = await r.json();
                return json.count;
            };

            const pendingCount = await pending();
            const doneCount = await done();

            const container = document.getElementById('ctx');
            const data = {
                labels: ['Pending', 'Selesai'],
                datasets: [{
                    data: [pendingCount, doneCount],
                    backgroundColor: ['rgb(255, 99, 132)', 'rgb(54, 162, 35)'],
                    hoverOffset: 4
                }]
            };

            const config = {
                type: 'doughnut',
                data: data,
            };

            new Chart(container, config);
        });
    </script>
@endsection
