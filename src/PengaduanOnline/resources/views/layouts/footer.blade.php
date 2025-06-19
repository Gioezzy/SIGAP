<footer class="py-12 text-gray-300 bg-gray-900">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-10 md:grid-cols-3">

            <!-- Kolom 1 -->
            <div>
                <h5 class="mb-4 text-xl font-semibold text-white">Layanan Pengaduan Polsek Pauh</h5>
                <p class="text-sm leading-relaxed">
                    Kami menyediakan platform pengaduan masyarakat terkait pelayanan publik, pelanggaran hukum, dan
                    aspirasi untuk meningkatkan transparansi serta kualitas pelayanan Polsek Pauh.
                </p>
            </div>

            <!-- Kolom 2 -->
            <div>
                <h5 class="mb-4 text-xl font-semibold text-white">Quick Links</h5>
                <ul class="space-y-2 text-sm text-blue-400">
                    <li><a href="{{route('home')}}" class="text-blue-400 transition hover:text-white">Home</a></li>
                    <li><a href="{{route('pengaduan.index')}}"
                            class="text-blue-400 transition hover:text-white">Pengaduan</a></li>
                    {{-- <li><a href="{{route('tanggapan.pengaduan.index')}}"
                            class="text-blue-400 transition hover:text-white">Tanggapan
                            Pengaduan</a></li> --}}
                    <li><a href="{{route('kritiksaran.index')}}"
                            class="text-blue-400 transition hover:text-white">Kritik Saran</a>
                    </li>
                    {{-- <li><a href="{{route('tanggapan.kritiksaran.index')}}"
                            class="text-blue-400 transition hover:text-white">Tanggapan
                            Kritik Saran</a></li> --}}
                    <li><a href="{{route('aspirasi.index')}}"   
                            class="text-blue-400 transition hover:text-white">Aspirasi</a></li>
                    {{-- <li><a href="{{route('tanggapan.aspirasi.index')}}"
                            class="text-blue-400 transition hover:text-white">Tanggapan Aspirasi</a></li> --}}
                    <li><a href="{{route('kehilangan.index')}}"
                            class="text-blue-400 transition hover:text-white">Kehilangan</a></li>
                    {{-- <li><a href="{{route('tanggapan.kehilangan.index')}}"
                            class="text-blue-400 transition hover:text-white">Tanggapan Kehilangan</a></li> --}}
                    <li><a href="{{route('profiles.index')}}" class="text-blue-400 transition hover:text-white">Tentang
                            Kami</a></li>
                </ul>
            </div>


            <!-- Kolom 3 -->
            <div>
                <h5 class="mb-4 text-xl font-semibold text-white">Contact Us</h5>
                <p class="mb-2 text-sm">
                    Ada pertanyaan atau saran?<br>
                    <a href="mailto:contact@yourcompany.com" class="text-blue-400 hover:underline">
                        contact@yourcompany.com
                    </a>
                </p>
                <p class="text-sm">
                    Butuh bantuan?<br>
                    <a href="tel:+43720115278" class="text-blue-400 hover:underline">
                        +43 720 11 52 78
                    </a>
                </p>
            </div>

        </div>

        <!-- Footer bawah -->
        <div class="pt-6 mt-10 text-sm text-center text-gray-400 border-t border-gray-700">
            &copy; 2025 Layanan Pengaduan Online Polsek Pauh. All rights reserved.
        </div>
    </div>
</footer>
