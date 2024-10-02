@extends('layouts.app')

@section('content')
    <div class="w-full">

        <h1 class="text-center block font-semibold text-4xl text-white mb-5">Surat {{ $person['name'] }}</h1>
        <div class="w-full flex justify-center">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full bg-white text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No </th>
                            <th scope="col" class="px-6 py-3">
                                Jenis Surat
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Keperluan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Detail
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($letters as $let)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $i++ }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Surat Keterangan {{ $let->category->title }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $let['needed_for'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $let['details'] ?? '-' }}
                                </td>
                                <td class="px-6 py-4">
                                    {!! $let['status'] ? '<p class="text-emerald-500">Selesai</p>' : '<p class="text-red-500">Pending</p>' !!}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    @if ($let['status'])
                                        <a href="/print/{{ $let['id'] }}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Download</a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <td class="text-center p-5" colspan="6">Kamu Belum Membuat Surat . Buat <a href="/letters"
                                    class="text-blue-500 underline">di
                                    sini</a></td>
                        @endforelse

                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
