<x-app-layout>
    <div class="py-12">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Daftar Kritik Saran Saya</h2>
                    <a href="{{ route('kritiksaran.create') }}"
                        class="inline-block px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">
                        + Tambah Kritik Saran
                    </a>
                </div>

                @if (session('success'))
                    <div class="p-4 mb-4 text-green-700 bg-green-100 border border-green-300 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @forelse ($kritikSaran as $kritik)
                    <div class="p-6 mb-4 rounded-lg shadow-md bg-gray-50 dark:bg-gray-700">
                        <div class="flex items-start justify-between">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800 dark:text-white">{{ $kritik->judul }}</h3>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                                    {{ Str::limit($kritik->isi, 100) }}
                                </p>
                            </div>
                            <div class="flex gap-2">
                                <a href="{{ route('kritiksaran.edit', $kritik->id) }}"
                                    class="px-3 py-1 text-sm text-white bg-yellow-500 rounded hover:bg-yellow-600">
                                    Edit
                                </a>
                                <form action="{{ route('kritiksaran.destroy', $kritik->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this feedback?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 text-sm text-white bg-red-600 rounded hover:bg-red-700">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-gray-600 dark:text-gray-300">Tidak Ada Kritik Saran</div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
