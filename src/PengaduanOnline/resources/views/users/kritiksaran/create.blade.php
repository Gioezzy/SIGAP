<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl px-6 mx-auto lg:px-8">
            <div class="p-6 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <h2 class="mb-4 text-2xl font-bold text-gray-800 dark:text-white">Sampaikan Kritik Saran Anda</h2>

                <form action="{{ route('kritiksaran.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="judul"
                            class="block mb-2 font-semibold text-gray-700 dark:text-gray-200">Judul</label>
                        <input type="text" name="judul" id="judul"
                            class="w-full p-2 border border-gray-300 rounded dark:border-gray-700 focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-900 dark:text-white"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="isi" class="block mb-2 font-semibold text-gray-700 dark:text-gray-200">Kritik
                            Saran</label>
                        <textarea name="isi" id="isi" rows="5"
                            class="w-full p-2 border border-gray-300 rounded dark:border-gray-700 focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-900 dark:text-white"
                            required></textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
