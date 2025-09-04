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
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(30px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            }
                        }
                    }
                }
            }
        }
    </script>

    <div class="py-12 min-h-screen bg-gray-50 flex justify-center items-center">
        <div class="w-full px-4 sm:px-6 lg:px-8 max-w-2xl">
            <div class="bg-white rounded-2xl shadow-2xl p-8 animate-slide-up">
                <h3 class="text-3xl font-bold text-gray-800 mb-8 text-center">Edit Pengaduan</h3>

                <form action="{{ route('pengaduan.update', $pengaduan->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="judul" class="block text-gray-700 font-semibold mb-2">Judul</label>
                        <input id="judul" name="judul" type="text" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300"
                            value="{{ old('judul', $pengaduan->judul) }}">
                    </div>

                    <div>
                        <label for="isi_pengaduan" class="block text-gray-700 font-semibold mb-2">Isi Pengaduan</label>
                        <textarea id="isi_pengaduan" name="isi_pengaduan" rows="4" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300">{{ old('isi_pengaduan', $pengaduan->isi_pengaduan) }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="kategori_id" class="block text-gray-700 font-semibold mb-2">Kategori</label>
                            <select id="kategori_id" name="kategori_id" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300">
                                <option value="" disabled>Pilih kategori</option>
                                @foreach ($pengaduans as $kategori)
                                    <option value="{{ $kategori->id }}" {{ $kategori->id == $pengaduan->kategori_id ? 'selected' : '' }}>
                                        {{ $kategori->namaKategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="status" class="block text-gray-700 font-semibold mb-2">Status</label>
                            <input id="status" name="status" type="text" value="{{ $pengaduan->status }}" readonly
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed transition duration-300">
                        </div>

                        <div class="md:col-span-2">
                            <label for="tanggal_pengaduan" class="block text-gray-700 font-semibold mb-2">Tanggal</label>
                            <input id="tanggal_pengaduan" name="tanggal_pengaduan" type="date" readonly
                                value="{{ $pengaduan->tanggal_pengaduan ? \Carbon\Carbon::parse($pengaduan->tanggal_pengaduan)->format('Y-m-d') : now()->format('Y-m-d') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed transition duration-300">
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transform hover:scale-105 transition duration-300 font-bold">
                            Update
                        </button>
                        <a href="{{ route('pengaduan.index') }}" class="text-gray-600 hover:underline ml-4">
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
