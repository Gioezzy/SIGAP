<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold leading-tight text-gray-800">
            Tanggapan untuk Kritik & Saran Anda
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if($tanggapans->isEmpty())
                <div class="mt-10 text-center text-gray-500">
                    <svg class="w-16 h-16 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M9 17v-6h13M9 7H3v10h6m4 0h6v-4m0-6H9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <p class="text-lg">Belum ada tanggapan.</p>
                    <p class="text-sm text-gray-400">Tanggapan akan muncul setelah kritik/saran Anda ditinjau oleh admin.</p>
                </div>
            @else
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach($tanggapans as $tanggapan)
                        <div class="p-6 transition bg-white shadow-md rounded-2xl hover:shadow-lg">
                            <div class="mb-3">
                                <h3 class="text-lg font-semibold text-gray-800 truncate">
                                    {{ $tanggapan->kritikSaran->judul }}
                                </h3>
                                <p class="mb-2 text-sm text-gray-500">
                                    Dikirim: {{ $tanggapan->kritikSaran->created_at->format('d M Y') }}
                                </p>
                                <p class="text-sm text-gray-700">
                                    <strong>Kritik/Saran:</strong><br>
                                    {{ Str::limit($tanggapan->kritikSaran->isi, 120) }}
                                </p>
                            </div>
                            <hr class="my-3">
                            <div class="text-sm text-gray-800">
                                <strong>Tanggapan:</strong><br>
                                {{ Str::limit($tanggapan->tanggapan, 150) }}
                            </div>
                            <div class="mt-3 text-xs text-gray-400">
                                @if($tanggapan->user)
                                    Ditanggapi oleh {{ $tanggapan->user->name }} •
                                @endif
                                {{ $tanggapan->created_at->diffForHumans() }}
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
