<x-app-layout>
    <div class="max-w-3xl py-10 mx-auto">
        <div class="p-6 bg-white rounded-lg shadow">
            <h2 class="mb-6 text-2xl font-semibold">Edit Data Keramaian</h2>


            <form action="{{ route('keramaian.update', $keramaian->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block font-medium text-gray-700">Nama Acara</label>
                    <input type="text" name="nama_acara" value="{{ old('nama_acara', $keramaian->nama_acara) }}"
                        class="w-full mt-1 border-gray-300 rounded shadow-sm" required>
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-gray-700">Lokasi Acara</label>
                    <input type="text" name="lokasi_acara" value="{{ old('lokasi_acara', $keramaian->lokasi_acara) }}"
                        class="w-full mt-1 border-gray-300 rounded shadow-sm" required>
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-gray-700">Tanggal Acara</label>
                    <input type="date" name="tanggal_acara"
                        value="{{ old('tanggal_acara', $keramaian->tanggal_acara) }}"
                        class="w-full mt-1 border-gray-300 rounded shadow-sm" required>
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-gray-700">Waktu Acara</label>
                    <input type="time" name="waktu_acara" value="{{ old('waktu_acara', $keramaian->waktu_acara) }}"
                        class="w-full mt-1 border-gray-300 rounded shadow-sm" >
                </div>

                <div class="mt-6">
                    <button type="submit" class="px-4 py-2 text-white transition bg-blue-600 rounded hover:bg-blue-700">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
