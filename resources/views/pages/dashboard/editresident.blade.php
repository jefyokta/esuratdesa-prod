@extends('layouts.dashboard')


@section('content')
    <form action="{{ route('residents.update', $resident['id']) }}" method="POST">
        @method('PUT')
        @csrf
        <input type="hidden" name="id" value="{{ $resident['id'] }}">
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                <input type="text" id="nik"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="nik" value="{{ $resident['nik'] }}" required />
            </div>

            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="text" id="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="name" value="{{ $resident['name'] }}" required />
            </div>

            <div>
                <label for="birthday" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                    Lahir</label>
                <input type="date" id="birthday"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="birthday" value="{{ $resident['birthday'] }}" required />
            </div>
            <div>
                <label for="born_in" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat
                    Lahir</label>
                <input type="text" id="born_in"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="born_in" value="{{ $resident['born_in'] }}" required />
            </div>

            <div>
                <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                    Kelamin</label>
                <select id="gender" name="gender"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="{{ $resident['gender'] }}">---</option>
                    <option value="male">Laki-laki</option>
                    <option value="female">Perempuan</option>
                </select>
            </div>

            <div>
                <label for="dusun" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dusun</label>
                <input type="text" id="dusun"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="dusun" value="{{ $resident['dusun'] }}" required />
            </div>

            <div>
                <label for="rt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RT</label>
                <input type="text" id="rt"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="rt" value="{{ $resident['rt'] }}" required />
            </div>

            <div>
                <label for="rw" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RW</label>
                <input type="text" id="rw"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="rw" value="{{ $resident['rw'] }}" required />
            </div>

            <div>
                <label for="religion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                <input type="text" id="religion"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="religion" value="{{ $resident['religion'] }}" required />
            </div>

            <div>
                <label for="father_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Ayah</label>
                <input type="text" id="father_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="father_name" value="{{ $resident['father_name'] }}" required />
            </div>

            <div>
                <label for="mother_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Ibu</label>
                <input type="text" id="mother_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="mother_name" value="{{ $resident['mother_name'] }}" required />
            </div>

            <div>
                <label for="job" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
                <input type="text" id="job"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="job" value="{{ $resident['job'] }}" required />
            </div>

            <div>
                <label for="last_study" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pendidikan
                    Terakhir</label>
                <input type="text" id="last_study"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="last_study" value="{{ $resident['last_study'] }}" required />
            </div>

            <div>
                <label for="current_study" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pendidikan
                    Saat Ini</label>
                <input type="text" id="current_study"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="current_study" value="{{ $resident['current_study'] }}" />
            </div>

            <div>
                <label for="no_kk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. KK</label>
                <input type="text" id="no_kk"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="no_kk" value="{{ $resident['no_kk'] }}" required />
            </div>

            <div>
                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                <input type="text" id="status"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="status" value="{{ $resident['status'] }}" required />
            </div>

            <div>
                <label for="status_in_family" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                    Dalam Keluarga</label>
                <input type="text" id="status_in_family"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="status_in_family" value="{{ $resident['status_in_family'] }}" required />
            </div>
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
@endsection
