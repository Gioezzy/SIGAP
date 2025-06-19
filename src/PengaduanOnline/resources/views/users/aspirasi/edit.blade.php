<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Edit Aspirasi
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white shadow-sm sm:rounded-lg">
                <form action="{{ route('aspirasi.update', $aspirasi) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="judul" id="judul"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                            value="{{ old('judul', $aspirasi->judul) }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="isi" class="block text-sm font-medium text-gray-700">Isi Aspirasi</label>
                        <textarea name="isi" id="isi" rows="5"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                            required>{{ old('isi', $aspirasi->isi) }}</textarea>
                    </div>

                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('aspirasi.index') }}" class="text-gray-600 hover:underline">Batal</a>
                        <button type="submit"
                            class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>