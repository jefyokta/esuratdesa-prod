@extends('layouts.dashboard')


@section('content')

    <div class="flex justify-between my-5 p-5">
        <h1 class="font-semibold text-xl"> Tambah Surat</h1>
    </div>

    <div class="flex w-full justify-center">
        @include('components.letterForm')
    </div>

    {{-- <form class="max-w-sm mx-auto" action="/letters/add" method="POST">
        @csrf
        <input type="hidden" value="/dashboard/letters" name="redirect">
        <div class="mb-10">
            <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama :
                {{ $resident['name'] }}</div>
            <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nik :
                {{ $resident['nik'] }}</div>

        </div>
        <div class="mb-5">
            <input type="hidden" id="resident" name="resident_id"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                value="{{ $resident['id'] }}" required />
        </div>
        <div class="mb-5">
            <label for="nedded_for" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keperluan</label>
            <input type="text" id="nedded_for" name="needed_for"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                required />
        </div>
        <div class="mb-5">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                option</label>
            <select id="countries"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                name="category_id">
                @foreach ($categories as $item)
                    <option value="{{ $item['id'] }}">{{ $item['title'] }}</option>
                @endforeach

            </select>
        </div>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buat
            Surat</button>
    </form> --}}
@endsection
