<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Daftar Aspirasi
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-4">
                <a href="{{ route('aspirasi.create') }}"
                    class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">+ Buat Aspirasi</a>
            </div>

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <table class="min-w-full text-sm text-gray-700">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left">Judul</th>
                            <th class="px-4 py-2 text-left">Isi</th>
                            <th class="px-4 py-2 text-left">Tanggal</th>
                            <th class="px-4 py-2 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($aspirasi as $aspirasis)
                            <tr class="border-t">
                                <td class="px-4 py-2">{{ $aspirasis->judul }}</td>
                                <td class="px-4 py-2">{{ Str::limit($aspirasis->isi, 100) }}</td>
                                <td class="px-4 py-2">{{ $aspirasis->created_at->format('d M Y') }}</td>
                                <td class="flex px-4 py-2 space-x-2">
                                    <a href="{{ route('aspirasi.edit', $aspirasi) }}"
                                        class="text-yellow-600 hover:underline">Edit</a>
                                    <form action="{{ route('aspirasi.destroy', $aspirasi) }}" method="POST"
                                        onsubmit="return confirm('Yakin hapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
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
