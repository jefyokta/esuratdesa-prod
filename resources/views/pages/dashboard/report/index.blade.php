@extends('layouts.dashboard')


@section('content')
    <div class="flex justify-between my-5 p-5">
        <h1 class="font-semibold text-4xl">Laporan Surat </h1>
        <a onclick="printPage()" class="bg-blue-700 text-white cursor-pointer rounded-md px-5 py-2">Cetak</a>

    </div>
    <div class="my-5">
        <form action="">
            <div id="date-range-picker" date-rangepicker class="flex items-center">
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input id="datepicker-range-start" name="start" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Select date start">
                </div>
                <span class="mx-4 text-gray-500">to</span>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input id="datepicker-range-end" name="end" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Select date end">
                </div>
                <button type="submit" class="bg-indigo-700 text-white ms-5 rounded-md px-5 py-2">Filter</button>
                <a href="/dashboard/reports" type="reset"
                    class="bg-red-700 text-white ms-2 rounded-md px-5 py-2">Reset</a>
            </div>

        </form>

    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Surat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Peminta
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nik
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Keperluan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Alamat
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($letters as $let)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $let->category->title }}

                        </th>
                        <td class="px-6 py-4">
                            {{ $let->resident->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $let->resident->nik }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $let['needed_for'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($let['created_at'])->translatedFormat('d F Y') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $let->resident->dusun . ', RW' . $let->resident->rw . '/RT ' . $let->resident->rt }}
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        const printPage = () => {
            const url = new URL(window.location.href);
            const startDate = url.searchParams.get('start') || '';
            const endDate = url.searchParams.get('end') || '';


            const printUrl = `/dashboard/reports/print?start=${startDate}&end=${endDate}`;

            window.open(printUrl, '_blank');
        }
    </script>
@endsection
