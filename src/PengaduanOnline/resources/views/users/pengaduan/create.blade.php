<x-app-layout>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.8s ease-in-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'slide-right': 'slideRight 0.8s ease-out',
                        'bounce-soft': 'bounceSoft 3s infinite',
                        'float': 'float 4s ease-in-out infinite',
                        'glow': 'glow 2s infinite alternate',
                        'wave': 'wave 6s infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        slideRight: {
                            '0%': { opacity: '0', transform: 'translateX(-30px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' }
                        },
                        bounceSoft: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' }
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' }
                        },
                        glow: {
                            '0%': { boxShadow: '0 0 20px rgba(139, 69, 19, 0.3)' },
                            '100%': { boxShadow: '0 0 40px rgba(139, 69, 19, 0.6)' }
                        },
                        wave: {
                            '0%': { transform: 'rotate(0deg)' },
                            '10%': { transform: 'rotate(14deg)' },
                            '20%': { transform: 'rotate(-8deg)' },
                            '30%': { transform: 'rotate(14deg)' },
                            '40%': { transform: 'rotate(-4deg)' },
                            '50%': { transform: 'rotate(10deg)' },
                            '60%': { transform: 'rotate(0deg)' },
                            '100%': { transform: 'rotate(0deg)' }
                        }
                    }
                }
            }
        }
    </script>

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
                    <span class="animate-wave inline-block">📝</span>
                    <div class="absolute -top-2 -right-2 w-6 h-6 bg-yellow-400 rounded-full animate-pulse opacity-80"></div>
                </div>

                <!-- Main Title -->
                <h2 class="text-4xl font-bold mb-6">
                    Sampaikan Pengaduan Anda
                </h2>

                <!-- Subtitle -->
                <p class="text-xl mb-10 leading-relaxed opacity-90">
                    Kami mendengarkan setiap suara Anda. Pengaduan Anda adalah langkah pertama menuju perubahan positif di lingkungan kita.
                </p>

                <!-- Features List -->
                <div class="space-y-4 text-left max-w-md mx-auto">
                    <div class="bg-white bg-opacity-25 backdrop-blur-sm rounded-xl p-4 border border-white border-opacity-40 hover:bg-opacity-35 transition-all duration-300 animate-slide-right shadow-lg" style="animation-delay: 0.2s;">
                        <div class="flex items-center space-x-3">
                            <span class="text-2xl">⚡</span>
                            <div class="text-white">
                                <div class="font-bold text-white">Proses Cepat & Transparan</div>
                                <div class="text-sm text-blue-100">Respon dalam 24 jam</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white bg-opacity-25 backdrop-blur-sm rounded-xl p-4 border border-white border-opacity-40 hover:bg-opacity-35 transition-all duration-300 animate-slide-right shadow-lg" style="animation-delay: 0.4s;">
                        <div class="flex items-center space-x-3">
                            <span class="text-2xl animate-glow">🔒</span>
                            <div class="text-white">
                                <div class="font-bold text-white">Data Pribadi Terlindungi</div>
                                <div class="text-sm text-blue-100">Keamanan data terjamin</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white bg-opacity-25 backdrop-blur-sm rounded-xl p-4 border border-white border-opacity-40 hover:bg-opacity-35 transition-all duration-300 animate-slide-right shadow-lg" style="animation-delay: 0.6s;">
                        <div class="flex items-center space-x-3">
                            <span class="text-2xl">📱</span>
                            <div class="text-white">
                                <div class="font-bold text-white">Notifikasi Real-time</div>
                                <div class="text-sm text-blue-100">Update status langsung</div>
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
                        <h3 class="text-3xl font-bold text-gray-800 mb-2">Form Pengaduan</h3>
                        <p class="text-gray-600">Isi formulir di bawah dengan lengkap</p>
                    </div>

                    <!-- Form with Laravel Logic -->
                    <form action="{{ route('pengaduan.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Judul -->
                        <div class="animate-fade-in" style="animation-delay: 0.1s">
                            <label for="judul" class="block text-gray-700 font-semibold mb-2">Judul</label>
                            <input 
                                id="judul" 
                                name="judul" 
                                type="text" 
                                required
                                class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-300 hover:-translate-y-1"
                                placeholder="Masukkan judul pengaduan..."
                            >
                        </div>

                        <!-- Isi Pengaduan -->
                        <div class="animate-fade-in" style="animation-delay: 0.2s">
                            <label for="isi_pengaduan" class="block text-gray-700 font-semibold mb-2">Isi Pengaduan</label>
                            <textarea 
                                id="isi_pengaduan" 
                                name="isi_pengaduan" 
                                rows="4" 
                                required
                                class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-300 resize-none hover:-translate-y-1"
                                placeholder="Jelaskan pengaduan Anda secara detail..."
                            ></textarea>
                        </div>

                        <!-- Kategori -->
                        <div class="animate-fade-in" style="animation-delay: 0.3s">
                            <label for="kategori_id" class="block text-gray-700 font-semibold mb-2">Kategori</label>
                            <select 
                                id="kategori_id" 
                                name="kategori_id" 
                                required
                                class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-300 hover:-translate-y-1"
                            >
                                <option value="" disabled selected>Pilih kategori</option>
                                @foreach ($pengaduans as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->namaKategori }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Status & Tanggal Row -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="animate-fade-in" style="animation-delay: 0.4s">
                                <label for="status" class="block text-gray-700 font-semibold mb-2">Status</label>
                                <input 
                                    id="status" 
                                    name="status" 
                                    type="text" 
                                    value="menunggu" 
                                    readonly
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gradient-to-r from-yellow-50 to-orange-50 cursor-not-allowed font-semibold text-orange-700"
                                >
                            </div>
                            
                            <div class="animate-fade-in" style="animation-delay: 0.5s">
                                <label for="tanggal_pengaduan" class="block text-gray-700 font-semibold mb-2">Tanggal</label>
                                <input 
                                    id="tanggal_pengaduan" 
                                    name="tanggal_pengaduan" 
                                    type="date" 
                                    readonly
                                    value="{{ now()->format('Y-m-d') }}"
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg bg-gradient-to-r from-blue-50 to-indigo-50 cursor-not-allowed font-semibold text-blue-700"
                                >
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
                                href="{{ route('pengaduan.index') }}" 
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
                                <strong>Tips:</strong> Untuk pengaduan yang lebih efektif, sertakan informasi lokasi, waktu kejadian, dan bukti pendukung yang relevan.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>