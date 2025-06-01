<x-app-layout>
    <div class="container py-10 mx-auto">
        <h2 class="mb-6 text-3xl font-bold">Semua Berita</h2>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($berita as $item)
                <article class="p-4 bg-white rounded shadow dark:bg-gray-800">
                    @if ($item->slug)
                        <a href="{{ route('berita.show', $item->slug) }}">
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="image"
                                class="object-cover w-full h-48 rounded">
                        </a>
                    @else
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="image" class="object-cover w-full h-48 rounded">
                    @endif
                    <div class="mt-4">
                        <div class="text-sm text-gray-500 uppercase dark:text-gray-400">
                            {{ $item->created_at->translatedFormat('d M Y') }}
                        </div>
                        @if ($item->slug)
                        <h5 class="mt-2 text-lg font-semibold text-gray-800 uppercase dark:text-white">
                            <a href="{{ route('berita.show', $item->slug) }}"
                                class="hover:text-blue-600">{{ $item->judul }}</a>
                        </h5>
                        @endif
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                            {{ Str::limit(strip_tags($item->isiBerita), 100) }}
                        </p>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $berita->links() }}
        </div>
    </div>
</x-app-layout>
