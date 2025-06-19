<x-app-layout>
    <div class="py-12 bg-white dark:bg-gray-900">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-10 text-center">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Tentang Kami</h2>
                <p class="mt-2 text-gray-600 dark:text-gray-300">Informasi lengkap Sekitar Polsek Pauh</p>
            </div>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($profile as $profil)
                    <div class="p-6 bg-white rounded-lg shadow dark:bg-gray-800">
                        <img src="{{ asset('storage/' . $profil->gambar) }}" alt="{{ $profil->nama }}"
                            class="object-cover w-full h-48 rounded">
                        <h3 class="mt-4 text-xl font-semibold text-gray-800 dark:text-white">{{ $profil->nama }}</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-300">{{ Str::limit($profil->deskripsi, 100) }}</p>
                        <a href="{{ route('profiles.show', $profil->slug) }}"
                            class="inline-block mt-4 text-sm text-blue-600 hover:underline">Lihat Detail</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
