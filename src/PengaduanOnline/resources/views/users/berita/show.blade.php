<x-app-layout>
    <!-- Hero Section -->
    <div class="relative py-20" style="background-color: #043873">
        <div class="absolute inset-0 bg-black/30"></div>
        <div class="relative z-10 container mx-auto px-4">
            <!-- Breadcrumb -->
            <nav class="mb-8 max-w-6xl mx-auto">
                <div class="flex items-center space-x-2 text-blue-200">
                    <a href="{{ url('/') }}" class="hover:text-white transition-colors">Beranda</a>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                    <a href="{{ url('/berita') }}" class="hover:text-white transition-colors">Berita</a>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                    <span class="text-white">Detail</span>
                </div>
            </nav>

            <!-- Title -->
            <div class="max-w-6xl mx-auto">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                    {{ $berita->judul }}
                </h1>

                <!-- Meta Info -->
                <div class="flex flex-wrap items-center gap-6 text-blue-100">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        {{ $berita->created_at->translatedFormat('d F Y') }}
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Polsek Pauh
                    </div>
                    <div class="px-3 py-1 bg-red-500 text-white rounded-full text-sm font-medium">
                        BERITA TERBARU
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="py-16 bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen">
        <div class="container mx-auto px-4">
            <!-- Menggunakan max-w-6xl untuk container yang lebih lebar -->
            <div class="max-w-6xl mx-auto">
                <!-- Featured Image - Diperbesar dan ditingkatkan -->
                <div class="relative mb-12 overflow-hidden rounded-3xl shadow-2xl">
                    <img src="{{ asset('storage/' . $berita->gambar) }}" 
                         alt="gambar" 
                         class="w-full h-[400px] md:h-[500px] lg:h-[600px] xl:h-[700px] object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                </div>

                <!-- Article Content - Container yang lebih lebar -->
                <article class="bg-white rounded-3xl shadow-xl overflow-hidden dark:bg-gray-800">
                    <!-- Padding yang lebih besar untuk experience yang lebih baik -->
                    <div class="p-8 md:p-12 lg:p-16 xl:p-20">
                        <!-- Article Header -->
                        <div class="border-b border-gray-200 dark:border-gray-700 pb-8 mb-12">
                            <div class="flex items-center justify-between flex-wrap gap-4">
                                <div class="flex items-center text-gray-600 dark:text-gray-400 text-lg">
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Diterbitkan pada {{ $berita->created_at->translatedFormat('d F Y') }}
                                </div>
                            </div>
                        </div>

                        <!-- Article Body - Typography yang lebih baik untuk reading experience -->
                        <div class="prose prose-xl max-w-none leading-relaxed text-gray-800 dark:text-gray-200 dark:prose-invert">
                            <!-- Custom styling untuk reading experience yang lebih baik -->
                            <div class="text-lg md:text-xl leading-8 md:leading-9 tracking-wide">
                                {!! $berita->isiBerita !!}
                            </div>
                        </div>
                             <!-- Navigation Buttons -->
                <div class="mt-16 flex flex-col sm:flex-row gap-6 justify-center">
                    <a href="{{ url('/berita') }}" 
                       class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 text-lg">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        Berita Lainnya
                    </a>
                    <a href="{{ url('/') }}" 
                       class="inline-flex items-center justify-center px-8 py-4 bg-white border-2 border-gray-300 text-gray-700 font-semibold rounded-xl shadow-lg hover:shadow-xl hover:border-gray-400 transition-all duration-300 transform hover:scale-105 text-lg">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>






    <!-- Custom CSS untuk reading experience yang lebih baik -->
    <style>
        .prose {
            font-family: 'Georgia', 'Times New Roman', serif;
        }
        
        .prose p {
            margin-bottom: 1.5rem;
            line-height: 1.8;
        }
        
        .prose h1, .prose h2, .prose h3, .prose h4, .prose h5, .prose h6 {
            font-family: 'Inter', '-apple-system', 'BlinkMacSystemFont', sans-serif;
            font-weight: 700;
            margin-top: 2rem;
            margin-bottom: 1rem;
        }
        
        .prose blockquote {
            border-left: 4px solid #3B82F6;
            padding-left: 1.5rem;
            font-style: italic;
            background-color: #F8FAFC;
            padding: 1.5rem;
            border-radius: 0.5rem;
            margin: 2rem 0;
        }
        
        .prose img {
            border-radius: 1rem;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
            margin: 2rem 0;
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