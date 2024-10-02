<div
    class="w-full max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-lg sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <h5 class="mb-4 text-xl font-semibold text-white ">Surat {{ $category['title'] }}</h5>

    <div class="flex items-baseline text-gray-900 dark:text-white mb-4">
        <span class="text-3xl font-extrabold tracking-tight">{{ $person['name'] }}</span>
    </div>
    <div class="flex items-baseline text-gray-900 dark:text-white mb-4">
        <span class="text-lg text-gray-600 font-semibold tracking-tight">Surat Keterangan {{ $category['title'] }}</span>
    </div>

    <ul role="list" class="space-y-4 my-7">
        <li class="flex items-center text-base font-normal leading-tight text-gray-500 dark:text-gray-400">
            Nik: {{ $person['nik'] }}
        </li>
        <li class="flex items-center text-base font-normal leading-tight text-gray-500 dark:text-gray-400">
            Tgl Lahir: {{ \Carbon\Carbon::parse($person['birthday'])->translatedFormat('d F Y') }}
        </li>
        <li class="flex items-center text-base font-normal leading-tight text-gray-500 dark:text-gray-400">
            Agama: {{ $person['religion'] }}
        </li>
        <li class="flex items-center text-base font-normal leading-tight text-gray-500 dark:text-gray-400">
            Alamat: {{ 'Dusun ' . $person['dusun'] . ' RT ' . $person['rt'] . ' / RW ' . $person['rw'] }}
        </li>
    </ul>

    <form action="/letters/add" method="POST">
        @csrf
        <input type="text" class="rounded-md my-2.5 w-full border border-slate-400 px-3 py-2" placeholder="Keperluan"
            name="needed_for" required>

        @switch($category['title'])
            @case('Usaha')
                <input type="text" class="rounded-md my-2.5 w-full border border-slate-400 px-3 py-2"
                    placeholder="Jenis Usaha" name="details" required>
            @break

            @case('Rekomendasi Kerja')
                <input type="text" class="rounded-md my-2.5 w-full border border-slate-400 px-3 py-2"
                    placeholder="Nama Perusahan" name="details" required>
            @break

            @default
        @endswitch

        <input type="hidden" name="resident_id" value="{{ $person['id'] }}">
        <input type="hidden" name="category_id" value="{{ $category['id'] }}">

        <button type="submit"
            class="mt-4 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5">
            Buat surat
        </button>
    </form>
</div>
