@extends('layouts.app')

@section('content')
<h1 class="font-semibold text-4xl pt-10 text-white">Buat surat</h1>
    <div class="w-full flex p-5 justify-center">
        @foreach ($categories as $item)
            <div
                class="w-full max-w-sm bg-white border border-gray-200 rounded-lg m-5 shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#" class="w-full flex justify-center">
                    <img class="p-8 rounded-t-lg" src="/img/surat.png" alt="product image" />
                </a>
                <div class="px-5 pb-5">
                    <a href="#" class="mb-2.5">
                        <h5 class="text-xl font-semibold tracking-tight mb-5 text-gray-900 dark:text-white">Surat Keterangan
                            {{ $item['title'] }}
                        </h5>
                    </a>

                    <div class="flex items-center justify-between">
                        <a href="/letter/{{ $item['id'] }}"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buat</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
