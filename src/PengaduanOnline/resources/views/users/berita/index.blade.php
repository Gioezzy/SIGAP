<x-app-layout>
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 py-20 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-blue-400/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-purple-400/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
        
        <div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <!-- Page Title -->
            <div class="max-w-3xl mx-auto">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-white/10 backdrop-blur-sm rounded-2xl border border-white/20 shadow-2xl mb-6 animate-slide-down">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                </div>

                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-6 animate-fade-in">
                    Semua 
                    <span class="bg-gradient-to-r from-blue-300 to-purple-300 bg-clip-text text-transparent">
                        Berita
                    </span>
                </h2>

                <p class="text-xl text-blue-100 leading-relaxed animate-slide-up delay-300">
                    Informasi terbaru dan terpercaya dari Polsek Pauh untuk masyarakat Kecamatan Pauh
                </p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="py-16 bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
        <div class="container py-10 mx-auto px-4">
            <!-- News Grid -->
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($berita as $index => $item)
                    <article class="group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden transform hover:-translate-y-2 animate-slide-up dark:bg-gray-800" 
                             style="animation-delay: {{ ($index % 6) * 100 }}ms">
                        <!-- Image Container -->
                        <div class="relative overflow-hidden">
                            @if ($item->slug)
                                <a href="{{ route('berita.show', $item->slug) }}" class="block">
                                    <img src="{{ asset('storage/' . $item->gambar) }}" 
                                         alt="image"
                                         class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-700 rounded-t-3xl">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                </a>
                            @else
                                <img src="{{ asset('storage/' . $item->gambar) }}" 
                                     alt="image" 
                                     class="w-full h-48 object-cover rounded-t-3xl">
                            @endif
                            
                            <!-- Category Badge -->
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 bg-gradient-to-r from-red-500 to-pink-600 text-white text-sm font-semibold rounded-full shadow-lg">
                                    BERITA
                                </span>
                            </div>

                            <!-- Date Badge -->
                            <div class="absolute top-4 right-4">
                                <div class="bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-medium text-gray-700">
                                    {{ $item->created_at->translatedFormat('d M') }}
                                </div>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <!-- Date -->
                            <div class="text-sm text-gray-500 uppercase dark:text-gray-400 mb-3">
                                {{ $item->created_at->translatedFormat('d M Y') }}
                            </div>

                            <!-- Title -->
                            @if ($item->slug)
                                <h5 class="mt-2 text-lg font-semibold text-gray-800 uppercase dark:text-white mb-3 leading-tight group-hover:text-blue-600 transition-colors duration-300 line-clamp-2">
                                    <a href="{{ route('berita.show', $item->slug) }}" 
                                       class="hover:text-blue-600">{{ $item->judul }}</a>
                                </h5>
                            @else
                                <h5 class="mt-2 text-lg font-semibold text-gray-800 uppercase dark:text-white mb-3 leading-tight line-clamp-2">
                                    {{ $item->judul }}
                                </h5>
                            @endif

                            <!-- Excerpt -->
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-300 leading-relaxed mb-4 line-clamp-3">
                                {{ Str::limit(str_replace('&nbsp;', ' ', html_entity_decode(strip_tags($item->isiBerita))), 100) }}
                            </p>

                            <!-- Read More Button (only if slug exists) -->
                            @if ($item->slug)
                                <a href="{{ route('berita.show', $item->slug) }}" 
                                   class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-medium rounded-xl shadow-md hover:shadow-lg transition-all duration-300 group/btn mt-2">
                                    <span>Baca Selengkapnya</span>
                                    <svg class="w-4 h-4 ml-2 transform group-hover/btn:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Back to Home Button -->
            <div class="mt-12 text-center">
                <a href="{{ route('home') }}" 
                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-medium rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali
                </a>
            </div>
        </div>
    </div>

    <!-- Custom CSS for animations -->
    <style>
        @keyframes fade-in {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
        
        @keyframes slide-down {
            0% { opacity: 0; transform: translateY(-30px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes slide-up {
            0% { opacity: 0; transform: translateY(30px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fade-in {
            animation: fade-in 0.8s ease-out;
        }
        
        .animate-slide-down {
            animation: slide-down 0.8s ease-out;
        }
        
        .animate-slide-up {
            animation: slide-up 0.8s ease-out;
        }
        
        .delay-300 {
            animation-delay: 300ms;
        }
        
        .delay-1000 {
            animation-delay: 1000ms;
        }
        
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</x-app-layout>