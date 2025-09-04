<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
        <!-- Hero Section -->
        <div class="relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-600/10 to-indigo-600/10 dark:from-blue-400/5 dark:to-indigo-400/5"></div>
            <div class="relative mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-5xl lg:text-6xl">
                        <span class="block">Tentang</span>
                        <span class="block bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                            Kami
                        </span>
                    </h1>
                    <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-gray-600 dark:text-gray-300">
                        Informasi lengkap tentang Polsek Pauh yang berkomitmen melayani masyarakat dengan profesional dan integritas tinggi
                    </p>
                    <div class="mt-8 flex justify-center">
                        <div class="h-1 w-24 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 xl:grid-cols-3">
                @foreach ($profile as $index => $profil)
                    <div class="group relative overflow-hidden rounded-2xl bg-white dark:bg-gray-800 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2"
                         style="animation: fadeInUp 0.8s ease-out {{ $index * 0.1 }}s both;">
                        
                        <!-- Image Container -->
                        <div class="relative overflow-hidden">
                            <div class="aspect-[4/3] overflow-hidden">
                                <img src="{{ asset('storage/' . $profil->gambar) }}" 
                                     alt="{{ $profil->nama }}"
                                     class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                            </div>
                            
                            <!-- Overlay Gradient -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            
                        </div>

                        <!-- Content Container -->
                        <div class="p-6 relative">
                            <!-- Title -->
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-300">
                                {{ $profil->nama }}
                            </h3>
                            
                            <!-- Description -->
                            <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed mb-4 line-clamp-3">
                                {{ Str::limit(strip_tags($profil->deskripsi), 120) }}
                            </p>
                            
                            <!-- Action Button -->
                            <a href="{{ route('profiles.show', $profil->slug) }}"
                               class="inline-flex items-center gap-2 text-sm font-medium text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 group/link transition-colors duration-200">
                                <span>Lihat Detail</span>
                                <svg class="w-4 h-4 transition-transform duration-200 group-hover/link:translate-x-1" 
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                        </div>

                        <!-- Bottom Accent -->
                        <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-600 to-indigo-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                    </div>
                @endforeach
            </div>
        </div>

    <!-- Custom Styles -->
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #3b82f6, #6366f1);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #2563eb, #4f46e5);
        }

        /* Dark mode scrollbar */
        .dark ::-webkit-scrollbar-track {
            background: #374151;
        }
    </style>
</x-app-layout>