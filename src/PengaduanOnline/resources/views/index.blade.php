<x-app-layout>
    @guest
        <div class="relative min-h-screen bg-cover bg-center overflow-hidden" id="heroSection">
            <!-- Background Image Container -->
            <div class="absolute inset-0 bg-cover bg-center transition-all duration-1000 ease-in-out"
                style="background-image: url('{{ asset('images/unand2.jpeg') }}');" id="bgImage"></div>

            <!-- Overlay gelap agar teks tetap terbaca -->
            <div class="absolute inset-0 bg-black/60"></div>

            <!-- Floating Elements -->
            <div class="absolute top-20 left-10 w-4 h-4 bg-white/20 rounded-full animate-float"></div>
            <div class="absolute top-40 right-20 w-6 h-6 bg-white/15 rounded-full animate-float-delayed"></div>
            <div class="absolute bottom-40 left-20 w-5 h-5 bg-white/20 rounded-full animate-pulse-slow"></div>
            <div class="absolute bottom-20 right-10 w-3 h-3 bg-white/25 rounded-full animate-bounce-slow"></div>

            <!-- Hero Content -->
            <div class="relative z-10 flex items-center justify-center min-h-screen px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-4xl mx-auto">
                    <!-- Main Title -->
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-6 animate-fade-in-up">
                        <span class="block hover:animate-glow transition-all duration-300">
                            Layanan Pengaduan Online
                        </span>
                    </h1>

                    <p
                        class="text-lg sm:text-xl text-white mb-8 max-w-4xl mx-auto leading-relaxed animate-fade-in-up delay-300">
                        Merupakan platform yang masyarakat untuk melapor jika ada pelanggaran atau kejadian yang
                        mencurigakan. Layanan ini dibuat agar pelaporan bisa dilakukan dengan cepat, aman, tanpa harus
                        datang langsung. Tujuannya adalah untuk membantu menjaga keamanan lingkungan kampus, khususnya di
                        daerah UNAND dan PNP.
                    </p>
                </div>
            </div>
        </div>

        <!-- JavaScript untuk slideshow -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const bgImage = document.getElementById('bgImage');
                const images = [
                    "{{ asset('images/heroimage.jpg') }}",
                    "{{ asset('images/unand2.jpeg') }}",
                    "{{ asset('images/unand.jpg') }}"
                ];

                let currentIndex = 0;

                function changeBackground() {
                    currentIndex = (currentIndex + 1) % images.length;
                    bgImage.style.backgroundImage = `url('${images[currentIndex]}')`;
                }

                // Ganti gambar setiap 4 detik
                setInterval(changeBackground, 6000);
            });
        </script>
    @endguest

    @auth
        <section
            class="relative min-h-screen flex flex-col items-center justify-center text-white overflow-hidden gradient-animation">

            <!-- Animated floating particles -->
            <div class="absolute inset-0 z-0">
                <div class="floating-particle w-2 h-2 bg-white bg-opacity-20 rounded-full absolute top-1/4 left-1/4"></div>
                <div class="floating-particle w-3 h-3 bg-white bg-opacity-15 rounded-full absolute top-1/3 right-1/4"></div>
                <div class="floating-particle w-1 h-1 bg-white bg-opacity-25 rounded-full absolute bottom-1/4 left-1/3">
                </div>
                <div class="floating-particle w-2 h-2 bg-white bg-opacity-10 rounded-full absolute top-1/2 right-1/3"></div>
                <div class="floating-particle w-1 h-1 bg-white bg-opacity-20 rounded-full absolute bottom-1/3 right-1/2">
                </div>
                <div class="floating-particle w-2 h-2 bg-white bg-opacity-15 rounded-full absolute top-3/4 left-1/2"></div>
            </div>

            <!-- Geometric shapes -->
            <div class="absolute inset-0 z-0">
                <div
                    class="geometric-shape absolute top-20 left-10 w-20 h-20 border border-white border-opacity-10 rotate-45 animate-pulse">
                </div>
                <div
                    class="geometric-shape absolute bottom-20 right-20 w-16 h-16 bg-white bg-opacity-5 rounded-full animate-bounce">
                </div>
                <div
                    class="geometric-shape absolute top-1/2 left-5 w-12 h-12 border-2 border-white border-opacity-15 transform rotate-12">
                </div>
            </div>

            <!-- Watermark with enhanced animation -->
            <img src="{{ asset('images/binmas.png') }}" alt="Logo BINMAS"
                class="absolute inset-0 m-auto w-96 opacity-50 z-0 animate-pulse watermark-glow" />

            <!-- Teks with enhanced animations -->
            <div class="relative z-10 text-center px-4">
                <h1 class="text-4xl md:text-6xl font-extrabold mb-4 animate-fade-in-up">
                    LAYANAN PENGADUAN
                </h1>
                <h1 class="text-4xl md:text-6xl font-extrabold mb-6 animate-fade-in-up animation-delay-300">
                    ONLINE
                </h1>
                <p
                    class="text-lg font-medium w-full max-w-5xl px-4 md:px-12 mx-auto text-center animate-fade-in-up animation-delay-600">
                    Mari Bersama Ciptakan Lingkungan Aman dan Nyaman, Mulai dari Satu Pengaduan —
                    Kami Siap Menanggapi dan Bertindak.
                </p>
            </div>

            <!-- Decorative wave at bottom -->
            <div class="absolute bottom-0 left-0 w-full overflow-hidden z-0">
                <svg class="relative block w-full h-24 animate-wave" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path
                        d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                        fill="rgba(255,255,255,0.1)"></path>
                </svg>
            </div>
        </section>
    @endauth

    @auth
        <section class="relative py-20 px-4 text-white text-center overflow-hidden">
            <!-- Animated Background -->
            <div class="absolute inset-0 bg-gradient-to-br from-blue-900 via-blue-800 to-purple-700">
                <!-- Floating Circles Animation -->
                <div class="absolute top-10 left-10 w-32 h-32 bg-white/10 rounded-full animate-pulse"></div>
                <div class="absolute top-32 right-20 w-24 h-24 bg-blue-300/20 rounded-full animate-bounce"
                    style="animation-delay: 0.5s;"></div>
                <div class="absolute bottom-20 left-1/4 w-40 h-40 bg-purple-300/15 rounded-full animate-pulse"
                    style="animation-delay: 1s;"></div>
                <div class="absolute bottom-32 right-10 w-20 h-20 bg-white/20 rounded-full animate-bounce"
                    style="animation-delay: 1.5s;"></div>

                <!-- Geometric Shapes -->
                <div class="absolute top-1/4 left-1/3 w-16 h-16 border-2 border-white/30 rotate-45 animate-spin"
                    style="animation-duration: 8s;"></div>
                <div class="absolute bottom-1/3 right-1/4 w-12 h-12 border-2 border-blue-300/40 rotate-12 animate-spin"
                    style="animation-duration: 6s; animation-direction: reverse;"></div>

                <!-- Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-black/10"></div>
            </div>

            <!-- Content -->
            <div class="relative z-10 max-w-4xl mx-auto">
                <!-- Judul -->
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-extrabold mb-6 animate-fade-in-down">
                    Sampaikan Laporan Anda dan Permintaan Anda!
                </h2>

                <!-- Deskripsi -->
                <p class="text-base md:text-lg font-medium mb-8 leading-relaxed animate-fade-in-up"
                    style="animation-delay: 0.3s;">
                    Gunakan layanan pengaduan ini untuk berbagai keperluan resmi anda. Kami berkomitmen untuk
                    menindaklanjuti setiap pengaduan dengan cepat, transparan, dan bertanggung jawab
                </p>

                <!-- Tombol Aksi -->
                <div class="flex justify-center gap-4 flex-wrap animate-fade-in-up" style="animation-delay: 0.6s;">
                    <a href="{{ route('pengaduan.create') }}"
                        class="group relative bg-white text-blue-800 font-bold px-8 py-3 rounded-xl shadow-lg hover:scale-105 hover:shadow-2xl hover:shadow-blue-500/30 transition-all duration-300 transform hover:-translate-y-1">
                        <span class="relative z-10">Buat Pengaduan</span>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </a>

                    <a href="{{ route('tanggapan.index') }}"
                        class="group relative bg-white text-blue-800 font-bold px-8 py-3 rounded-xl shadow-lg hover:scale-105 hover:shadow-2xl hover:shadow-purple-500/30 transition-all duration-300 transform hover:-translate-y-1">
                        <span class="relative z-10">Lihat Status</span>
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-purple-50 to-purple-100 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </a>
                </div>
            </div>
        </section>
    @endauth


    @guest
        <!-- CTA Section -->
        <div class="relative py-32 overflow-hidden animate-gradient-x"
            style="background: linear-gradient(135deg, #043873 0%, #413FB5 50%, #043873 100%); background-size: 200% 200%;">
            <!-- Background Pattern -->
            <div class="absolute inset-0 bg-black/10"></div>

            <!-- Animated Background Shapes -->
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-white/5 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-white/5 rounded-full blur-3xl animate-float-delayed"></div>
            <div class="absolute top-1/2 left-0 w-64 h-64 bg-blue-400/10 rounded-full blur-2xl animate-pulse-slow"></div>
            <div class="absolute top-1/4 right-0 w-48 h-48 bg-purple-400/10 rounded-full blur-2xl animate-bounce-slow">
            </div>


            <!-- Floating Particles -->
            <div class="absolute top-20 left-20 w-2 h-2 bg-white/20 rounded-full animate-ping"></div>
            <div class="absolute top-40 right-32 w-1 h-1 bg-white/30 rounded-full animate-pulse"></div>
            <div class="absolute bottom-32 left-1/3 w-1.5 h-1.5 bg-white/25 rounded-full animate-ping delay-1000"></div>
            <div class="absolute bottom-20 right-20 w-1 h-1 bg-white/20 rounded-full animate-pulse delay-500"></div>

            <div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <div class="max-w-4xl mx-auto">
                    <!-- Main Heading -->
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-8 animate-fade-in-up">
                        Ada Masalah? Laporkan Sekarang!
                    </h1>

                    <!-- Description Text -->
                    <p
                        class="text-lg sm:text-xl text-white/90 mb-12 leading-relaxed max-w-3xl mx-auto animate-fade-in-up delay-300">
                        Kami percaya setiap aduan adalah langkah menuju perubahan. Laporkan kejadian yang Anda alami—kami
                        siap mendengarkan dan bertindak.
                    </p>

                    <!-- CTA Button -->
                    <div class="animate-fade-in-up delay-500">
                        <a href="{{ route('pengaduan.index') }}"
                            class="inline-flex items-center px-12 py-4 text-white font-semibold text-lg rounded-xl shadow-lg transform hover:scale-105 transition-all duration-300 group hover:shadow-white/20 animate-glow"
                            style="background-color: #413FB5;">
                            <span>Layanan Pengaduan</span>
                            <svg class="w-5 h-5 ml-3 transform group-hover:translate-x-1 transition-transform duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endguest

    <!-- CSS untuk ditambahkan ke tag style Anda -->
    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes pulse-glow {

            0%,
            100% {
                box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
            }

            50% {
                box-shadow: 0 0 40px rgba(59, 130, 246, 0.6);
            }
        }

        @keyframes gradient-shift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-float-delayed {
            animation: float 6s ease-in-out infinite;
            animation-delay: 1.5s;
        }

        .animate-pulse-glow {
            animation: pulse-glow 3s ease-in-out infinite;
        }

        .bg-gradient-animated {
            background: linear-gradient(-45deg, #3b82f6, #8b5cf6, #06b6d4, #10b981);
            background-size: 400% 400%;
            animation: gradient-shift 8s ease infinite;
        }

        .service-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .service-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .icon-container {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .icon-container img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
    </style>

    <!-- Section HTML -->
    <section class="relative py-20 overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0 bg-gradient-animated opacity-5"></div>

        <!-- Floating Elements -->
        <div class="absolute top-10 left-10 w-20 h-20 bg-blue-200 rounded-full opacity-20 animate-float"></div>
        <div class="absolute top-32 right-20 w-16 h-16 bg-purple-200 rounded-full opacity-20 animate-float-delayed">
        </div>
        <div class="absolute bottom-20 left-20 w-24 h-24 bg-cyan-200 rounded-full opacity-20 animate-float"></div>
        <div class="absolute bottom-40 right-10 w-12 h-12 bg-green-200 rounded-full opacity-20 animate-float-delayed">
        </div>

        @auth
            <div class="container mx-auto px-6 relative z-10">
                <!-- Title -->
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
                        LAYANAN KAMI
                    </h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full"></div>
                </div>

                <!-- Services Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                    <!-- Pengaduan -->
                    <div class="service-card bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl border border-gray-100">
                        <div class="text-center">
                            <div class="icon-container mx-auto mb-6 bg-blue-100 rounded-2xl animate-pulse-glow">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    class="w-8 h-8 text-blue-600">
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"
                                        fill="currentColor" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Pengaduan</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Sampaikan Pengaduan anda dengan memilih kategori pengaduan yang anda alami
                            </p>
                        </div>
                    </div>

                    <!-- Surat Kehilangan -->
                    <div class="service-card bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl border border-gray-100">
                        <div class="text-center">
                            <div class="icon-container mx-auto mb-6 bg-green-100 rounded-2xl animate-pulse-glow">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    class="w-8 h-8 text-green-600">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M14 2v6h6M16 13H8M16 17H8M10 9H8" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Surat Kehilangan</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Laporkan kehilangan dokumen atau barang pribadi Anda
                            </p>
                        </div>
                    </div>

                    <!-- Izin Keramaian -->
                    <div class="service-card bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl border border-gray-100">
                        <div class="text-center">
                            <div class="icon-container mx-auto mb-6 bg-orange-100 rounded-2xl animate-pulse-glow">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    class="w-8 h-8 text-orange-600">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <circle cx="9" cy="7" r="4" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Izin Keramaian</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Ajukan izin untuk kegiatan yang melibatkan banyak orang
                            </p>
                        </div>
                    </div>

                    <!-- Aspirasi -->
                    <div class="service-card bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl border border-gray-100">
                        <div class="text-center">
                            <div class="icon-container mx-auto mb-6 bg-purple-100 rounded-2xl animate-pulse-glow">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    class="w-8 h-8 text-purple-600">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M8 9h8M8 13h6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Aspirasi</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Sampaikan aspirasi dan harapan Anda
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Kritik & Saran Card -->
                <div class="flex justify-center">
                    <div
                        class="service-card bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl border border-gray-100 max-w-md w-full">
                        <div class="text-center">
                            <div class="icon-container mx-auto mb-6 bg-yellow-100 rounded-2xl animate-pulse-glow">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    class="w-8 h-8 text-yellow-600">
                                    <path
                                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Kritik & Saran</h3>
                            <p class="text-gray-600 leading-relaxed">
                                Sampaikan Kritik dan Saran anda kepada kami
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endauth

    <!-- News Section -->
    <div class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16 animate-fade-in">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl mb-6 shadow-lg animate-bounce">
                    <img src="{{ asset('images/news.png') }}" alt="icon"
                        class="w-8 h-8 object-contain transition-transform duration-300 hover:scale-110" />
                </div>

                <h2 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-4">
                    BERITA
                    <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                        TERBARU
                    </span>
                </h2>

                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Kami menyediakan berita terbaru dan terupdate untuk Anda
                </p>
            </div>

            <!-- News Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @forelse ($berita as $index => $item)
                    <article
                        class="group bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden transform hover:-translate-y-2 animate-slide-up"
                        style="animation-delay: {{ $index * 100 }}ms">
                        <!-- Image Container -->
                        <div class="relative overflow-hidden">
                            @if ($item->slug)
                                <a href="{{ route('berita.show', $item->slug) }}" class="block">
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                        class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-700">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    </div>
                                </a>
                            @else
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                    class="w-full h-56 object-cover">
                            @endif


                            <!-- Content -->
                            <div class="p-6">
                                <!-- Date -->
                                <div class="flex items-center text-sm text-gray-500 mb-3">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $item->created_at->translatedFormat('d M Y') }}
                                </div>

                                <!-- Title -->
                                @if ($item->slug)
                                    <h3
                                        class="text-xl font-bold text-gray-900 mb-3 leading-tight group-hover:text-blue-600 transition-colors duration-300">
                                        <a href="{{ route('berita.show', $item->slug) }}" class="hover:underline">
                                            {{ $item->judul }}
                                        </a>
                                    </h3>
                                @else
                                    <h3 class="text-xl font-bold text-gray-900 mb-3 leading-tight">
                                        {{ $item->judul }}
                                    </h3>
                                @endif

                                <!-- Excerpt -->
                                <p class="text-gray-600 leading-relaxed mb-4">
                                    {{ Str::limit(strip_tags($item->isiBerita), 120) }}
                                </p>

                                <!-- Read More -->
                                @if ($item->slug)
                                    <a href="{{ route('berita.show', $item->slug) }}"
                                        class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-700 transition-colors duration-300 group/link">
                                        <span>Baca Selengkapnya</span>
                                        <svg class="w-4 h-4 ml-2 transform group-hover/link:translate-x-1 transition-transform duration-300"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </a>
                                @endif
                            </div>
                    </article>
                @empty
                    <div class="col-span-full text-center py-16">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-100 rounded-full mb-6">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Belum Ada Berita</h3>
                        <p class="text-gray-600">Belum ada berita yang dipublikasikan saat ini.</p>
                    </div>
                @endforelse
            </div>

            <!-- View All Button -->
            @if ($berita->count() > 0)
                <div class="text-center animate-fade-in">
                    <a href="{{ route('berita.index') }}"
                        class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-gray-800 to-gray-900 hover:from-gray-900 hover:to-black text-white font-semibold rounded-2xl shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300 group">
                        <span>Lihat Semua Berita</span>
                        <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </div>


    <!-- Custom Styles -->
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animasi baru untuk section CTA */
        @keyframes gradient-x {

            0%,
            100% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        @keyframes float-delayed {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-30px) rotate(-180deg);
            }
        }

        @keyframes fade-in-up {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes glow {

            0%,
            100% {
                box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
            }

            50% {
                box-shadow: 0 0 30px rgba(255, 255, 255, 0.2), 0 0 40px rgba(65, 63, 181, 0.3);
            }
        }

        @keyframes pulse-slow {

            0%,
            100% {
                opacity: 0.1;
                transform: scale(1);
            }

            50% {
                opacity: 0.2;
                transform: scale(1.1);
            }
        }

        @keyframes bounce-slow {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        /* Class animasi yang sudah ada */
        .animate-fade-in {
            animation: fadeIn 0.8s ease-in-out;
        }

        .animate-slide-up {
            animation: slideUp 0.6s ease-out;
        }

        .animate-slide-down {
            animation: slideDown 0.6s ease-out;
        }

        /* Class animasi baru */
        .animate-gradient-x {
            animation: gradient-x 8s ease infinite;
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-float-delayed {
            animation: float-delayed 8s ease-in-out infinite;
            animation-delay: 2s;
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.8s ease-out forwards;
            opacity: 0;
        }

        .animate-glow {
            animation: glow 3s ease-in-out infinite;
        }

        .animate-pulse-slow {
            animation: pulse-slow 4s ease-in-out infinite;
        }

        .animate-bounce-slow {
            animation: bounce-slow 3s ease-in-out infinite;
        }

        /* Delay classes yang sudah ada */
        .delay-200 {
            animation-delay: 200ms;
        }

        .delay-300 {
            animation-delay: 300ms;
        }

        .delay-400 {
            animation-delay: 400ms;
        }

        .delay-500 {
            animation-delay: 500ms;
        }

        .delay-1000 {
            animation-delay: 1000ms;
        }

        @keyframes fade-in-down {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fade-in-up {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-down {
            animation: fade-in-down 0.8s ease-out forwards;
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.8s ease-out forwards;
            opacity: 0;
            animation-fill-mode: forwards;
        }

        /* Animasi gradien bergerak */
        .gradient-animation {
            background: linear-gradient(-45deg, #C6B570, #413FB5, #8B7CF6, #F59E0B, #C6B570);
            background-size: 400% 400%;
            animation: gradientShift 8s ease infinite;
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Partikel mengambang */
        .floating-particle {
            animation: float 6s ease-in-out infinite;
        }

        .floating-particle:nth-child(1) {
            animation-delay: 0s;
        }

        .floating-particle:nth-child(2) {
            animation-delay: 1s;
        }

        .floating-particle:nth-child(3) {
            animation-delay: 2s;
        }

        .floating-particle:nth-child(4) {
            animation-delay: 3s;
        }

        .floating-particle:nth-child(5) {
            animation-delay: 4s;
        }

        .floating-particle:nth-child(6) {
            animation-delay: 5s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        /* Animasi geometric shapes */
        .geometric-shape:nth-child(1) {
            animation: rotate 20s linear infinite;
        }

        .geometric-shape:nth-child(3) {
            animation: pulse 4s ease-in-out infinite;
        }

        @keyframes rotate {
            from {
                transform: rotate(45deg);
            }

            to {
                transform: rotate(405deg);
            }
        }

        /* Watermark glow effect */
        .watermark-glow {
            animation: glow 3s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from {
                filter: drop-shadow(0 0 5px rgba(255, 255, 255, 0.3));
            }

            to {
                filter: drop-shadow(0 0 20px rgba(255, 255, 255, 0.6));
            }
        }

        /* Text animations */
        .animate-fade-in-up {
            animation: fadeInUp 1s ease-out forwards;
            opacity: 0;
            transform: translateY(30px);
        }

        .animation-delay-300 {
            animation-delay: 0.3s;
        }

        .animation-delay-600 {
            animation-delay: 0.6s;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Wave animation */
        .animate-wave {
            animation: wave 8s ease-in-out infinite;
        }

        @keyframes wave {

            0%,
            100% {
                transform: translateX(0);
            }

            50% {
                transform: translateX(-25px);
            }
        }

        <style>@keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes pulse-glow {

            0%,
            100% {
                box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
            }

            50% {
                box-shadow: 0 0 40px rgba(59, 130, 246, 0.6);
            }
        }

        @keyframes gradient-shift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-float-delayed {
            animation: float 6s ease-in-out infinite;
            animation-delay: 1.5s;
        }

        .animate-pulse-glow {
            animation: pulse-glow 3s ease-in-out infinite;
        }

        .bg-gradient-animated {
            background: linear-gradient(-45deg, #3b82f6, #8b5cf6, #06b6d4, #10b981);
            background-size: 400% 400%;
            animation: gradient-shift 8s ease infinite;
        }

        .service-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .service-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .icon-container {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .icon-container img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
    </style>
</x-app-layout>
