<x-app-layout>
    <x-slot name="header">
        <div
            class="relative overflow-hidden bg-gradient-to-br from-sky-400 via-blue-500 to-blue-600 rounded-2xl shadow-2xl">
            <div class="absolute inset-0 bg-black/30"></div>
            <div
                class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl transform -translate-y-32 translate-x-32 animate-pulse">
            </div>
            <div
                class="absolute bottom-0 left-0 w-48 h-48 bg-blue-300/20 rounded-full blur-2xl transform translate-y-24 -translate-x-24 animate-bounce">
            </div>

            <div class="relative px-8 py-16">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-6">
                        <div class="relative">
                            <div class="absolute inset-0 bg-white/30 rounded-2xl blur animate-pulse"></div>
                            <div class="relative p-4 bg-white/20 backdrop-blur-sm rounded-2xl border border-white/30">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h1 class="text-4xl font-bold text-white mb-2 animate-fade-in-up">
                                Riwayat Tanggapan
                            </h1>
                            <p class="text-blue-100 text-lg animate-fade-in-up animation-delay-200">
                                Cek respon petugas atas pengaduan Anda
                            </p>
                        </div>
                    </div>
                    <div class="hidden lg:flex space-x-4">
                        <div class="bg-white/20 backdrop-blur-sm rounded-xl p-4 border border-white/30">
                            <div class="text-white text-2xl font-bold">{{ $tanggapans->count() ?? 0 }}</div>
                            <div class="text-blue-100 text-sm">Total Tanggapan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div
        class="py-12 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 dark:from-gray-900 dark:via-slate-800 dark:to-gray-900 min-h-screen">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-10 animate-fade-in-up animation-delay-300 text-center">
                <h2
                    class="text-3xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 dark:from-white dark:to-gray-300 bg-clip-text text-transparent mb-4">
                   Tanggapan Pengaduan Anda
                </h2>
                <div class="mx-auto w-32 h-1 bg-gradient-to-r from-sky-400 to-blue-500 rounded-full"></div>
            </div>

            <div class="animate-slide-in-up animation-delay-500 relative">
                <div
                    class="absolute -inset-1 bg-gradient-to-r from-purple-200 to-pink-200 dark:from-purple-900 dark:to-pink-900 rounded-3xl blur opacity-30">
                </div>
                <div
                    class="relative overflow-hidden bg-white/90 backdrop-blur-xl shadow-2xl dark:bg-gray-800/90 rounded-3xl border border-white/50 dark:border-gray-700/50">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-white/60 to-transparent dark:from-gray-800/60 pointer-events-none">
                    </div>

                    <div class="relative overflow-x-auto">
                        <table class="min-w-full">
                            <thead
                                class="bg-gradient-to-r from-gray-50/90 to-blue-50/90 dark:from-gray-700/90 dark:to-gray-600/90 backdrop-blur-sm">
                                <tr>
                                    <th
                                        class="px-8 py-6 text-left text-xs font-bold text-gray-700 uppercase dark:text-gray-200">
                                        Judul</th>
                                    <th
                                        class="px-8 py-6 text-left text-xs font-bold text-gray-700 uppercase dark:text-gray-200">
                                        Kategori</th>
                                    <th
                                        class="px-8 py-6 text-left text-xs font-bold text-gray-700 uppercase dark:text-gray-200">
                                        Tanggapan</th>
                                    <th
                                        class="px-8 py-6 text-left text-xs font-bold text-gray-700 uppercase dark:text-gray-200">
                                        Status</th>
                                    <th
                                        class="px-8 py-6 text-left text-xs font-bold text-gray-700 uppercase dark:text-gray-200">
                                        Tanggal</th>
                                </tr>
                            </thead>
                            <tbody
                                class="bg-white/60 dark:bg-gray-800/60 divide-y divide-gray-200/50 dark:divide-gray-700/50">
                                @forelse($tanggapans as $index => $tanggapan)
                                    <tr class="group hover:bg-gradient-to-r hover:from-purple-50/80 hover:to-pink-50/80 dark:hover:from-purple-900/30 dark:hover:to-pink-900/30 transition-all duration-500 transform hover:scale-[1.02] animate-table-row"
                                        style="animation-delay: {{ $index * 150 }}ms">
                                        <td
                                            class="px-8 py-6 font-semibold text-gray-900 dark:text-gray-100 group-hover:text-purple-600 dark:group-hover:text-purple-400">
                                            {{ $tanggapan->pengaduan->judul ?? '-' }}
                                        </td>
                                        <td class="px-8 py-6">
                                            <span
                                                class="inline-flex items-center px-4 py-2 rounded-xl text-sm font-semibold bg-gradient-to-r from-blue-100 to-indigo-100 text-blue-800 dark:from-blue-900/60 dark:to-indigo-900/60 dark:text-blue-200">
                                                {{ $tanggapan->kategori->namaKategori ?? '-' }}
                                            </span>
                                        </td>
                                        <td class="px-8 py-6 text-gray-700 dark:text-gray-300">
                                            {{ strip_tags($tanggapan->isi_tanggapan) }}
                                        </td>
                                        <td class="px-8 py-6">
                                            @php
                                                $status = strtolower($tanggapan->pengaduan->status ?? 'proses');
                                                $classMap = [
                                                    'selesai' =>
                                                        'bg-gradient-to-r from-green-100 to-emerald-100 text-emerald-800 dark:from-green-900/60 dark:to-emerald-900/60 dark:text-emerald-200',
                                                    'proses' =>
                                                        'bg-gradient-to-r from-blue-100 to-cyan-100 text-blue-800 dark:from-blue-900/60 dark:to-cyan-900/60 dark:text-blue-200',
                                                    'menunggu' =>
                                                        'bg-gradient-to-r from-orange-100 to-yellow-100 text-yellow-800 dark:from-orange-900/60 dark:to-yellow-900/60 dark:text-yellow-200',
                                                    'ditolak' =>
                                                        'bg-gradient-to-r from-red-100 to-pink-100 text-red-800 dark:from-red-900/60 dark:to-pink-900/60 dark:text-red-200',
                                                ];
                                                $statusClass = $classMap[$status] ?? $classMap['proses'];
                                            @endphp

                                            <span
                                                class="inline-flex items-center px-4 py-2 rounded-xl text-sm font-bold border border-white/20 {{ $statusClass }}">
                                                {{ ucfirst($status) }}
                                            </span>
                                        </td>

                                        <td class="px-8 py-6 text-sm text-gray-600 dark:text-gray-300">
                                            <div class="flex flex-col">
                                                <span>{{ $tanggapan->created_at->format('d/m/Y') }}</span>
                                                {{-- <span class="text-xs">{{ $tanggapan->created_at->format('H:i') }}</span> --}}
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="animate-fade-in">
                                        <td colspan="5" class="px-8 py-20 text-center">
                                            <h3 class="text-xl font-bold text-gray-600 dark:text-gray-300">Belum Ada
                                                Tanggapan</h3>
                                            <p class="text-gray-500 dark:text-gray-400">Tanggapan dari petugas akan
                                                tampil di sini setelah tersedia.</p>
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

        .animate-fade-in-up {
            animation: fade-in-up 1s ease-out forwards;
        }

        .animate-slide-in-up {
            animation: slide-in-up 1s ease-out forwards;
        }

        .animate-table-row {
            animation: table-row 0.8s ease-out forwards;
        }

        .animation-delay-200 {
            animation-delay: 200ms;
        }

        .animation-delay-300 {
            animation-delay: 300ms;
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

        .overflow-x-auto::-webkit-scrollbar {
            height: 8px;
        }

        .overflow-x-auto::-webkit-scrollbar-thumb {
            background: linear-gradient(90deg, #8b5cf6, #ec4899);
            border-radius: 10px;
        }

        .overflow-x-auto::-webkit-scrollbar-track {
            background: rgba(156, 163, 175, 0.1);
        }
    </style>
</x-app-layout>
