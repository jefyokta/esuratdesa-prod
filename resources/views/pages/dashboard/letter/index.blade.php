@extends('layouts.dashboard')


@section('content')
    <div class="flex justify-between my-5 p-5">
        <h1 class="font-semibold text-4xl"> Surat {{ $status ? 'Selesai' : 'Pending' }}</h1>
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
                        Jenis Surat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Keperluan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ttd
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
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
                            {{ $let->category->title }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $let['needed_for'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($let['created_at'])->translatedFormat('d F Y') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $let->VillageManager->id ?? 'none' }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            @if (!$status)
                                <a href="#" onclick="ConfirmLetter('{{ $let['id'] }}')"
                                    class="font-medium mx-1 text-green-600 dark:text-green-500 hover:underline">Confirm</a>
                            @else
                                <a href="/dashboard/letter/print/{{ $let['id'] }}"
                                    class="font-medium mx-1 text-green-600 dark:text-green-500 hover:underline">Print</a>
                            @endif
                            {{-- <a href="#"
                                class="font-medium mx-1 text-blue-600 dark:text-blue-500 hover:underline">Edit</a> --}}
                            <a href="#" onclick="Delete('{{ $let['id'] }}')"
                                class="font-medium mx-1 text-red-600 dark:text-red-500 hover:underline">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        const Delete = (id) => {
            Swal.fire({
                title: "Hapus Surat?",
                icon: "warning",
                showCancelButton: true
            }).then(r => {
                if (r.isConfirmed) {
                    location.href = '/dashboard/letter/delete?id=' + id
                }
            })
        }

        const ConfirmLetter = (id) => {
            const signers = @json($signers);

            const options = signers.map(signer =>
                `<option value="${signer.id}">${signer.name}</option>`
            ).join('');

            Swal.fire({
                title: 'Pilih Pendanda Tangan',
                html: `
            <select id="signer-select" class="form-select rounded-md w-full mt-2">
                ${options}
            </select>
            <input type="text" id="number" class="form-select rounded-md w-full mt-2" placeholder="No surat">
        `,
                confirmButtonText: 'Kirim',
                cancelButtonText: 'Batal',
                showCancelButton: true,
                preConfirm: () => {
                    const selectedValue = document.getElementById('signer-select').value;
                    const num = document.getElementById('number').value
                    if (!selectedValue) {
                        Swal.showValidationMessage('Pilih pendanda tangan terlebih dahulu');
                    }
                    if (!num) {
                        Swal.showValidationMessage('Masukkan No surat');
                    }
                    return {
                        signer: selectedValue,
                        number: num
                    };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const {
                        signer,
                        number
                    } = result.value;

                    location.href = `/dashboard/letter/confirm?id=${id}&signer=${signer}&number=${number}`;

                }
            });
        };
    </script>
@endsection
