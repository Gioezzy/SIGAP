<x-app-layout>
    <x-slot name="header">
        <div class="relative overflow-hidden bg-gradient-to-br from-indigo-600 via-purple-600 to-blue-700 rounded-3xl shadow-2xl">
            <!-- Background Pattern -->
            <div class="absolute inset-0 bg-black/20"></div>
            <div class="absolute top-0 right-0 w-96 h-96 bg-white/10 rounded-full blur-3xl transform -translate-y-48 translate-x-48 animate-pulse"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-purple-300/20 rounded-full blur-2xl transform translate-y-32 -translate-x-32 animate-bounce"></div>
            <div class="absolute top-1/2 left-1/2 w-32 h-32 bg-blue-300/20 rounded-full blur-xl transform -translate-x-16 -translate-y-16 animate-ping"></div>

            <div class="relative px-8 py-20">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-8">
                        <div class="relative group">
                            <div class="absolute inset-0 bg-gradient-to-r from-white/30 to-purple-200/30 rounded-3xl blur-lg animate-pulse group-hover:blur-xl transition-all duration-500"></div>
                            <div class="relative p-6 bg-white/20 backdrop-blur-lg rounded-3xl border border-white/30 shadow-xl group-hover:scale-110 transition-transform duration-500">
                                <!-- Lightbulb Icon for Suggestions -->
                                <svg class="w-12 h-12 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <h1 class="text-5xl font-bold text-white mb-2 animate-fade-in-up drop-shadow-2xl">
                                Tanggapan Kritik & Saran
                            </h1>
                            <p class="text-indigo-100 text-xl font-medium animate-fade-in-up animation-delay-200 drop-shadow-lg">
                                Monitor dan cek respon petugas atas kritik & saran Anda
                            </p>
                            <div class="flex items-center space-x-2 animate-fade-in-up animation-delay-400">
                                <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                                <div class="w-2 h-2 bg-white/70 rounded-full animate-pulse animation-delay-200"></div>
                                <div class="w-2 h-2 bg-white/50 rounded-full animate-pulse animation-delay-400"></div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden lg:flex space-x-6">
                        <div class="bg-white/20 backdrop-blur-lg rounded-2xl p-6 border border-white/30 shadow-xl hover:scale-105 transition-transform duration-300 group">
                            <div class="flex items-center space-x-3">
                                <div class="p-2 bg-white/20 rounded-xl">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-white text-3xl font-bold group-hover:scale-110 transition-transform duration-300">{{ $tanggapans->count() ?? 0 }}</div>
                                    <div class="text-indigo-100 text-sm font-medium">Total Tanggapan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-16 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 dark:from-gray-900 dark:via-slate-800 dark:to-gray-900 min-h-screen">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="mb-12 animate-fade-in-up animation-delay-300 text-center">
                <div class="flex items-center justify-center space-x-3 mb-6">
                    <div class="p-3 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <h2 class="text-4xl font-bold bg-gradient-to-r from-gray-900 to-indigo-600 dark:from-white dark:to-indigo-300 bg-clip-text text-transparent">
                        Tanggapan Kritik & Saran Anda
                    </h2>
                </div>
                <div class="mx-auto w-40 h-1.5 bg-gradient-to-r from-indigo-400 via-purple-500 to-blue-500 rounded-full shadow-lg"></div>
                <p class="mt-4 text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Pantau perkembangan dan tanggapan terkini dari petugas untuk setiap kritik & saran yang telah Anda sampaikan
                </p>
            </div>

            <!-- Main Content Card -->
            <div class="animate-slide-in-up animation-delay-500 relative">
                <div class="absolute -inset-2 bg-gradient-to-r from-indigo-200 via-purple-200 to-pink-200 dark:from-indigo-900 dark:via-purple-900 dark:to-pink-900 rounded-3xl blur-lg opacity-40 animate-pulse"></div>
                
                <div class="relative overflow-hidden bg-white/95 backdrop-blur-xl shadow-2xl dark:bg-gray-800/95 rounded-3xl border border-white/60 dark:border-gray-700/60">
                    <div class="absolute inset-0 bg-gradient-to-br from-white/80 to-transparent dark:from-gray-800/80 pointer-events-none"></div>

                    <!-- Table Header with Icons -->
                    <div class="relative bg-gradient-to-r from-indigo-50/90 via-purple-50/90 to-blue-50/90 dark:from-gray-700/90 dark:via-gray-600/90 dark:to-gray-700/90 backdrop-blur-sm border-b border-gray-200/50 dark:border-gray-700/50">
                        <div class="px-8 py-6">
                            <div class="flex items-center justify-between">
                                <h3 class="text-xl font-bold text-gray-800 dark:text-gray-200 flex items-center space-x-3">
                                    <div class="p-2 bg-indigo-100 dark:bg-indigo-900/50 rounded-xl">
                                        <svg class="w-5 h-5 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                        </svg>
                                    </div>
                                    <span>Daftar Tanggapan</span>
                                </h3>
                                <div class="flex space-x-2">
                                    <div class="px-4 py-2 bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-200 rounded-xl text-sm font-medium">
                                        <span class="inline-block w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></span>
                                        Live Update
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="relative overflow-x-auto custom-scrollbar">
                        <table class="min-w-full">
                            <thead class="bg-gradient-to-r from-gray-50/90 to-blue-50/90 dark:from-gray-700/90 dark:to-gray-600/90 backdrop-blur-sm">
                                <tr>
                                    <th class="px-8 py-6 text-left text-xs font-bold text-gray-700 uppercase dark:text-gray-200 tracking-wider">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-1l-4 4z"></path>
                                            </svg>
                                            <span>Judul</span>
                                        </div>
                                    </th>
                                    <th class="px-8 py-6 text-left text-xs font-bold text-gray-700 uppercase dark:text-gray-200 tracking-wider">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                            </svg>
                                            <span>Kritik/Saran</span>
                                        </div>
                                    </th>
                                    <th class="px-8 py-6 text-left text-xs font-bold text-gray-700 uppercase dark:text-gray-200 tracking-wider">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                            </svg>
                                            <span>Tanggapan</span>
                                        </div>
                                    </th>
                                    <th class="px-8 py-6 text-left text-xs font-bold text-gray-700 uppercase dark:text-gray-200 tracking-wider">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-4 8a5 5 0 01-5-5v-4a5 5 0 0110 0v4a5 5 0 01-5 5zm0 0v4"></path>
                                            </svg>
                                            <span>Tanggal</span>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white/60 dark:bg-gray-800/60 divide-y divide-gray-200/50 dark:divide-gray-700/50">
                                @forelse($tanggapans as $index => $tanggapan)
                                    <tr class="group hover:bg-gradient-to-r hover:from-indigo-50/80 hover:via-purple-50/80 hover:to-pink-50/80 dark:hover:from-indigo-900/30 dark:hover:via-purple-900/30 dark:hover:to-pink-900/30 transition-all duration-700 transform hover:scale-[1.01] hover:shadow-lg animate-table-row"
                                        style="animation-delay: {{ $index * 100 }}ms">
                                        <td class="px-8 py-6 font-semibold text-gray-900 dark:text-gray-100 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors duration-300">
                                            <div class="flex items-center space-x-3">
                                                <div class="w-2 h-2 bg-indigo-500 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                                <span class="line-clamp-2">{{ $tanggapan->kritikSaran->judul ?? '-' }}</span>
                                            </div>
                                        </td>
                                        <td class="px-8 py-6 text-gray-700 dark:text-gray-300">
                                            <div class="max-w-md">
                                                <p class="line-clamp-3 text-sm leading-relaxed">
                                                    {{ Str::limit($tanggapan->kritikSaran->isi ?? '-', 120) }}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="px-8 py-6 text-gray-700 dark:text-gray-300">
                                            <div class="max-w-md">
                                                <span class="text-gray-800 dark:text-gray-200 text-sm leading-relaxed">
                                                    {{ strip_tags($tanggapan->tanggapan) }}
                                                </span>
                                            </div>
                                        </td>                                        
                                        <td class="px-8 py-6 text-sm text-gray-600 dark:text-gray-300">
                                            <div class="flex items-center space-x-2">
                                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-4 8a5 5 0 01-5-5v-4a5 5 0 0110 0v4a5 5 0 01-5 5zm0 0v4"></path>
                                                </svg>
                                                <div class="flex flex-col">
                                                    <span class="font-medium">{{ $tanggapan->created_at->format('d/m/Y') }}</span>
                                                    <span class="text-xs text-gray-500 dark:text-gray-400">{{ $tanggapan->created_at->format('H:i') }} WIB</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="animate-fade-in">
                                        <td colspan="5" class="px-8 py-24 text-center">
                                            <div class="flex flex-col items-center space-y-4">
                                                <div class="p-6 bg-gray-100 dark:bg-gray-700 rounded-full">
                                                    <svg class="w-16 h-16 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                                    </svg>
                                                </div>
                                                <div class="text-center">
                                                    <h3 class="text-2xl font-bold text-gray-600 dark:text-gray-300 mb-2">Belum Ada Tanggapan</h3>
                                                    <p class="text-gray-500 dark:text-gray-400 max-w-md mx-auto">
                                                        Tanggapan dari petugas akan tampil di sini setelah kritik & saran Anda ditinjau oleh admin.
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slide-in-up {
            from {
                opacity: 0;
                transform: translateY(60px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes table-row {
            from {
                opacity: 0;
                transform: translateX(30px) translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateX(0) translateY(0);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 1s ease-out forwards;
        }

        .animate-slide-in-up {
            animation: slide-in-up 1s ease-out forwards;
        }

        .animate-table-row {
            animation: table-row 0.8s ease-out forwards;
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .animation-delay-200 {
            animation-delay: 200ms;
        }

        .animation-delay-300 {
            animation-delay: 300ms;
        }

        .animation-delay-400 {
            animation-delay: 400ms;
        }

        .animation-delay-500 {
            animation-delay: 500ms;
        }

        html {
            scroll-behavior: smooth;
        }

        .bg-clip-text {
            -webkit-background-clip: text;
            background-clip: text;
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

        .custom-scrollbar::-webkit-scrollbar {
            height: 8px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: linear-gradient(90deg, #6366f1, #8b5cf6, #ec4899);
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(156, 163, 175, 0.1);
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(90deg, #4f46e5, #7c3aed, #db2777);
        }

        /* Hover effects */
        .group:hover .line-clamp-2,
        .group:hover .line-clamp-3 {
            -webkit-line-clamp: unset;
        }

        /* Responsive improvements */
        @media (max-width: 768px) {
            .animate-fade-in-up h1 {
                font-size: 2.5rem;
            }
            
            .animate-fade-in-up p {
                font-size: 1rem;
            }
        }
    </style>
</x-app-layout>