<x-app-layout>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'slide-up': 'slideUp 0.6s ease-out',
                    },
                    keyframes: {
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        }
                    }
                }
            }
        }
    </script>

    <div class="py-12 min-h-screen bg-gray-50 flex justify-center items-center">
        <div class="w-full px-4 sm:px-6 lg:px-8 max-w-2xl">
            <div class="bg-white rounded-2xl shadow-2xl p-8 animate-slide-up">
                <h3 class="text-3xl font-bold text-gray-800 mb-8 text-center">Edit Kehilangan</h3>

                <form action="{{ route('kehilangan.update', $kehilangan->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Nama Barang</label>
                        <input type="text" name="nama_barang" value="{{ $kehilangan->nama_barang }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Lokasi Hilang</label>
                        <input type="text" name="lokasi_hilang" value="{{ $kehilangan->lokasi_hilang }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Tanggal Hilang</label>
                        <input type="date" name="tanggal_hilang" value="{{ $kehilangan->tanggal_hilang }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
                        <textarea name="deskripsi" rows="4" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300">{{ $kehilangan->deskripsi }}</textarea>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Foto Saat Ini</label>
                        @if ($kehilangan->foto)
                            <img src="{{ asset('storage/' . $kehilangan->foto) }}" class="object-cover w-32 h-32 mb-2 rounded">
                        @else
                            <p class="text-sm text-gray-500">Tidak ada foto</p>
                        @endif
                        <input type="file" name="foto" class="w-full mt-2 text-sm text-gray-700">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Status</label>
                        <select name="status"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300">
                            <option value="belum_ditemukan" {{ $kehilangan->status == 'belum_ditemukan' ? 'selected' : '' }}>Belum Ditemukan</option>
                            <option value="ditemukan" {{ $kehilangan->status == 'ditemukan' ? 'selected' : '' }}>Ditemukan</option>
                        </select>
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transform hover:scale-105 transition duration-300 font-bold">
                            Perbarui
                        </button>
                        <a href="{{ route('kehilangan.index') }}" class="text-gray-600 hover:underline ml-4">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
