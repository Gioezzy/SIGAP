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
                <h3 class="text-3xl font-bold text-gray-800 mb-8 text-center">Edit Kritik & Saran</h3>

                <form action="{{ route('kritiksaran.update', $kritiksaran->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="judul" class="block text-gray-700 font-semibold mb-2">Judul</label>
                        <input id="judul" name="judul" type="text" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300"
                            value="{{ old('judul', $kritiksaran->judul) }}">
                    </div>

                    <div>
                        <label for="isi" class="block text-gray-700 font-semibold mb-2">Isi</label>
                        <textarea id="isi" name="isi" rows="5" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300">{{ old('isi', $kritiksaran->isi) }}</textarea>
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transform hover:scale-105 transition duration-300 font-bold">
                            Update
                        </button>
                        <a href="{{ route('kritiksaran.index') }}" class="text-gray-600 hover:underline ml-4">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
