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
                                <!-- Lost Items Icon -->
                                <svg class="w-12 h-12 text-white drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6h6v6m2 4H7a2 2 0 01-2-2V5a2 2 0 012-2h5l2 2h5a2 2 0 012 2v12a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <h1 class="text-5xl font-bold text-white mb-2 animate-fade-in-up drop-shadow-2xl">
                                Tanggapan dari Operator
                            </h1>
                            <p class="text-indigo-100 text-xl font-medium animate-fade-in-up animation-delay-200 drop-shadow-lg">
                                Monitor dan cek respon petugas atas laporan kehilangan Anda
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6h6v6m2 4H7a2 2 0 01-2-2V5a2 2 0 012-2h5l2 2h5a2 2 0 012 2v12a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h2 class="text-4xl font-bold bg-gradient-to-r from-gray-900 to-indigo-600 dark:from-white dark:to-indigo-300 bg-clip-text text-transparent">
                        Tanggapan Laporan Kehilangan
                    </h2>
                </div>
                <div class="mx-auto w-40 h-1.5 bg-gradient-to-r from-indigo-400 via-purple-500 to-blue-500 rounded-full shadow-lg"></div>
                <p class="mt-4 text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Pantau perkembangan dan tanggapan terkini dari petugas untuk setiap laporan kehilangan yang telah Anda ajukan
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
                                    <span>Daftar Tanggapan Kehilangan</span>
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

                    @if ($tanggapans->isEmpty())
                        <div class="px-8 py-24 text-center animate-fade-in">
                            <div class="flex flex-col items-center space-y-6">
                                <div class="p-8 bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-800 rounded-full shadow-inner">
                                    <svg class="w-20 h-20 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6h6v6m2 4H7a2 2 0 01-2-2V5a2 2 0 012-2h5l2 2h5a2 2 0 012 2v12a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <div class="text-center space-y-2">
                                    <h3 class="text-3xl font-bold text-gray-600 dark:text-gray-300">Belum Ada Tanggapan</h3>
                                    <p class="text-gray-500 dark:text-gray-400 max-w-md mx-auto text-lg">
                                        Laporan kehilangan Anda akan muncul di sini jika sudah ditanggapi oleh operator.
                                    </p>
                                    <p class="text-sm text-gray-400 dark:text-gray-500">
                                        Kami akan memproses laporan Anda dengan segera.
                                    </p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="relative overflow-x-auto custom-scrollbar">
                            <table class="min-w-full">
                                <thead class="bg-gradient-to-r from-gray-50/90 to-blue-50/90 dark:from-gray-700/90 dark:to-gray-600/90 backdrop-blur-sm">
                                    <tr>
                                        <th class="px-8 py-6 text-left text-xs font-bold text-gray-700 uppercase dark:text-gray-200 tracking-wider">
                                            <div class="flex items-center space-x-2">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                                <span>Foto</span>
                                            </div>
                                        </th>
                                        <th class="px-8 py-6 text-left text-xs font-bold text-gray-700 uppercase dark:text-gray-200 tracking-wider">
                                            <div class="flex items-center space-x-2">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                                </svg>
                                                <span>Barang</span>
                                            </div>
                                        </th>
                                        <th class="px-8 py-6 text-left text-xs font-bold text-gray-700 uppercase dark:text-gray-200 tracking-wider">
                                            <div class="flex items-center space-x-2">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                <span>Detail</span>
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
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <span>Status</span>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white/60 dark:bg-gray-800/60 divide-y divide-gray-200/50 dark:divide-gray-700/50">
                                    @foreach ($tanggapans as $index => $tanggapan)
                                        <tr class="group hover:bg-gradient-to-r hover:from-indigo-50/80 hover:via-purple-50/80 hover:to-pink-50/80 dark:hover:from-indigo-900/30 dark:hover:via-purple-900/30 dark:hover:to-pink-900/30 transition-all duration-700 transform hover:scale-[1.01] hover:shadow-lg animate-table-row"
                                            style="animation-delay: {{ $index * 100 }}ms">
                                            <!-- FOTO -->
                                            <td class="px-8 py-6">
                                                @if ($tanggapan->kehilangan->foto)
                                                    <div class="relative group-hover:scale-105 transition-transform duration-300">
                                                        <img src="{{ asset('storage/' . $tanggapan->kehilangan->foto) }}"
                                                            alt="{{ $tanggapan->kehilangan->nama_barang }}"
                                                            class="w-16 h-16 object-cover rounded-xl border-2 border-gray-200 dark:border-gray-600 shadow-md group-hover:shadow-lg transition-shadow duration-300">
                                                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                                    </div>
                                                @else
                                                    <div class="w-16 h-16 flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-800 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl group-hover:scale-105 transition-transform duration-300">
                                                        <svg class="w-6 h-6 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                        </svg>
                                                    </div>
                                                @endif
                                            </td>
                                            <!-- BARANG -->
                                            <td class="px-8 py-6">
                                                <div class="flex items-center space-x-3">
                                                    <div class="w-2 h-2 bg-indigo-500 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                                    <div>
                                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors duration-300">
                                                            {{ $tanggapan->kehilangan->nama_barang }}
                                                        </h3>
                                                        <p class="text-sm text-gray-600 dark:text-gray-400 line-clamp-2">
                                                            {{ $tanggapan->kehilangan->deskripsi }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <!-- DETAIL -->
                                            <td class="px-8 py-6">
                                                <div class="space-y-2 text-sm">
                                                    <div class="flex items-center space-x-2 text-gray-600 dark:text-gray-300">
                                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        </svg>
                                                        <span class="line-clamp-1">{{ $tanggapan->kehilangan->lokasi_hilang }}</span>
                                                    </div>
                                                    <div class="flex items-center space-x-2 text-gray-600 dark:text-gray-300">
                                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-4 8a5 5 0 01-5-5v-4a5 5 0 0110 0v4a5 5 0 01-5 5zm0 0v4"></path>
                                                        </svg>
                                                        <span>{{ \Carbon\Carbon::parse($tanggapan->kehilangan->tanggal_hilang)->format('d M Y') }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <!-- TANGGAPAN -->
                                            <td class="px-8 py-6 text-gray-700 dark:text-gray-300">
                                                <div class="max-w-md">
                                                    <span class="text-gray-800 dark:text-gray-200 text-sm leading-relaxed">
                                                        {{ strip_tags($tanggapan->tanggapan) }}
                                                    </span>
                                                </div>
                                            </td>                                        
                                                <!-- STATUS -->
                                            <td class="px-8 py-6">
                                                @php
                                                    $status = strtolower($tanggapan->kehilangan->status ?? 'hilang');
                                                    $statusConfig = [
                                                        'ditemukan' => [
                                                            'class' => 'bg-gradient-to-r from-green-100 to-emerald-100 text-emerald-800 dark:from-green-900/60 dark:to-emerald-900/60 dark:text-emerald-200 border-green-200/50 dark:border-green-800/50',
                                                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>'
                                                        ],
                                                        'hilang' => [
                                                            'class' => 'bg-gradient-to-r from-red-100 to-pink-100 text-red-800 dark:from-red-900/60 dark:to-pink-900/60 dark:text-red-200 border-red-200/50 dark:border-red-800/50',
                                                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>'
                                                        ],
                                                        'dicari' => [
                                                            'class' => 'bg-gradient-to-r from-yellow-100 to-orange-100 text-yellow-800 dark:from-yellow-900/60 dark:to-orange-900/60 dark:text-yellow-200 border-yellow-200/50 dark:border-yellow-800/50',
                                                            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>'
                                                        ]
                                                    ];
                                                    $config = $statusConfig[$status] ?? $statusConfig['hilang'];
                                                @endphp

                                                <span class="inline-flex items-center px-4 py-2 rounded-xl text-sm font-bold border shadow-sm hover:shadow-md transition-all duration-300 {{ $config['class'] }}">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        {!! $config['icon'] !!}
                                                    </svg>
                                                    {{ ucfirst(str_replace('_', ' ', $status)) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- PAGINATION -->
                        @if($tanggapans->hasPages())
                            <div class="relative bg-gradient-to-r from-gray-50/90 via-blue-50/90 to-indigo-50/90 dark:from-gray-700/90 dark:via-gray-600/90 dark:to-gray-700/90 backdrop-blur-sm border-t border-gray-200/50 dark:border-gray-700/50">
                                <div class="px-8 py-6">
                                    <div class="flex items-center justify-center">
                                        {{ $tanggapans->withQueryString()->links() }}
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>


</x-app-layout>