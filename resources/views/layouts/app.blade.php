@include('layouts.header')
@include('components.navbar')


<div id="indicators-carousel" class="relative w-full " data-carousel="static">
    <div class="relative h-56 overflow-hidden  md:h-screen">
        <div class="w-full text-center hidden duration-700 ease-in-out bg-no-repeat bg-slate-900 bg-contain" style="background: url('/img/bg.jpg');background-repeat:no-repeat;background-size:cover;" data-carousel-item>
            <img src="/img/logodesa.png" class="mx-auto my-10" alt="">
            <h1 class="text-white text-4xl font-bold">SELAMAT DATANG DI
            </h1>
            <h1 class="text-white text-4xl font-bold">WEB APLIKASI PELAYANAN SURAT ADMINISTRASI DESA
            </h1>
            <div class="mt-10 w-full flex justify-center ">
                <a href="/letters"
                    class="p-2.5  border rounded-md text-white mt-15 hover:bg-white cursor-pointer hover:text-black font-semibold text-2xl flex items-center space-x-2">
                    <svg class="w-6 h-6 text-current dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" width="24" height="24"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="m3.5 5.5 7.893 6.036a1 1 0 0 0 1.214 0L20.5 5.5M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
                    </svg>
                    <span>Buat surat</span>
                </a>
            </div>


        </div>
        @for ($i = 1; $i < 8; $i++)
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="/img/{{ $i }}.jpeg"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
        @endfor
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
            data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
            data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
            data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
            data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
            data-carousel-slide-to="4"></button>
    </div>
    <!-- Slider controls -->
    <button type="button"
        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-prev>
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 1 1 5l4 4" />
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button"
        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-next>
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>

<div class="min-h-screen w-screen bg-slate-200 flex flex-wrap justify-center items-center bg-cover 	"
  >
    @yield('content')
</div>
<div class="text-center text-gray-400 bg-slate-900 text-xs p-2">
    <div class="w-full justify-center flex p-3">

        <img class="w-20 " src="/img/logodesa.png" alt="Logo Desa Tani Makmur">
    </div>
    <p>© {{ date('Y') }} Pemerintah Desa Tani Makmur</p>
</div>

@include('layouts.footer')
