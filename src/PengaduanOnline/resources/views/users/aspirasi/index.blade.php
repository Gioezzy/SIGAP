<script>
    function toggleContent(id) {
        const content = document.getElementById(`content-${id}`);
        const toggleText = document.getElementById(`toggle-text-${id}`);
        const toggleIcon = document.getElementById(`toggle-icon-${id}`);

        if (content.classList.contains('collapsed')) {
            // Expand
            content.classList.remove('collapsed');
            content.classList.add('expanded');
            toggleText.textContent = 'Sembunyikan';
            toggleIcon.style.transform = 'rotate(180deg)';
        } else {
            // Collapse
            content.classList.remove('expanded');
            content.classList.add('collapsed');
            toggleText.textContent = 'Selengkapnya';
            toggleIcon.style.transform = 'rotate(0deg)';
        }
    }
</script>

<x-app-layout>
    <x-slot name="header">
        <div
            class="relative mt-8 overflow-hidden shadow-2xl bg-gradient-to-br from-sky-400 via-blue-500 to-blue-600 rounded-2xl">
            <div class="absolute inset-0 bg-black/30"></div>
            <!-- Animated background elements -->
            <div
                class="absolute top-0 right-0 w-64 h-64 transform translate-x-32 -translate-y-32 rounded-full bg-white/10 blur-3xl animate-pulse">
            </div>
            <div
                class="absolute bottom-0 left-0 w-48 h-48 transform -translate-x-24 translate-y-24 rounded-full bg-blue-300/20 blur-2xl animate-bounce">
            </div>

            <div class="relative px-4 py-12 sm:px-8 sm:py-16">
                <div
                    class="flex flex-col items-start justify-between space-y-6 lg:flex-row lg:items-center lg:space-y-0">
                    <div class="flex items-center space-x-4 sm:space-x-6">
                        <div class="relative">
                            <div class="absolute inset-0 bg-white/30 rounded-2xl blur animate-pulse"></div>
                            <div
                                class="relative p-3 border bg-white/20 backdrop-blur-sm rounded-2xl border-white/30 sm:p-4">
                                <svg class="w-8 h-8 text-white sm:w-10 sm:h-10" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h1 class="mb-2 text-2xl font-bold text-white sm:text-4xl animate-fade-in-up">
                                Pusat Aspirasi Masyarakat
                            </h1>
                            <p class="text-sm text-blue-100 sm:text-lg animate-fade-in-up animation-delay-200">
                                Suara Anda adalah kunci perubahan. Mari bersama membangun masa depan yang lebih baik
                                melalui aspirasi positif.
                            </p>
                        </div>
                    </div>
                    <!-- Stats Cards -->
                    <div class="flex space-x-4">
                        <div class="p-3 border bg-white/20 backdrop-blur-sm rounded-xl border-white/30 sm:p-4">
                            <div class="text-xl font-bold text-white sm:text-2xl">{{ $aspirasi->count() ?? 0 }}</div>
                            <div class="text-xs text-blue-100 sm:text-sm">Total Aspirasi</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div
        class="min-h-screen py-8 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 dark:from-gray-900 dark:via-slate-800 dark:to-gray-900 sm:py-12">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">

            <!-- Action Button -->
            <div class="mb-8 animate-slide-in-left sm:mb-12">
                <div class="relative inline-block group">
                    <div
                        class="absolute transition duration-500 -inset-1 bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600
 rounded-2xl blur opacity-30 group-hover:opacity-70">
                    </div>
                    <a href="{{ route('aspirasi.create') }}"
                        class="relative inline-flex items-center px-6 py-3 font-semibold text-white transition-all duration-300 transform shadow-xl bg-gradient-to-br from-sky-400 via-blue-500 to-blue-600 rounded-2xl hover:from-purple-700 hover:to-pink-700 hover:scale-105 hover:shadow-2xl sm:px-8 sm:py-4">
                        <svg class="w-5 h-5 mr-2 transition-transform duration-300 group-hover:rotate-90 sm:w-6 sm:h-6 sm:mr-3"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <span class="text-base sm:text-lg">Buat Aspirasi Baru</span>
                        <div
                            class="absolute inset-0 transition-opacity duration-300 opacity-0 rounded-2xl bg-white/20 group-hover:opacity-100">
                        </div>
                    </a>
                </div>
            </div>

            <!-- Section Header -->
            <div class="mb-8 animate-fade-in-up animation-delay-300 sm:mb-10">
                <div class="text-center">
                    <h2
                        class="mb-4 text-2xl font-bold text-transparent bg-gradient-to-r from-gray-900 to-gray-600 dark:from-white dark:to-gray-300 bg-clip-text sm:text-3xl">
                        Daftar Aspirasi Saya
                    </h2>
                    <div class="w-24 h-1 mx-auto rounded-full bg-gradient-to-r from-sky-400 to-blue-500 sm:w-32">
                    </div>
                </div>
            </div>

            <!-- Enhanced Table Container -->
            <div class="animate-slide-in-up animation-delay-500">
                <div class="relative">
                    <div
                        class="absolute -inset-1 bg-gradient-to-r from-purple-200 to-pink-200 dark:from-purple-900 dark:to-pink-900 rounded-3xl blur opacity-30">
                    </div>

                    <div
                        class="relative overflow-hidden border shadow-2xl bg-white/90 backdrop-blur-xl dark:bg-gray-800/90 rounded-3xl border-white/50 dark:border-gray-700/50">
                        <!-- Glass effect overlay -->
                        <div
                            class="absolute inset-0 pointer-events-none bg-gradient-to-br from-white/60 to-transparent dark:from-gray-800/60">
                        </div>

                        <div class="relative overflow-x-auto">
                            <table class="min-w-full">
                                <thead
                                    class="bg-gradient-to-r from-gray-50/90 to-blue-50/90 dark:from-gray-700/90 dark:to-gray-600/90 backdrop-blur-sm">
                                    <tr>
                                        <th
                                            class="px-4 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase transition-colors duration-300 dark:text-gray-200 hover:text-emerald-600 dark:hover:text-emerald-400 sm:px-8 sm:py-6">
                                            <div class="flex items-center space-x-2 sm:space-x-3">
                                                <div class="p-1 bg-blue-100  rounded-lg dark:bg-emerald-900/50 sm:p-2">
                                                    <svg class="w-3 h-3 text-emerald-600 dark:bg-blue-900/50 sm:w-4 sm:h-4"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <span>Judul</span>
                                            </div>
                                        </th>
                                        <th
                                            class="px-4 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase transition-colors duration-300 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 sm:px-8 sm:py-6">
                                            <div class="flex items-center space-x-2 sm:space-x-3">
                                                <div class="p-1 bg-blue-100 rounded-lg dark:bg-blue-900/50 sm:p-2">
                                                    <svg class="w-3 h-3 text-blue-600 dark:text-blue-400 sm:w-4 sm:h-4"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <span>Isi Aspirasi</span>
                                            </div>
                                        </th>
                                        <th
                                            class="px-4 py-4 text-xs font-bold tracking-wider text-left text-gray-700 uppercase transition-colors duration-300 dark:text-gray-200 hover:text-blue-600 dark:hover:text-emerald-400 sm:px-8 sm:py-6">
                                            <div class="flex items-center space-x-2 sm:space-x-3">
                                                <div class="p-1 bg-cyan-100 rounded-lg dark:bg-cyan-900/50 sm:p-2">
                                                    <svg class="w-4 h-4 text-indigo-600 dark:text-indigo-400"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 7V3m8 4V3M5 11h14M5 7h14a2 2 0 012 2v11a2 2 0 01-2 2H5a2 2 0 01-2-2V9a2 2 0 012-2z" />
                                                    </svg>
                                                </div>
                                                <span>Tanggal</span>
                                            </div>
                                        </th>
                                        <th
                                            class="px-4 py-4 text-xs font-bold tracking-wider text-center text-gray-700 uppercase transition-colors duration-300 dark:text-gray-200 hover:text-emerald-600 dark:hover:text-emerald-400 sm:px-8 sm:py-6">
                                            <div class="flex items-center justify-center space-x-2 sm:space-x-3">
                                                <div class="p-1 bg-pink-100 rounded-lg dark:bg-pink-900/50 sm:p-2">
                                                    <svg class="w-3 h-3 text-pink-600 dark:text-pink-400 sm:w-4 sm:h-4"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <span>Aksi</span>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="divide-y bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm divide-gray-200/50 dark:divide-gray-700/50">
                                    @forelse($aspirasi as $index => $aspirasis)
                                        <tr class="hover:bg-gradient-to-r hover:from-purple-50/80 hover:to-pink-50/80 dark:hover:from-purple-900/30 dark:hover:to-pink-900/30 transition-all duration-500 transform hover:scale-[1.02] animate-table-row group"
                                            style="animation-delay: {{ $index * 150 }}ms">
                                            <td
                                                class="px-4 py-6 text-sm font-semibold text-gray-900 transition-colors duration-300 dark:text-gray-100 group-hover:text-purple-600 dark:group-hover:text-purple-400 sm:px-8 sm:py-8">
                                                <div class="relative">
                                                    <div class="mb-1 text-sm font-bold sm:text-base">
                                                        {{ $aspirasis->judul }}</div>
                                                    <div class="text-xs text-gray-500 dark:text-gray-400">ID:
                                                        #{{ $aspirasis->id }}</div>
                                                </div>
                                            </td>
                                            <td
                                                class="px-4 py-6 text-sm text-gray-700 transition-colors duration-300 dark:text-gray-300 group-hover:text-gray-900 dark:group-hover:text-gray-100 sm:px-8 sm:py-8">
                                                <div class="max-w-xs">
                                                    <div class="content-container collapsed"
                                                        id="content-{{ $aspirasis->id }}">
                                                        <p class="leading-relaxed">{{ $aspirasis->isi }}</p>
                                                    </div>
                                                    @if (strlen($aspirasis->isi) > 100)
                                                        <button onclick="toggleContent({{ $aspirasis->id }})"
                                                            id="toggle-btn-{{ $aspirasis->id }}"
                                                            class="flex items-center mt-2 space-x-1 text-xs font-semibold text-purple-600 transition-colors duration-200 hover:text-purple-800 dark:text-purple-400 dark:hover:text-purple-300">
                                                            <span
                                                                id="toggle-text-{{ $aspirasis->id }}">Selengkapnya</span>
                                                            <svg id="toggle-icon-{{ $aspirasis->id }}"
                                                                class="w-3 h-3 transition-transform duration-200 transform"
                                                                fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                            </svg>
                                                        </button>
                                                    @endif
                                                    <div class="mt-1 text-xs text-gray-400">
                                                        {{ strlen($aspirasis->isi) }} karakter</div>
                                                </div>
                                            </td>
                                            <td
                                                class="px-4 py-6 text-sm text-gray-700 transition-colors duration-300 dark:text-gray-300 group-hover:text-gray-900 dark:group-hover:text-gray-100 sm:px-8 sm:py-8">
                                                <div class="flex flex-col space-y-1">
                                                    <span
                                                        class="font-mono font-semibold">{{ $aspirasis->created_at->format('d/m/Y') }}</span>
                                                    <span
                                                        class="text-xs text-gray-400">{{ $aspirasis->created_at->format('H:i') }}</span>
                                                </div>
                                            </td>
                                            <td class="px-4 py-6 text-sm font-medium sm:px-8 sm:py-8">
                                                <div
                                                    class="flex flex-col justify-center space-y-2 sm:flex-row sm:space-y-0 sm:space-x-3">
                                                    <!-- Edit Button -->
                                                    <div class="relative group/btn">
                                                        <div
                                                            class="absolute transition duration-300 -inset-1 bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 rounded-xl blur opacity-30 group-hover/btn:opacity-70">
                                                        </div>
                                                        <a href="{{ route('aspirasi.edit', $aspirasis->id) }}"
                                                            class="relative inline-flex items-center justify-center w-full px-4 py-2 text-sm font-semibold text-white transition-all duration-300 transform shadow-lg bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl hover:from-blue-600 hover:to-cyan-600 hover:scale-110 hover:shadow-xl sm:w-auto sm:px-5 sm:py-3">
                                                            <svg class="w-3 h-3 mr-1 sm:w-4 sm:h-4 sm:mr-2"
                                                                fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 113 3L12 15l-4 1 1-4 9.5-9.5z" />
                                                            </svg>
                                                            Edit
                                                        </a>
                                                    </div>
                                                    <!-- Delete Button -->
                                                    <div class="relative group/btn">
                                                        <div
                                                            class="absolute transition duration-300 -inset-1 bg-gradient-to-r from-red-500 to-pink-500 rounded-xl blur opacity-30 group-hover/btn:opacity-70">
                                                        </div>
                                                        <form action="{{ route('aspirasi.destroy', $aspirasis->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Yakin ingin menghapus aspirasi ini?')"
                                                            class="w-full sm:w-auto">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="relative inline-flex items-center justify-center w-full px-4 py-2 text-sm font-semibold text-white transition-all duration-300 transform shadow-lg bg-gradient-to-r from-red-500 to-pink-500 rounded-xl hover:from-red-600 hover:to-pink-600 hover:scale-110 hover:shadow-xl sm:px-5 sm:py-3">
                                                                <svg class="w-3 h-3 mr-1 sm:w-4 sm:h-4 sm:mr-2"
                                                                    fill="none" stroke="currentColor"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                </svg>
                                                                Hapus
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="animate-fade-in">
                                            <td colspan="4" class="px-4 py-12 text-center sm:px-8 sm:py-20">
                                                <div class="flex flex-col items-center justify-center space-y-6">
                                                    <div class="relative">
                                                        <div
                                                            class="flex items-center justify-center w-24 h-24 rounded-full bg-gradient-to-br from-sky-100 to-blue-100  dark:from-blue-900/50 dark:to-teal-900/50 animate-bounce sm:w-32 sm:h-32">
                                                            <svg class="w-12 h-12 text-blue-400 dark:text-emerald-500 sm:w-16 sm:h-16"
                                                                fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                        <div
                                                            class="absolute w-6 h-6 rounded-full -top-2 -right-2 bg-gradient-to-r from-yellow-400 to-orange-400 animate-ping sm:w-8 sm:h-8">
                                                        </div>
                                                    </div>
                                                    <div class="max-w-md text-center">
                                                        <h3
                                                            class="mb-3 text-xl font-bold text-gray-900 dark:text-gray-100 sm:text-2xl">
                                                            Belum Ada Aspirasi</h3>
                                                        <p
                                                            class="mb-6 text-base text-gray-600 dark:text-gray-400 sm:text-lg">
                                                            Mulai dengan membuat aspirasi pertama Anda untuk menyuarakan
                                                            ide positif</p>
                                                        <div class="relative inline-block">
                                                            <div
                                                                class="absolute -inset-1 bg-gradient-to-r from-sky-400 to-blue-500 rounded-2xl blur opacity-30">
                                                            </div>
                                                            <a href="{{ route('aspirasi.create') }}"
                                                                class="relative inline-flex items-center px-6 py-3 font-semibold text-white transition-all duration-300 transform bg-gradient-to-r from-sky-400 to-blue-500 rounded-2xl hover:from-purple-700 hover:to-pink-700 hover:scale-105 sm:px-8 sm:py-4 sm:text-lg">
                                                                <svg class="w-5 h-5 mr-2 sm:w-6 sm:h-6 sm:mr-3"
                                                                    fill="none" stroke="currentColor"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                                </svg>
                                                                Buat Aspirasi Pertama
                                                            </a>
                                                        </div>
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

        @keyframes slide-in-left {
            from {
                opacity: 0;
                transform: translateX(-60px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
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

        @keyframes fade-in {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 1s ease-out forwards;
        }

        .animate-slide-in-left {
            animation: slide-in-left 1s ease-out forwards;
        }

        .animate-slide-in-up {
            animation: slide-in-up 1s ease-out forwards;
        }

        .animate-table-row {
            animation: table-row 0.8s ease-out forwards;
        }

        .animate-fade-in {
            animation: fade-in 0.8s ease-out forwards;
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

        .backdrop-blur-xl {
            backdrop-filter: blur(20px);
        }

        .backdrop-blur-sm {
            backdrop-filter: blur(6px);
        }

        .bg-clip-text {
            -webkit-background-clip: text;
            background-clip: text;
        }

        .overflow-x-auto::-webkit-scrollbar {
            height: 8px;
        }

        .overflow-x-auto::-webkit-scrollbar-track {
            background: rgba(156, 163, 175, 0.1);
            border-radius: 10px;
        }

        .overflow-x-auto::-webkit-scrollbar-thumb {
            background: linear-gradient(90deg, #8b5cf6, #ec4899);
            border-radius: 10px;
        }

        .overflow-x-auto::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(90deg, #8b5cf6, #ec4899);
        }

        .content-container {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .collapsed {
            max-height: 4.5rem;
            overflow: hidden;
        }

        .collapsed::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 1.5rem;
            background: linear-gradient(transparent, rgba(255, 255, 255, 0.9));
            pointer-events: none;
        }

        .dark .collapsed::after {
            background: linear-gradient(transparent, rgba(31, 41, 55, 0.9));
        }

        .expanded {
            max-height: none;
        }

        .expanded::after {
            display: none;
        }
    </style>
</x-app-layout>
