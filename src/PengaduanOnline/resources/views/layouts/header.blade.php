<script src="//unpkg.com/alpinejs" defer></script>

<nav class="sticky top-0 z-50 bg-white border-b shadow-sm" x-data="{ open: false }">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="text-xl font-bold text-blue-600 transition hover:text-blue-700">
                    Layanan Pengaduan
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="items-center hidden space-x-6 text-sm text-gray-700 md:flex">
                <a href="{{ route('home') }}" class="transition hover:text-blue-500">Home</a>

                <!-- Dropdowns -->
                @foreach ([
                    'Pengaduan' => [
                        ['label' => 'Pengaduan', 'route' => 'pengaduan.index'],
                        ['label' => 'Tanggapan Pengaduan', 'route' => 'tanggapan.pengaduan.index'],
                    ],
                    'Kritik Saran' => [
                        ['label' => 'Kritik Saran', 'route' => 'kritiksaran.index'],
                        ['label' => 'Tanggapan Kritik Saran', 'route' => 'tanggapan.kritiksaran.index'],
                    ],
                    'Aspirasi' => [
                        ['label' => 'Aspirasi', 'route' => 'aspirasi.index'],
                        ['label' => 'Tanggapan Aspirasi', 'route' => 'tanggapan.aspirasi.index'],
                    ],
                    'Kehilangan' => [
                        ['label' => 'Kehilangan', 'route' => 'kehilangan.index'],
                        ['label' => 'Tanggapan Kehilangan', 'route' => 'tanggapan.kehilangan.index'],
                    ],
                    'Keramaian' => [
                        ['label' => 'Keramaian', 'route' => 'keramaian.index'],
                        ['label' => 'Tanggapan Keramaian', 'route' => 'tanggapan.keramaian.index'],
                    ],
                ] as $category => $items)
                    <div x-data="{ open: false }" class="relative group">
                        <button @mouseenter="open = true" @mouseleave="open = false"
                            class="transition hover:text-blue-500">
                            {{ $category }}
                        </button>
                        <div x-show="open" x-transition
                            @mouseenter="open = true" @mouseleave="open = false"
                            class="absolute left-0 z-50 mt-2 bg-white border border-gray-100 rounded-md shadow-md w-52">
                            <ul>
                                @foreach ($items as $item)
                                    <li>
                                        <a href="{{ route($item['route']) }}"
                                            class="block px-4 py-2 text-sm text-gray-700 transition hover:bg-blue-50">
                                            {{ $item['label'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach

                <a href="{{ route('profiles.index') }}" class="transition hover:text-blue-500">Tentang Kami</a>
            </div>

            <!-- User -->
            <div class="relative ml-4" x-data="{ dropdownOpen: false }">
                @auth
                    <div class="relative inline-block text-left">
                        <button @click="dropdownOpen = !dropdownOpen"
                            class="inline-flex items-center text-sm font-medium text-gray-800 transition hover:text-blue-600 focus:outline-none">
                            {{ Auth::user()->name }}
                            <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.27a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <ul x-show="dropdownOpen" @click.away="dropdownOpen = false" x-transition
                            class="absolute right-0 z-50 w-40 mt-2 bg-white border border-gray-200 rounded-md shadow-lg">
                            <li><a href="{{ route('profile.edit') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100">
                                        Log Out
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <div class="space-x-4 text-sm">
                        <a href="{{ route('login') }}" class="transition hover:text-blue-500">Login</a>
                        <a href="{{ route('register') }}" class="transition hover:text-blue-500">Register</a>
                    </div>
                @endauth
            </div>

            <!-- Mobile Toggle -->
            <div class="md:hidden">
                <button @click="open = !open" class="text-gray-700 hover:text-blue-600 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="md:hidden" x-show="open" @click.away="open = false" x-transition>
            <div class="py-4 space-y-2 text-sm text-gray-700">
                <a href="{{ route('home') }}" class="block px-4 hover:text-blue-500">Home</a>
                @foreach ([
                    ['Pengaduan', 'pengaduan.index', 'tanggapan.pengaduan.index'],
                    ['Kritik Saran', 'kritiksaran.index', 'tanggapan.kritiksaran.index'],
                    ['Aspirasi', 'aspirasi.index', 'tanggapan.aspirasi.index'],
                    ['Kehilangan', 'kehilangan.index', 'tanggapan.kehilangan.index'],
                    ['Keramaian', 'keramaian.index', 'tanggapan.keramaian.index'],
                ] as [$title, $main, $tanggapan])
                    <div class="px-4">
                        <p class="font-semibold">{{ $title }}</p>
                        <a href="{{ route($main) }}" class="block ml-2 hover:text-blue-500"> {{ $title }}</a>
                        <a href="{{ route($tanggapan) }}" class="block ml-2 hover:text-blue-500"> Tanggapan</a>
                    </div>
                @endforeach
                <a href="{{ route('profiles.index') }}" class="block px-4 hover:text-blue-500">Tentang Kami</a>
            </div>
        </div>
    </div>
</nav>
