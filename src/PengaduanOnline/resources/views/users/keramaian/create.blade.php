<x-app-layout>
    <div class="max-w-3xl py-10 mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white rounded shadow">
            <h2 class="mb-6 text-xl font-bold text-gray-800">Tambah Acara Keramaian</h2>

            <form action="{{ route('keramaian.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nama Acara</label>
                    <input type="text" name="nama_acara" value="{{ old('nama_acara') }}"
                        class="block w-full mt-1 border-gray-300 rounded shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                    @error('nama_acara')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Lokasi Acara</label>
                    <input type="text" name="lokasi_acara" value="{{ old('lokasi_acara') }}"
                        class="block w-full mt-1 border-gray-300 rounded">
                    @error('lokasi_acara')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tanggal Acara</label>
                        <input type="date" name="tanggal_acara" value="{{ old('tanggal_acara') }}"
                            class="block w-full mt-1 border-gray-300 rounded">
                        @error('tanggal_acara')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Waktu Acara</label>
                        <input type="time" name="waktu_acara" value="{{ old('waktu_acara') }}"
                            class="block w-full mt-1 border-gray-300 rounded">
                        @error('waktu_acara')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="px-4 py-2 font-semibold text-white bg-blue-600 rounded hover:bg-blue-700">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
