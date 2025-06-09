<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer Modern</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-50">
    
    <!-- Footer -->
    <footer class="py-12 text-white bg-gradient-to-br from-blue-400 via-indigo-500 to-purple-500">
        <div class="container px-6 mx-auto">
            <div class="grid gap-8 md:grid-cols-3">

                <!-- Kolom 1: Layanan Pengaduan -->
                <div class="space-y-4">
                    <h5 class="text-2xl font-bold text-blue-100">Layanan Pengaduan Online</h5>
                    <div class="space-y-2 text-blue-50">
                        <p class="font-medium">Kami Siap Melayani, Menanggapi dan Bertindak</p>
                        <div class="space-y-1 text-sm">
                            <p>📍 Jl. Raya Pauh No. XX, Padang</p>
                            <p>📞 Telp: (0751) 123456</p>
                            <p>✉️ Email: layananpengaduan@contoh.go.id</p>
                        </div>
                    </div>
                </div>

                <!-- Kolom 2: Navigasi -->
                <div class="space-y-4">
                    <h5 class="text-2xl font-bold text-blue-100">Navigasi</h5>
                    <ul class="space-y-3 text-blue-50">
                        <li><a href="{{route('pengaduan.index')}}" class="flex items-center transition hover:text-white hover:translate-x-1">
                            <span class="mr-2">→</span>Pengaduan
                        </a></li>
                        <li><a href="#" class="flex items-center transition hover:text-white hover:translate-x-1">
                            <span class="mr-2">→</span>Kritik Saran
                        </a></li>
                        <li><a href="#" class="flex items-center transition hover:text-white hover:translate-x-1">
                            <span class="mr-2">→</span>Aspirasi
                        </a></li>
                        <li><a href="#" class="flex items-center transition hover:text-white hover:translate-x-1">
                            <span class="mr-2">→</span>Surat Kehilangan
                        </a></li>
                        <li><a href="#" class="flex items-center transition hover:text-white hover:translate-x-1">
                            <span class="mr-2">→</span>Izin Keramaian
                        </a></li>
                    </ul>
                </div>

                <!-- Kolom 3: Kontak -->    
                <div class="space-y-4">
                    <h5 class="text-2xl font-bold text-blue-100">Kontak</h5>
                    <div class="space-y-3 text-blue-50">
                        <p class="text-sm leading-relaxed">
                            Ada pertanyaan atau saran untuk kami?
                        </p>
                        <div class="space-y-2">
                            <a href="mailto:layananpengaduan@contoh.go.id" 
                               class="block transition hover:text-white hover:underline">
                                📧 layananpengaduan@contoh.go.id
                            </a>
                            <a href="tel:+6275112345" 
                               class="block font-medium transition hover:text-white hover:underline">
                                📱 (0751) 123456
                            </a>
                        </div>
                       
                    </div>
                </div>

            </div>

            <!-- Footer bawah -->
            <div class="pt-6 mt-8 text-center border-t border-blue-500">
                <p class="text-sm text-blue-200">
                    © Copyright 2025 Layanan Pengaduan Online Polsek Pauh. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

</body>
</html>