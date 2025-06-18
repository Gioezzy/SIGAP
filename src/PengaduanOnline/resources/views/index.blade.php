<x-app-layout>
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
    <!-- News Section -->
    <div class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16 animate-fade-in">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl mb-6 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
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
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
    </style>
</x-app-layout>
