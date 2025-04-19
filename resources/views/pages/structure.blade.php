@extends('layouts.app')

@section('content')
    <!-- Add background image with overlay for better readability -->
    <div class="relative">


        <div class="relative z-10 max-w-4xl mx-auto px-4 py-8 text-sm">
            <!-- Vision and Mission Section -->
            <div class="my-20">
                <h1 class="text-3xl font-bold text-white text-center mb-4">
                    Visi dan Misi
                </h1>

                <div class="bg-gray-900 bg-opacity-60 p-6 rounded-lg shadow-lg">
                    <p class="text-gray-300 mb-6 text-justify">
                        Sebagai dokumen perencanaan yang menjabarkan dari Dokumen RPJM Desa, maka seluruh rencana program dan kegiatan pembangunan yang akan dilakukan oleh Desa secara bertahap dan berkesinambungan harus dapat menghantarkan tercapainya Visi-Misi Kepala Desa.
                        Visi-Misi Kepala Desa Tani Makmur disamping merupakan Visi-Misi Kepala Desa Terpilih, juga diintegrasikan dengan keinginan bersama masyarakat desa untuk mengatasi permasalahan yang ada dan pengembangan Desa ke depan, dimana proses penyusunannya dilakukan secara partisipatif mulai dari tingkat Dusun/RW sampai tingkat Desa.
                    </p>

                    <div class="mb-6 border-l-4 border-yellow-500 pl-4">
                        <h2 class="text-xl font-semibold text-white mb-2">Visi</h2>
                        <p class="text-gray-300 italic">"Terwujudnya Desa Tani Makmur yang Mandiri, Aman, Sejahtera, Berbudaya dan Agamis sesuai dengan Visi Kabupaten Indragiri Hulu 2025"</p>
                    </div>

                    <div class="border-l-4 border-yellow-500 pl-4">
                        <h2 class="text-xl font-semibold text-white mb-2">Misi</h2>
                        <ul class="list-decimal pl-6 text-gray-300 space-y-2">
                            <li>Menciptakan Pemerintahan yang bersih, transparan, berwibawa dan bertanggungjawab;</li>
                            <li>Menumbuhkembangkan serta menghidupkan kembali nilai-nilai budaya, adat istiadat dalam kehidupan masyarakat;</li>
                            <li>Mengembalikan pesan dan fungsi seluruh lembaga yang ada di desa sesuai dengan pesan, tugas dan tanggungjawab masing-masing;</li>
                            <li>Pemberdayaan terhadap pemuda, dengan cara membuat program kegiatan yang berkesinambungan di bidang olahraga, seni budaya, agama dan lain-lain;</li>
                            <li>Menyusun program kerja dengan melibatkan seluruh aparatur pemerintah desa serta semua lapisan masyarakat.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Village Government Section -->
            <div class="bg-gray-900 bg-opacity-60 p-6 rounded-lg shadow-lg mb-8">
                <h1 class="text-3xl font-bold text-white text-center mb-2">
                    Pemerintah Desa Tani Makmur
                </h1>
                <h2 class="text-center text-gray-400 mb-10">
                    Kecamatan Rengat Barat, Kabupaten Indragiri Hulu
                </h2>

                @php
                    $groups = [
                        'Pimpinan' => [
                            ['name' => 'Muhammad Sulistiono', 'position' => 'Kepala Desa', 'image' => '/img/kades.jpeg'],
                            ['name' => 'Agustian Sagala, S.T', 'position' => 'Sekretaris Desa', 'image' => '/img/sekre.jpeg'],
                        ],
                        'Kaur' => [
                            ['name' => 'Lahuri', 'position' => 'Kaur Tata Usaha dan Umum', 'image' => '/img/LAHURI.jpg'],
                            ['name' => 'Rasyd prabowo, S.T', 'position' => 'Kaur Perencanaan', 'image' => '/img/kades.jpeg'],
                            ['name' => 'Rokayati, S.Pd', 'position' => 'Kaur Keuangan', 'image' => '/img/ROKAYATI.jpg'],
                        ],
                        'Kasi' => [
                            ['name' => 'Muhammad Riduwan', 'position' => 'Kasi Pemerintahan', 'image' => '/img/M RIDUWAN.jpg'],
                            ['name' => 'Dila Afinda Putri', 'position' => 'Kasi Pelayanan', 'image' => '/img/dila.jpeg'],
                            [
                                'name' => 'Desi Astika Sari',
                                'position' => 'Kasi Kesejahteraan & Pembangunan',
                                'image' => '/img/kades.jpeg',
                            ],
                        ],
                        'Kepala Dusun' => [
                            ['name' => 'Endang Nursasi, SE', 'position' => 'Kepala Dusun 1', 'image' => '/img/ENDANG.jpg'],
                            ['name' => 'Widia Anjelina I', 'position' => 'Kepala Dusun 2', 'image' => '/img/widia anjelina i.jpg'],
                            ['name' => 'M. Jamaludin, A.Md', 'position' => 'Kepala Dusun 3', 'image' => '/img/JAMAL.jpg'],
                        ],
                    ];
                @endphp

                @foreach ($groups as $category => $members)
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-white border-b border-yellow-500 pb-1 mb-4">
                            {{ $category }}
                        </h3>
                        <div class="grid sm:grid-cols-2 gap-4">
                            @foreach ($members as $member)
                                <div class="flex items-center gap-4 bg-white bg-opacity-90 border border-gray-200 rounded-xl shadow-md p-4 hover:bg-opacity-100 transition duration-300">
                                    <div class="w-16 h-16 rounded-full overflow-hidden flex-shrink-0 border-2 border-yellow-400">
                                        <img src="{{ $member['image'] }}" alt="foto {{ $member['name'] }}" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <div class="text-sm font-bold text-gray-800">{{ $member['name'] }}</div>
                                        <div class="text-xs text-gray-600">{{ strtoupper($member['position']) }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center text-gray-400 text-xs mt-8">
                <div class="bg-yellow-400 bg-opacity-20 rounded-full p-2 w-24  mx-auto mb-2 flex items-center justify-center">
                    <img src="/img/logodesa.png" alt="Logo Desa Tani Makmur" class="w-20 ">
                </div>
                <p>© {{ date('Y') }} Pemerintah Desa Tani Makmur</p>
            </div>
        </div>
    </div>
@endsection
