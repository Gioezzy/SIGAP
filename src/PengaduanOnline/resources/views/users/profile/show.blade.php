<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-purple-50 to-blue-50 dark:from-gray-900 dark:via-purple-900 dark:to-blue-900">
        
        <!-- Back Button -->
        <div class="sticky top-0 z-10 bg-white/80 dark:bg-gray-900/80 backdrop-blur-md border-b border-gray-200 dark:border-gray-700">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <a href="{{ route('profiles.index') }}" 
                   class="inline-flex items-center gap-2 text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-purple-400 transition-all duration-300 group">
                    <svg class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1 group-hover:scale-110" 
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
                    </svg>
                    <span>Kembali ke Tentang Kami</span>
                </a>
            </div>
        </div>

        <!-- Hero Section -->
        <div class="relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-500/10 via-purple-500/10 to-blue-600/10 dark:from-blue-400/5 dark:via-purple-400/5 dark:to-blue-400/5"></div>
            
            <!-- Animated Background Elements -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute top-1/4 left-1/4 w-32 h-32 bg-gradient-to-br from-blue-500/20 to-purple-500/20 rounded-full blur-2xl animate-pulse"></div>
                <div class="absolute bottom-1/4 right-1/4 w-40 h-40 bg-gradient-to-br from-purple-500/20 to-blue-600/20 rounded-full blur-2xl animate-pulse animation-delay-2000"></div>
                <div class="absolute top-1/2 left-1/2 w-24 h-24 bg-gradient-to-br from-blue-600/20 to-purple-400/20 rounded-full blur-2xl animate-pulse animation-delay-4000"></div>
            </div>
            
            <div class="relative max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    
                    <!-- Image Section -->
                    <div class="relative group" style="animation: fadeInLeft 0.8s ease-out;">
                        <div class="aspect-[4/3] rounded-2xl overflow-hidden shadow-2xl transform transition-all duration-700 group-hover:scale-105 group-hover:rotate-1">
                            <img src="{{ asset('storage/' . $profile->gambar) }}" 
                                 alt="{{ $profile->nama }}"
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        </div>
                        
                        <!-- Floating Elements with Enhanced Animation -->
                        <div class="absolute -top-4 -right-4 w-24 h-24 bg-gradient-to-br from-blue-500 to-purple-500 rounded-full opacity-30 blur-xl animate-float"></div>
                        <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-gradient-to-br from-purple-500 to-blue-500 rounded-full opacity-30 blur-xl animate-float-reverse"></div>
                        
                        <!-- Glowing Border Effect -->
                        <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-blue-500/50 to-purple-500/50 -z-10 blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </div>
                    
                    <!-- Content Section -->
                    <div class="space-y-6" style="animation: fadeInRight 0.8s ease-out;">
                        <div>
                            <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-500 to-purple-500 bg-clip-text text-transparent lg:text-5xl">
                                {{ $profile->nama }}
                            </h1>
                            <div class="mt-4 h-1 w-20 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full animate-pulse"></div>
                        </div>
                        
                        <!-- Info Cards -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="bg-white/70 dark:bg-gray-800/70 backdrop-blur-sm rounded-xl p-4 border border-gray-200 dark:border-gray-700 transform transition-all duration-300 hover:scale-105 hover:shadow-lg group">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-100 to-purple-100 dark:from-blue-900 dark:to-purple-900 rounded-lg flex items-center justify-center transform transition-transform duration-300 group-hover:rotate-12">
                                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">Alamat</p>
                                        <p class="font-medium text-gray-900 dark:text-white">{{ $profile->alamat }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-white/70 dark:bg-gray-800/70 backdrop-blur-sm rounded-xl p-4 border border-gray-200 dark:border-gray-700 transform transition-all duration-300 hover:scale-105 hover:shadow-lg group">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-gradient-to-br from-purple-100 to-blue-100 dark:from-purple-900 dark:to-blue-900 rounded-lg flex items-center justify-center transform transition-transform duration-300 group-hover:rotate-12">
                                        <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">Kontak</p>
                                        <p class="font-medium text-gray-900 dark:text-white">{{ $profile->kontak }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Section -->
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl shadow-xl overflow-hidden transform transition-all duration-500 hover:shadow-2xl" style="animation: fadeInUp 0.8s ease-out 0.4s both;">
                <div class="bg-gradient-to-r from-blue-500 to-purple-500 px-8 py-6 relative overflow-hidden">
                    <!-- Animated Background Pattern -->
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-600/20 to-purple-600/20 animate-pulse"></div>
                    <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-r from-transparent via-white/10 to-transparent transform -skew-x-12 animate-shimmer"></div>
                    
                    <div class="relative z-10">
                        <h2 class="text-2xl font-bold text-white">Informasi Detail</h2>
                        <p class="text-blue-100 mt-2">Profil lengkap dan informasi penting</p>
                    </div>
                </div>
                
                <div class="px-8 py-8">
                    <div class="prose prose-lg max-w-none dark:prose-invert 
                                prose-headings:text-gray-900 dark:prose-headings:text-white
                                prose-p:text-gray-700 dark:prose-p:text-gray-300
                                prose-strong:text-gray-900 dark:prose-strong:text-white
                                prose-a:text-blue-600 dark:prose-a:text-purple-400
                                prose-blockquote:border-l-blue-500 dark:prose-blockquote:border-l-purple-400
                                prose-code:text-purple-600 dark:prose-code:text-purple-400
                                prose-code:bg-purple-50 dark:prose-code:bg-purple-900/20
                                prose-pre:bg-gray-800 dark:prose-pre:bg-gray-900">
                        {!! $profile->deskripsi !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="bg-gradient-to-r from-blue-500 to-purple-500 py-16 relative overflow-hidden">
            <!-- Animated Background -->
            <div class="absolute inset-0 bg-gradient-to-r from-blue-600/20 to-purple-600/20 animate-pulse"></div>
            <div class="absolute top-0 left-0 w-full h-full">
                <div class="absolute top-1/4 left-1/4 w-32 h-32 bg-white/10 rounded-full blur-2xl animate-float"></div>
                <div class="absolute bottom-1/4 right-1/4 w-40 h-40 bg-white/10 rounded-full blur-2xl animate-float-reverse"></div>
            </div>
            
            <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl font-bold text-white mb-4 animate-fadeInUp">
                    Butuh Informasi Lebih Lanjut?
                </h2>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <!-- FIXED: Improved hover state with better color contrast -->
                    <a href="{{ route('profiles.index') }}" 
                       class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm border-2 border-white/50 text-white px-6 py-3 rounded-lg font-medium hover:bg-white/90 hover:text-blue-700 hover:border-white transition-all duration-300 transform hover:scale-105 hover:shadow-lg group">
                        <svg class="w-5 h-5 transition-transform duration-300 group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                        Lihat Profil Lainnya
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Custom Styles -->
    <style>
        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        @keyframes float-reverse {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(20px) rotate(-180deg);
            }
        }

        @keyframes shimmer {
            0% {
                transform: translateX(-100%) skewX(-12deg);
            }
            100% {
                transform: translateX(200%) skewX(-12deg);
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-float-reverse {
            animation: float-reverse 8s ease-in-out infinite;
        }

        .animate-shimmer {
            animation: shimmer 3s ease-in-out infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Enhanced Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f8fafc;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #3b82f6, #8b5cf6, #a855f7);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #2563eb, #7c3aed, #9333ea);
        }

        /* Dark mode scrollbar */
        .dark ::-webkit-scrollbar-track {
            background: #374151;
        }

        /* Text gradient animation */
        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
    </style>
</x-app-layout>