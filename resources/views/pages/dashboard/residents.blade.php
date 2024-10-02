@extends('layouts.dashboard')

@section('content')
    <div class="flex justify-between my-5 p-5">
        <h1 class="font-semibold text-4xl">Penduduk</h1>
        @if (auth()->user()->role == 'admin')
        <div>

            <a href="/dashboard/residents/import" class="bg-indigo-700 text-white rounded-md px-5 py-2">Import</a>
            <a href="/dashboard/residents/export" class="bg-green-700 text-white rounded-md px-5 py-2">Export</a>
            <a href="/dashboard/residents/create" class="bg-blue-700 text-white rounded-md px-5 py-2">Tambah</a>
        </div>
        @endif
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nik
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tempat/tgl lahir
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jenis Kelamin
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Agama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Alamat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Surat
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
                @foreach ($residents as $person)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $i++ }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $person['name'] }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $person['nik'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $person['born_in'] . ', ' . \Carbon\Carbon::parse($person['birthday'])->translatedFormat('d F Y') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $person['gender'] === 'male' ? 'Laki-Laki' : 'Perempuan' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $person['religion'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ 'Dusun ' . $person['dusun'] . ' RT ' . $person['rt'] . ' / RW ' . $person['rw'] }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="#"
                            onclick="MakeLetter('{{ $person['id'] }}')"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Buat</a>
                        </td>
                        <td class="px-6 py-4 text-right">
                            @if (auth()->user()->role == 'admin')
                                <a href="/dashboard/resident/edit?id={{ $person['id'] }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <a href="#" onclick="Delete({{ $person['id'] }})"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        const Delete = (id) => {
            Swal.fire({
                title: "Hapus Penduduk ini?",
                icon: "warning",
                showCancelButton: true
            }).then(r => {
                if (r.isConfirmed) {
                    location.href = '/dashboard/resident/delete/' + id
                }
            })
        }
        const MakeLetter = (id) => {
            const categories = @json($categories);

            const options = categories.map(cat =>
                `<option value="${cat.id}">Surat Keterangan ${cat.title}</option>`
            ).join('');

            Swal.fire({
                title: 'Pilih Surat',
                html: `
            <select id="categories-select" class="form-select rounded-md w-full mt-2">
                ${options}
            </select>
        `,

                confirmButtonText: 'Kirim',
                cancelButtonText: 'Batal',
                showCancelButton: true,
                preConfirm: () => {
                    const selectedValue = document.getElementById('categories-select').value;
                    if (!selectedValue) {
                        Swal.showValidationMessage('Pilih pendanda tangan terlebih dahulu');
                    }

                    return {
                        category: selectedValue,
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const {
                        category,
                    } = result.value;

                    location.href = `/dashboard/letter/add?resident=${id}&category=${category}`;

                }
            });
        }
    </script>
@endsection
