@extends('layouts.app')

@section('content')
    <div class="w-full text-center">
        <img src="/img/logodesa.png" class="mx-auto my-10" alt="">
        <h1 class="text-white text-4xl font-bold">SELAMAT DATANG DI
        </h1>
        <h1 class="text-white text-4xl font-bold">WEB APLIKASI PELAYANAN SURAT ADMINISTRASI DESA
        </h1>
        {{-- <p class="text-white text-xl font-semibold">Desa {{ config('app.village') }}</p> --}}
        {{-- <p class="text-white text-xl font-semibold capitalize"> {{ config('app.address') }}</p> --}}
        <div class="mt-10 w-full flex justify-center ">
            <a href="/letters"
                class="p-2.5  border rounded-md text-white mt-15 hover:bg-white cursor-pointer hover:text-black font-semibold text-2xl flex items-center space-x-2">
                <svg class="w-6 h-6 text-current dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" width="24" height="24" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                        d="m3.5 5.5 7.893 6.036a1 1 0 0 0 1.214 0L20.5 5.5M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
                </svg>
                <span>Buat surat</span>
            </a>
        </div>


    </div>
@endsection
