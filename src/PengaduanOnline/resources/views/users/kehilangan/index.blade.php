<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Daftar Kehilangan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <a href="{{ route('kehilangan.create') }}"
                    class="inline-block px-4 py-2 mb-4 text-white bg-blue-600 rounded hover:bg-blue-700">Tambah
                    Kehilangan</a>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Foto</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Barang</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Lokasi</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Tanggal</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Status</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($kehilangan as $item)
                            <tr>
                                <td class="p-2">
                                    @if ($item->foto)
                                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_barang }}"
                                            class="object-cover w-16 h-16 rounded">
                                    @else
                                        <div
                                            class="flex items-center justify-center w-16 h-16 text-xs text-gray-500 bg-gray-200 rounded">
                                            Tidak ada
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $item->nama_barang }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $item->lokasi_hilang }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $item->tanggal_hilang }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ ucfirst(str_replace('_', ' ', $item->status)) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('kehilangan.edit', $item->id) }}"
                                        class="mr-2 text-blue-600 hover:text-blue-900">Edit</a>
                                    <form action="{{ route('kehilangan.destroy', $item->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900"
                                            onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
