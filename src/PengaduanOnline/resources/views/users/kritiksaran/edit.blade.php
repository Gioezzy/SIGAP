<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl px-6 mx-auto lg:px-8">
            <div class="p-6 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <h2 class="mb-4 text-2xl font-bold text-gray-800 dark:text-white">Edit Feedback</h2>

                <form action="{{ route('kritiksaran.update', $kritiksaran->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="judul" class="block mb-2 font-semibold text-gray-700 dark:text-gray-200">Judul</label>
                        <input type="text" name="judul" id="judul" value="{{ old('judul', $kritiksaran->judul) }}" class="w-full p-2 border border-gray-300 rounded dark:border-gray-700 dark:bg-gray-900 dark:text-white" required>
                    </div>

                    <div class="mb-4">
                        <label for="isi" class="block mb-2 font-semibold text-gray-700 dark:text-gray-200">Isi</label>
                        <textarea name="isi" id="isi" rows="5" class="w-full p-2 border border-gray-300 rounded dark:border-gray-700 dark:bg-gray-900 dark:text-white" required>{{ old('isi', $kritiksaran->isi) }}</textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
