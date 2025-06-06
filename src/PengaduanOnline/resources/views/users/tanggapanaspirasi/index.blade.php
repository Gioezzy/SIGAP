<x-app-layout>
    <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="p-6 overflow-hidden bg-white shadow-xl sm:rounded-lg">
            <h2 class="mb-6 text-2xl font-semibold text-gray-800">
                Tanggapan Aspirasi Anda
            </h2>

            @if ($tanggapans->isEmpty())
                <div class="text-center text-gray-500">
                    Belum ada tanggapan untuk aspirasi Anda.
                </div>
            @else
                <div class="space-y-6">
                    @foreach ($tanggapans as $tanggapan)
                        <div class="p-5 transition border border-gray-200 rounded-lg hover:shadow-md">
                            <h3 class="text-xl font-bold text-blue-600">
                                {{ $tanggapan->aspirasi->judul }}
                            </h3>
                            <p class="mt-2 text-gray-700">
                                {{ $tanggapan->aspirasi->isi }}
                            </p>

                            <div class="pt-4 mt-4 border-t">
                                <h4 class="mb-1 font-medium text-gray-900">Tanggapan:</h4>
                                <p class="text-gray-800">{{ $tanggapan->tanggapan }}</p>
                            </div>

                            <div class="mt-4 text-sm text-gray-500">
                                Ditanggapi pada: {{ $tanggapan->created_at->format('d M Y') }}
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
