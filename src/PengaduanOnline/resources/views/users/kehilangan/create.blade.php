
<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 flex">
        <!-- Left Side - Info Section -->
        <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-r from-sky-400 via-blue-500 to-blue-600 text-white items-center justify-center p-12 relative overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10 bg-[url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>')]"></div>
            
            <!-- Floating Shapes -->
            <div class="absolute inset-0 pointer-events-none">
                <div class="absolute w-20 h-20 bg-white bg-opacity-10 rounded-full top-1/4 left-1/4 animate-float"></div>
                <div class="absolute w-32 h-32 bg-white bg-opacity-10 rounded-full top-3/5 right-1/4 animate-float" style="animation-delay: 2s;"></div>
                <div class="absolute w-16 h-16 bg-white bg-opacity-10 rounded-full bottom-1/4 left-1/3 animate-float" style="animation-delay: 4s;"></div>
            </div>

            <div class="relative z-10 text-center animate-fade-in max-w-lg">
                <!-- Icon with Animation -->
                <div class="text-8xl mb-8 animate-bounce-soft relative">
                    <span class="animate-wave inline-block">🔍</span>
                    <div class="absolute -top-2 -right-2 w-6 h-6 bg-yellow-400 rounded-full animate-pulse opacity-80"></div>
                </div>

                <!-- Main Title -->
                <h2 class="text-4xl font-bold mb-6">
                    Laporkan Barang Hilang
                </h2>

                <!-- Subtitle -->
                <p class="text-xl mb-10 leading-relaxed opacity-90">
                    Mari bersama-sama membantu menemukan barang yang hilang. Setiap laporan adalah langkah menuju solusi.
                </p>

                <!-- Features List -->
                <div class="space-y-4 text-left max-w-md mx-auto">
                    <div class="bg-white bg-opacity-25 backdrop-blur-sm rounded-xl p-4 border border-white border-opacity-40 hover:bg-opacity-35 transition-all duration-300 animate-slide-right shadow-lg" style="animation-delay: 0.2s;">
                        <div class="flex items-center space-x-3">
                            <span class="text-2xl">⚡</span>
                            <div class="text-white">
                                <div class="font-bold text-white">Pencarian Cepat</div>
                                <div class="text-sm text-blue-100">Sistem deteksi otomatis</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white bg-opacity-25 backdrop-blur-sm rounded-xl p-4 border border-white border-opacity-40 hover:bg-opacity-35 transition-all duration-300 animate-slide-right shadow-lg" style="animation-delay: 0.4s;">
                        <div class="flex items-center space-x-3">
                            <span class="text-2xl animate-glow">🔒</span>
                            <div class="text-white">
                                <div class="font-bold text-white">Data Aman</div>
                                <div class="text-sm text-blue-100">Privasi terjaga</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white bg-opacity-25 backdrop-blur-sm rounded-xl p-4 border border-white border-opacity-40 hover:bg-opacity-35 transition-all duration-300 animate-slide-right shadow-lg" style="animation-delay: 0.6s;">
                        <div class="flex items-center space-x-3">
                            <span class="text-2xl">📱</span>
                            <div class="text-white">
                                <div class="font-bold text-white">Update Real-time</div>
                                <div class="text-sm text-blue-100">Notifikasi langsung</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Form Section -->
        <div class="w-full lg:w-1/2 p-8 lg:p-12 flex items-center justify-center relative">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-5 bg-[url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="2" fill="rgb(102, 126, 234)"/></svg>')] bg-repeat" style="background-size: 20px 20px;"></div>

            <div class="w-full max-w-lg relative z-10">
                <div class="bg-white rounded-3xl shadow-2xl p-8 lg:p-10 animate-slide-up">
                    <!-- Form Header -->
                    <div class="text-center mb-8">
                        <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-blue-500 rounded-2xl mx-auto mb-4 flex items-center justify-center text-white text-2xl animate-pulse">
                            📋
                        </div>
                        <h3 class="text-3xl font-bold text-gray-800 mb-2">Form Kehilangan</h3>
                        <p class="text-gray-600">Isi formulir di bawah dengan lengkap</p>
                    </div>

                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl animate-fade-in">
                            <div class="flex items-start space-x-3">
                                <div class="text-red-500 text-xl">⚠️</div>
                                <div class="text-sm text-red-700">
                                    <ul class="list-disc list-inside space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Form with Laravel Logic -->
                    <form action="{{ route('kehilangan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <!-- Nama Barang -->
                        <div class="animate-fade-in" style="animation-delay: 0.1s">
                            <label for="nama_barang" class="block text-gray-700 font-semibold mb-2">Nama Barang</label>
                            <input 
                                id="nama_barang" 
                                name="nama_barang" 
                                type="text" 
                                required
                                class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-300 hover:-translate-y-1"
                                placeholder="Masukkan nama barang yang hilang..."
                            >
                        </div>

                        <!-- Lokasi Hilang -->
                        <div class="animate-fade-in" style="animation-delay: 0.2s">
                            <label for="lokasi_hilang" class="block text-gray-700 font-semibold mb-2">Lokasi Hilang</label>
                            <input 
                                id="lokasi_hilang" 
                                name="lokasi_hilang" 
                                type="text" 
                                required
                                class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-300 hover:-translate-y-1"
                                placeholder="Dimana barang terakhir kali terlihat..."
                            >
                        </div>

                        <!-- Tanggal Hilang -->
                        <div class="animate-fade-in" style="animation-delay: 0.3s">
                            <label for="tanggal_hilang" class="block text-gray-700 font-semibold mb-2">Tanggal Hilang</label>
                            <input 
                                id="tanggal_hilang" 
                                name="tanggal_hilang" 
                                type="date" 
                                required
                                class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-300 hover:-translate-y-1"
                            >
                        </div>

                        <!-- Deskripsi -->
                        <div class="animate-fade-in" style="animation-delay: 0.4s">
                            <label for="deskripsi" class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
                            <textarea 
                                id="deskripsi" 
                                name="deskripsi" 
                                rows="4" 
                                required
                                class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-300 resize-none hover:-translate-y-1"
                                placeholder="Jelaskan ciri-ciri barang, warna, merek, dan detail lainnya..."
                            ></textarea>
                        </div>

                        <!-- Foto -->
                        <div class="animate-fade-in" style="animation-delay: 0.5s">
                            <label for="foto" class="block text-gray-700 font-semibold mb-2">Foto (Opsional)</label>
                            <div class="relative">
                                <input 
                                    id="foto" 
                                    name="foto" 
                                    type="file"
                                    accept="image/*"
                                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-300 hover:-translate-y-1 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100"
                                >
                                <div class="mt-2 text-sm text-gray-500">
                                    📸 Upload foto barang untuk membantu identifikasi
                                </div>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-4 animate-fade-in" style="animation-delay: 0.6s">
                            <button 
                                type="submit"
                                class="w-full sm:w-auto px-8 py-3 bg-gradient-to-r from-purple-600 to-blue-600 text-white rounded-lg hover:from-purple-700 hover:to-blue-700 transform hover:scale-105 hover:-translate-y-1 transition duration-300 font-bold shadow-lg relative overflow-hidden"
                            >
                                <span class="relative z-10">✨ Simpan</span>
                            </button>
                            
                            <a 
                                href="{{ route('kehilangan.index') }}" 
                                class="text-gray-600 hover:text-gray-800 font-semibold transition duration-300 hover:underline"
                            >
                                ← Kembali
                            </a>
                        </div>
                    </form>

                    <!-- Help Text -->
                    <div class="mt-6 p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-200 animate-fade-in" style="animation-delay: 0.7s">
                        <div class="flex items-start space-x-3">
                            <div class="text-blue-500 text-xl">💡</div>
                            <div class="text-sm text-blue-700">
                                <strong>Tips:</strong> Semakin detail informasi yang Anda berikan, semakin besar peluang barang Anda ditemukan. Jangan lupa sertakan foto jika memungkinkan.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>