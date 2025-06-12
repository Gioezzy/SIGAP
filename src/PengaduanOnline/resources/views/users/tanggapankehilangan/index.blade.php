<x-app-layout>
    <div class="max-w-6xl py-10 mx-auto">
        <div class="p-6 bg-white rounded-lg shadow-md">
            <h2 class="mb-6 text-2xl font-semibold text-gray-800">Tanggapan dari Operator</h2>

            @if ($tanggapans->isEmpty())
                <div class="flex flex-col items-center justify-center py-12 text-center text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mb-3 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 17v-6h6v6m2 4H7a2 2 0 01-2-2V5a2 2 0 012-2h5l2 2h5a2 2 0 012 2v12a2 2 0 01-2 2z" />
                    </svg>
                    <p class="text-lg font-medium">Belum ada tanggapan dari operator.</p>
                    <p class="text-sm text-gray-400">Laporan kehilangan Anda akan muncul di sini jika sudah ditanggapi oleh operator.</p>
                </div>
            @else
                <div class="space-y-8">
                    @foreach ($tanggapans as $tanggapan)
                        <div class="grid grid-cols-1 gap-6 p-5 transition border rounded-lg shadow-sm md:grid-cols-4 hover:shadow-md">
                            <!-- FOTO -->
                            <div class="md:col-span-1">
                                @if ($tanggapan->kehilangan->foto)
                                    <img src="{{ asset('storage/' . $tanggapan->kehilangan->foto) }}"
                                        alt="{{ $tanggapan->kehilangan->nama_barang }}"
                                        class="object-cover w-full h-full border rounded-lg">
                                @else
                                    <div class="flex items-center justify-center w-full h-full text-gray-400 bg-gray-100 border border-dashed rounded-lg min-h-[200px]">
                                        <span class="text-sm italic">Tidak ada foto</span>
                                    </div>
                                @endif
                            </div>

                            <!-- INFORMASI + TANGGAPAN -->
                            <div class="flex flex-col justify-between space-y-4 md:col-span-3">
                                <div class="space-y-2">
                                    <h3 class="text-xl font-semibold text-gray-800">
                                        {{ $tanggapan->kehilangan->nama_barang }}
                                    </h3>
                                    <p class="text-sm text-gray-600">Lokasi Hilang: {{ $tanggapan->kehilangan->lokasi_hilang }}</p>
                                    <p class="text-sm text-gray-600">Tanggal Hilang: {{ \Carbon\Carbon::parse($tanggapan->kehilangan->tanggal_hilang)->format('d M Y') }}</p>
                                    <p class="text-sm">
                                        Status:
                                        <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full
                                            {{ $tanggapan->kehilangan->status == 'ditemukan'
                                                ? 'bg-green-100 text-green-800'
                                                : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ ucfirst(str_replace('_', ' ', $tanggapan->kehilangan->status)) }}
                                        </span>
                                    </p>
                                    <p class="text-sm text-gray-700">
                                        <span class="font-semibold">Deskripsi:</span> {{ $tanggapan->kehilangan->deskripsi }}
                                    </p>
                                </div>

                                <!-- TANGGAPAN -->
                                <div class="p-4 text-blue-900 border border-blue-200 rounded-lg bg-blue-50">
                                    <p>Tanggapan Petugas: {{ $tanggapan->tanggapan }}</p>
                                    <p class="mt-2 text-sm text-gray-500">
                                        Ditanggapi pada {{ $tanggapan->created_at->format('d M Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- PAGINATION -->
                    <div class="mt-6">
                        {{ $tanggapans->withQueryString()->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
