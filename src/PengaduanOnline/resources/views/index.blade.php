<x-app-layout>
    <div class="py-10 bg-white dark:bg-gray-900">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Judul Awal -->
            <div class="mb-8 text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">Layanan Berita Polsek Pauh</h2>
                <p class="mt-2 text-lg text-gray-600 dark:text-gray-300">Berita terbaru terkait Kecamatan Pauh</p>
            </div>

            <!-- Header dan tombol -->
            <div class="flex flex-wrap items-center justify-between mb-6">
                <h4 class="text-xl font-semibold text-gray-800 uppercase dark:text-gray-200">Baca Berita Terbaru</h4>
                <a href="{{route('berita.index')}}" class="font-medium text-blue-600 hover:underline">Semua Berita</a>
            </div>

            {{-- Page Berita --}}
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($berita as $item)
                    <article class="p-4 bg-white rounded shadow dark:bg-gray-800">
                        @if ($item->slug)
                            <a href="{{ route('berita.show', $item->slug) }}">
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="image"
                                    class="object-cover w-full h-48 rounded">
                            </a>
                        @else
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="image"
                                class="object-cover w-full h-48 rounded">
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
                        </div>
                    </article>
                @empty
                    <p class="text-gray-600 dark:text-gray-300">Belum ada berita yang dipublikasikan.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>