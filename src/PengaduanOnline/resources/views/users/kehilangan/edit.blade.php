<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Kehilangan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white rounded shadow-sm">
                <form action="{{ route('kehilangan.update', $kehilangan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nama Barang</label>
                        <input type="text" name="nama_barang" value="{{ $kehilangan->nama_barang }}" class="block w-full mt-1 border-gray-300 rounded shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Lokasi Hilang</label>
                        <input type="text" name="lokasi_hilang" value="{{ $kehilangan->lokasi_hilang }}" class="block w-full mt-1 border-gray-300 rounded shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Tanggal Hilang</label>
                        <input type="date" name="tanggal_hilang" value="{{ $kehilangan->tanggal_hilang }}" class="block w-full mt-1 border-gray-300 rounded shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="deskripsi" rows="4" class="block w-full mt-1 border-gray-300 rounded shadow-sm" required>{{ $kehilangan->deskripsi }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Foto Saat Ini</label>
                        @if ($kehilangan->foto)
                            <img src="{{ asset('storage/' . $kehilangan->foto) }}" class="object-cover w-32 h-32 mb-2 rounded">
                        @else
                            <p class="text-sm text-gray-500">Tidak ada foto</p>
                        @endif
                        <input type="file" name="foto" class="block w-full mt-1">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" class="block w-full mt-1 border-gray-300 rounded shadow-sm">
                            <option value="belum_ditemukan" {{ $kehilangan->status == 'belum_ditemukan' ? 'selected' : '' }}>Belum Ditemukan</option>
                            <option value="ditemukan" {{ $kehilangan->status == 'ditemukan' ? 'selected' : '' }}>Ditemukan</option>
                        </select>
                    </div>
                    <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Perbarui</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
