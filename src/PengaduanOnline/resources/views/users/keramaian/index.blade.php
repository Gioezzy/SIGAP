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

            <div class="relative px-8 py-16">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-6">
                        <div class="relative">
                            <div class="absolute inset-0 bg-white/30 rounded-2xl blur animate-pulse"></div>
                            <div class="relative p-4 border bg-white/20 backdrop-blur-sm rounded-2xl border-white/30">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a4 4 0 00-5-4M9 20H4v-2a4 4 0 015-4m4-4a4 4 0 100-8 4 4 0 000 8zm6 4a4 4 0 00-6 0m-6 0a4 4 0 00-6 0" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h1 class="mb-2 text-4xl font-bold text-white animate-fade-in-up">
                                Manajemen Acara Keramaian
                            </h1>
                            <p class="text-lg text-blue-100 animate-fade-in-up animation-delay-200">
                                Kelola dan pantau semua acara keramaian dengan sistem yang terintegrasi dan mudah
                                digunakan.
                            </p>
                        </div>
                    </div>
                    <!-- Stats Cards -->
                    <div class="hidden space-x-4 lg:flex">
                        <div class="p-4 border bg-white/20 backdrop-blur-sm rounded-xl border-white/30">
                            <div class="text-2xl font-bold text-white">{{ $keramaian->count() ?? 0 }}</div>
                            <div class="text-sm text-blue-100">Total Acara</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div
        class="min-h-screen py-12 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 dark:from-gray-900 dark:via-slate-800 dark:to-gray-900">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">

            <!-- Action Button -->
            <div class="mb-12 animate-slide-in-left">
                <div class="relative inline-block group">
                    <div
                        class="absolute transition duration-500 -inset-1 bg-gradient-to-r from-sky-400 via-blue-500 to-blue-600 rounded-2xl blur opacity-30 group-hover:opacity-70">
                    </div>
                    <a href="{{ route('keramaian.create') }}"
                        class="relative inline-flex items-center px-8 py-4 font-semibold text-white transition-all duration-300 transform shadow-xl bg-gradient-to-br from-sky-400 via-blue-500 to-blue-600 rounded-2xl hover:from-purple-700 hover:to-pink-700 hover:scale-105 hover:shadow-2xl">
                        <svg class="w-6 h-6 mr-3 transition-transform duration-300 group-hover:rotate-90" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <span class="text-lg">Tambah Acara Baru</span>
                        <div
                            class="absolute inset-0 transition-opacity duration-300 opacity-0 rounded-2xl bg-white/20 group-hover:opacity-100">
                        </div>
                    </a>
                </div>
            </div>

            <!-- Section Header -->
            <div class="mb-10 animate-fade-in-up animation-delay-300">
                <div class="text-center">
                    <h2
                        class="mb-4 text-3xl font-bold text-transparent bg-gradient-to-r from-gray-900 to-gray-600 dark:from-white dark:to-gray-300 bg-clip-text">
                        Daftar Ajuan Izin Keramaian
                    </h2>
                    <div class="w-32 h-1 mx-auto rounded-full bg-gradient-to-r from-sky-400 to-blue-500"></div>
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
                                            class="px-4 py-6 text-xs font-bold tracking-wider text-left text-gray-700 uppercase transition-colors duration-300 sm:px-8 dark:text-gray-200 hover:text-purple-600 dark:hover:text-purple-400">
                                            <div class="flex items-center space-x-3">
                                                <div class="p-2 bg-purple-100 rounded-lg dark:bg-purple-900/50">
                                                    <svg class="w-4 h-4 text-purple-600 dark:text-purple-400"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 7V3a4 4 0 118 0v4m-4 12v-4m0 0V9a2 2 0 012-2h4a2 2 0 012 2v4a2 2 0 01-2 2h-4a2 2 0 01-2-2z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <span>Nama Acara</span>
                                            </div>
                                        </th>
                                        <th
                                            class="px-4 py-6 text-xs font-bold tracking-wider text-left text-gray-700 uppercase transition-colors duration-300 sm:px-8 dark:text-gray-200 hover:text-purple-600 dark:hover:text-purple-400">
                                            <div class="flex items-center space-x-3">
                                                <div class="p-2 bg-blue-100 rounded-lg dark:bg-blue-900/50">
                                                    <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                        </path>
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <span>Lokasi</span>
                                            </div>
                                        </th>
                                        <th
                                            class="px-4 py-6 text-xs font-bold tracking-wider text-left text-gray-700 uppercase transition-colors duration-300 sm:px-8 dark:text-gray-200 hover:text-purple-600 dark:hover:text-purple-400">
                                            <div class="flex items-center space-x-3">
                                                <div class="p-2 bg-green-100 rounded-lg dark:bg-green-900/50">
                                                    <svg class="w-4 h-4 text-purple-600 dark:text-purple-400"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M3 10l1-2m0 0l2-1 9-3v13L6 11l-2-1zm13 1v2m0-4v.01" />
                                                    </svg>
                                                </div>
                                                <span>Tanggal</span>
                                            </div>
                                        </th>
                                        <th
                                            class="px-4 py-6 text-xs font-bold tracking-wider text-left text-gray-700 uppercase transition-colors duration-300 sm:px-8 dark:text-gray-200 hover:text-purple-600 dark:hover:text-purple-400">
                                            <div class="flex items-center space-x-3">
                                                <div class="p-2 bg-yellow-100 rounded-lg dark:bg-yellow-900/50">
                                                    <svg class="w-4 h-4 text-yellow-600 dark:text-yellow-400"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <span>Waktu</span>
                                            </div>
                                        </th>
                                        <th
                                            class="px-4 py-6 text-xs font-bold tracking-wider text-left text-gray-700 uppercase transition-colors duration-300 sm:px-8 dark:text-gray-200 hover:text-purple-600 dark:hover:text-purple-400">
                                            <div class="flex items-center space-x-3">
                                                <div class="p-2 bg-indigo-100 rounded-lg dark:bg-indigo-900/50">
                                                    <svg class="w-4 h-4 text-indigo-600 dark:text-indigo-400"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                </div>
                                                <span>Status</span>
                                            </div>
                                        </th>
                                        <th
                                            class="px-4 py-6 text-xs font-bold tracking-wider text-center text-gray-700 uppercase transition-colors duration-300 sm:px-8 dark:text-gray-200 hover:text-purple-600 dark:hover:text-purple-400">
                                            <div class="flex items-center justify-center space-x-3">
                                                <div class="p-2 bg-pink-100 rounded-lg dark:bg-pink-900/50">
                                                    <svg class="w-4 h-4 text-pink-600 dark:text-pink-400"
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
                                    @forelse($keramaian as $index => $event)
                                        <tr class="hover:bg-gradient-to-r hover:from-purple-50/80 hover:to-pink-50/80 dark:hover:from-purple-900/30 dark:hover:to-pink-900/30 transition-all duration-500 transform hover:scale-[1.02] animate-table-row group"
                                            style="animation-delay: {{ $index * 150 }}ms">
                                            <td
                                                class="px-4 py-8 text-sm font-semibold text-gray-900 transition-colors duration-300 sm:px-8 dark:text-gray-100 group-hover:text-purple-600 dark:group-hover:text-purple-400">
                                                <div class="relative">
                                                    <div class="mb-1 text-base font-bold">{{ $event->nama_acara }}
                                                    </div>
                                                    <div class="text-xs text-gray-500 dark:text-gray-400">ID:
                                                        #{{ $event->id }}</div>
                                                </div>
                                            </td>
                                            <td
                                                class="px-4 py-8 text-sm text-gray-700 transition-colors duration-300 sm:px-8 dark:text-gray-300 group-hover:text-gray-900 dark:group-hover:text-gray-100">
                                                <div class="flex items-center space-x-2">
                                                    <svg class="w-4 h-4 text-gray-400" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                        </path>
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z">
                                                        </path>
                                                    </svg>
                                                    <span class="font-medium">{{ $event->lokasi_acara }}</span>
                                                </div>
                                            </td>
                                            <td
                                                class="px-4 py-8 text-sm text-gray-700 transition-colors duration-300 sm:px-8 dark:text-gray-300 group-hover:text-gray-900 dark:group-hover:text-gray-100">
                                                <div class="flex flex-col space-y-1">
                                                    <span
                                                        class="font-mono font-semibold">{{ \Carbon\Carbon::parse($event->tanggal_acara)->format('d/m/Y') }}</span>
                                                    <span
                                                        class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($event->tanggal_acara)->format('l') }}</span>
                                                </div>
                                            </td>
                                            <td
                                                class="px-4 py-8 text-sm text-gray-700 transition-colors duration-300 sm:px-8 dark:text-gray-300 group-hover:text-gray-900 dark:group-hover:text-gray-100">
                                                <div class="flex items-center space-x-2">
                                                    <svg class="w-4 h-4 text-gray-400" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    <span
                                                        class="font-mono font-semibold">{{ $event->waktu_acara }}</span>
                                                </div>
                                            </td>
                                            <td class="px-4 py-8 text-sm sm:px-8">
                                                @if ($event->status == 'menunggu')
                                                    <span
                                                        class="inline-flex items-center px-4 py-2 text-sm font-bold transition-transform duration-200 transform border rounded-xl bg-gradient-to-r from-amber-100 to-orange-100 text-amber-800 dark:from-amber-900/60 dark:to-orange-900/60 dark:text-amber-200 border-amber-200/60 dark:border-amber-700/60 hover:scale-105">
                                                        <div
                                                            class="w-3 h-3 mr-3 rounded-full bg-amber-500 animate-pulse">
                                                        </div>
                                                        Menunggu
                                                    </span>
                                                @elseif($event->status == 'disetujui')
                                                    <span
                                                        class="inline-flex items-center px-4 py-2 text-sm font-bold text-blue-800 transition-transform duration-200 transform border rounded-xl bg-gradient-to-r from-blue-100 to-cyan-100 dark:from-blue-900/60 dark:to-cyan-900/60 dark:text-blue-200 border-blue-200/60 dark:border-blue-700/60 hover:scale-105">
                                                        <div
                                                            class="w-3 h-3 mr-3 bg-blue-500 rounded-full animate-spin">
                                                        </div>
                                                        Disetujui
                                                    </span>
                                                @elseif($event->status == 'ditolak')
                                                    <span
                                                        class="inline-flex items-center px-4 py-2 text-sm font-bold text-red-800 transition-transform duration-200 transform border rounded-xl bg-gradient-to-r from-red-100 to-pink-100 dark:from-red-900/60 dark:to-pink-900/60 dark:text-red-200 border-red-200/60 dark:border-red-700/60 hover:scale-105">
                                                        <div
                                                            class="w-3 h-3 mr-3 bg-red-500 rounded-full animate-pulse">
                                                        </div>
                                                        Ditolak
                                                    </span>
                                                @else
                                                    <span
                                                        class="inline-flex items-center px-4 py-2 text-sm font-bold transition-transform duration-200 transform border rounded-xl bg-gradient-to-r from-emerald-100 to-green-100 text-emerald-800 dark:from-emerald-900/60 dark:to-green-900/60 dark:text-emerald-200 border-emerald-200/60 dark:border-emerald-700/60 hover:scale-105">
                                                        <div class="w-3 h-3 mr-3 rounded-full bg-emerald-500"></div>
                                                        Selesai
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="px-4 py-8 text-sm font-medium sm:px-8">
                                                <div
                                                    class="flex flex-col justify-center space-y-2 sm:flex-row sm:space-y-0 sm:space-x-3">
                                                    <!-- Edit Button -->
                                                    <div class="relative group/btn">
                                                        <div
                                                            class="absolute transition duration-300 -inset-1 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl blur opacity-30 group-hover/btn:opacity-70">
                                                        </div>
                                                        <a href="{{ route('keramaian.edit', $event) }}"
                                                            class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-white transition-all duration-300 transform shadow-lg bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl hover:from-blue-600 hover:to-cyan-600 hover:scale-110 hover:shadow-xl">
                                                            <svg class="w-4 h-4 mr-2" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
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
                                                        <form action="{{ route('keramaian.destroy', $event) }}"
                                                            method="POST" class="inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn-delete relative inline-flex items-center px-4 py-2 text-sm font-semibold text-white transition-all duration-300 transform shadow-lg bg-gradient-to-r from-red-500 to-pink-500 rounded-xl hover:from-red-600 hover:to-pink-600 hover:scale-110 hover:shadow-xl">
                                                                <svg class="w-4 h-4 mr-2" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
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
                                            <td colspan="6" class="px-8 py-20 text-center">
                                                <div class="flex flex-col items-center justify-center space-y-6">
                                                    <div class="relative">
                                                        <div
                                                            class="flex items-center justify-center w-32 h-32 rounded-full bg-gradient-to-br from-purple-100 to-pink-100 dark:from-purple-900/50 dark:to-pink-900/50 animate-bounce">
                                                            <svg class="w-16 h-16 text-purple-400 dark:text-purple-500"
                                                                fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M8 7V3a4 4 0 118 0v4m-4 12v-4m0 0V9a2 2 0 012-2h4a2 2 0 012 2v4a2 2 0 01-2 2h-4a2 2 0 01-2-2z">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                        <div
                                                            class="absolute w-8 h-8 rounded-full -top-2 -right-2 bg-gradient-to-r from-yellow-400 to-orange-400 animate-ping">
                                                        </div>
                                                    </div>
                                                    <div class="max-w-md text-center">
                                                        <h3
                                                            class="mb-3 text-2xl font-bold text-gray-900 dark:text-gray-100">
                                                            Belum Ada Acara Keramaian</h3>
                                                        <p class="mb-6 text-lg text-gray-600 dark:text-gray-400">Mulai
                                                            dengan membuat acara keramaian pertama untuk mengelola
                                                            aktivitas masyarakat</p>
                                                        <div class="relative inline-block">
                                                            <div
                                                                class="absolute -inset-1 bg-gradient-to-r from-sky-400 to-blue-500 rounded-2xl blur opacity-30">
                                                            </div>
                                                            <a href="{{ route('keramaian.create') }}"
                                                                class="relative inline-flex items-center px-8 py-4 text-lg font-semibold text-white transition-all duration-300 transform bg-gradient-to-r from-sky-400 to-blue-500 rounded-2xl hover:from-purple-700 hover:to-pink-700 hover:scale-105">
                                                                <svg class="w-6 h-6 mr-3" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                                </svg>
                                                                Buat Acara Pertama
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
    <x-alertdelete />

</x-app-layout>

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

    /* Enhanced glassmorphism effect */
    .backdrop-blur-xl {
        backdrop-filter: blur(20px);
    }

    .backdrop-blur-sm {
        backdrop-filter: blur(6px);
    }

    /* Smooth scrolling */
    html {
        scroll-behavior: smooth;
    }

    /* Enhanced gradient text */
    .bg-clip-text {
        -webkit-background-clip: text;
        background-clip: text;
    }

    /* Custom scrollbar */
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
        background: linear-gradient(90deg, #7c3aed, #db2777);
    }

    /* Smooth transition for expand/collapse */
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
