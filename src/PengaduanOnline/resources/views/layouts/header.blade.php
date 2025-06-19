<nav class="bg-white border-b shadow-sm">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0 text-lg font-bold text-blue-600">
                <a href="{{ route('home') }}">Layanan Pengaduan</a>
            </div>

            <!-- Menu -->
            <div class="items-center hidden space-x-6 text-sm text-gray-700 md:flex">
                <a href="{{ route('home') }}" class="hover:text-blue-500">Home</a>
                <a href="{{ route('pengaduan.index') }}" class="hover:text-blue-500">Pengaduan</a>
                <a href="{{ route('tanggapan.pengaduan.index') }}" class="hover:text-blue-500">Tanggapan Pengaduan</a>
                <a href="{{ route('kritiksaran.index') }}" class="hover:text-blue-500">Kritik Saran</a>
                <a href="{{ route('tanggapan.kritiksaran.index') }}" class="hover:text-blue-500">Tanggapan Kritik Saran</a>
                <a href="{{ route('aspirasi.index') }}" class="hover:text-blue-500">Aspirasi</a>
                <a href="{{ route('tanggapan.aspirasi.index') }}" class="hover:text-blue-500">Tanggapan Aspirasi</a>
                <a href="{{ route('kehilangan.index') }}" class="hover:text-blue-500">Kehilangan</a>
                <a href="{{ route('tanggapan.kehilangan.index') }}" class="hover:text-blue-500">Tanggapan Kehilangan</a>
                <a href="{{ route('profiles.index') }}" class="hover:text-blue-500">Tentang Kami</a>
            </div>

            <!-- User -->
            <div class="relative ml-4">
                @auth
                    <div class="relative inline-block group">
                        <button class="text-sm font-medium text-gray-800 group-hover:text-blue-600">
                            {{ Auth::user()->name }}
                            <svg class="inline-block w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <ul class="absolute right-0 hidden mt-1 text-sm bg-white rounded shadow group-hover:block">
                            <li><a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">Profile</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full px-4 py-2 text-left hover:bg-gray-100">
                                        Log Out
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <div class="space-x-4 text-sm">
                        <a href="{{ route('login') }}" class="hover:text-blue-500">Login</a>
                        <a href="{{ route('register') }}" class="hover:text-blue-500">Register</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>
