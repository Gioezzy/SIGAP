<x-app-layout>
    <div class="py-12 bg-white dark:bg-gray-900">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white rounded-lg shadow dark:bg-gray-800">
                <img src="{{ asset('storage/' . $profile->gambar) }}" alt="{{ $profile->nama }}" class="object-cover w-full h-64 mb-6 rounded">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">{{ $profile->nama }}</h2>
                <p class="mt-4 text-gray-600 dark:text-gray-300"><strong>Alamat:</strong> {{ $profile->alamat }}</p>
                <p class="mt-2 text-gray-600 dark:text-gray-300"><strong>Kontak:</strong> {{ $profile->kontak }}</p>
                <p class="mt-6 text-gray-700 dark:text-gray-200">{{ $profile->deskripsi }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
