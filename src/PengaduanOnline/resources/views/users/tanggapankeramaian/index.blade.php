<x-app-layout>
    <div class="px-4 py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <h2 class="mb-6 text-3xl font-bold text-blue-800">Daftar Tanggapan Keramaian</h2>

        <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @foreach($tanggapans as $tanggapan)
                <div class="flex flex-col justify-between p-6 bg-white border border-gray-200 shadow rounded-2xl">
                    <div class="space-y-2">
                        <h3 class="text-xl font-semibold text-gray-800">{{ $tanggapan->keramaian->nama_acara }}</h3>
                        <p class="text-sm text-gray-500">Pelapor: <span
                                class="font-medium">{{ $tanggapan->keramaian->user->name }}</span></p>
                        <p class="text-sm text-gray-500">Lokasi: {{ $tanggapan->keramaian->lokasi_acara }}</p>
                        <p class="text-sm text-gray-500">Tanggal:
                            {{ \Carbon\Carbon::parse($tanggapan->keramaian->tanggal_acara)->translatedFormat('d F Y') }}</p>
                        <p class="text-sm text-gray-500">Waktu: {{ $tanggapan->keramaian->waktu_acara }}</p>

                        <div class="mt-4">
                            <h4 class="mb-1 text-sm font-semibold text-gray-700">Tanggapan Petugas:</h4>
                            <div class="max-w-full text-sm prose text-gray-600">
                                {!! $tanggapan->tanggapan !!}
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                @if($tanggapan->keramaian->status === 'disetujui')
                                    bg-green-100 text-green-800
                                @elseif($tanggapan->keramaian->status === 'ditolak')
                                    bg-red-100 text-red-800
                                @else
                                    bg-yellow-100 text-yellow-800
                                @endif
                            ">
                            {{ ucfirst($tanggapan->keramaian->status) }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>

        @if($tanggapans->isEmpty())
            <div class="mt-12 text-center text-gray-600">
                <p>Belum ada tanggapan keramaian yang tersedia.</p>
            </div>
        @endif
    </div>
</x-app-layout>
