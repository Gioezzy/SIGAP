<x-app-layout>
    <div class="container py-10 mx-auto">
        <h1 class="mb-4 text-3xl font-bold text-gray-900 dark:text-white">{{ $berita->judul }}</h1>
        <p class="mb-6 text-sm text-gray-600 dark:text-gray-400">
            Diterbitkan pada {{ $berita->created_at->translatedFormat('d F Y') }}
        </p>
        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="gambar" class="object-cover w-full mb-6 rounded h-96">

        <div class="leading-relaxed text-gray-800 dark:text-gray-200">
            {!! $berita->isiBerita !!}
        </div>
    </div>
</x-app-layout>
