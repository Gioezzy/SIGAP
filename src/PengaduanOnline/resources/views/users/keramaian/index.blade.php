<x-app-layout>
    <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="p-6 overflow-hidden bg-white shadow-xl sm:rounded-lg">
            <h2 class="mb-6 text-2xl font-bold text-gray-800">Daftar Acara Keramaian</h2>

            <div class="mb-4 text-right">
                <a href="{{ route('keramaian.create') }}"
                    class="inline-block px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded hover:bg-blue-700">
                    + Tambah Acara
                </a>
            </div>

            @if($keramaian->isEmpty())
                <p class="text-gray-500">Belum ada data acara keramaian.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-600 table-auto">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2">Nama Acara</th>
                                <th class="px-4 py-2">Lokasi</th>
                                <th class="px-4 py-2">Tanggal</th>
                                <th class="px-4 py-2">Waktu</th>
                                <th class="px-4 py-2">Status</th>
                                <th class="px-4 py-2 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($keramaian as $event)
                                <tr class="border-b">
                                    <td class="px-4 py-2 font-medium">{{ $event->nama_acara }}</td>
                                    <td class="px-4 py-2">{{ $event->lokasi_acara }}</td>
                                    <td class="px-4 py-2">{{ $event->tanggal_acara }}</td>
                                    <td class="px-4 py-2">{{ $event->waktu_acara }}</td>
                                    <td class="px-4 py-2">
                                        <span class="inline-block px-2 py-1 rounded-full text-xs font-semibold {{
                                            $event->status === 'selesai' ? 'bg-green-100 text-green-800' : (
                                            $event->status === 'sedang_ditinjau' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-600')}}">
                                            {{ ucfirst(str_replace('_', ' ', $event->status)) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 space-x-2 text-right">
                                        <a href="{{ route('keramaian.edit', $event) }}"
                                            class="text-blue-600 hover:underline">Edit</a>
                                        <form action="{{ route('keramaian.destroy', $event) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Hapus acara ini?')"
                                                class="text-red-600 hover:underline">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
