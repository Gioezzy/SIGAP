<nav class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 border-b shadow-sm bg-white/90 backdrop-blur-md border-gray-200/50"
    x-data="{ open: false, scrolled: false }"
    x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 50 })"
    :class="{ 'bg-white/95 shadow-lg': scrolled }">

    <div class="container px-4 mx-auto sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 lg:h-20">

            <!-- Logo Section -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                    <!-- Logo Badge -->
                    <div class="flex items-center w-auto h-10 lg:h-12">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo LPO" class="object-contain h-full" />
                    </div>
                    <!-- Logo Text -->
                    <div class="hidden sm:block">
                        <div
                            class="text-xl font-bold text-transparent lg:text-2xl bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text">
                            LPO
                        </div>
                        <div class="-mt-1 text-xs text-gray-500">
                            Layanan Pengaduan Online
                        </div>
                    </div>
                </a>
            </div>


            <!-- Tambahkan ini di bagian header -->
            <div x-data="{ openMenu: null }" class="items-center hidden space-x-8 lg:flex">
                @auth
                    @foreach([
                        ['key' => 'pengaduan', 'title' => 'Pengaduan', 'route' => 'pengaduan.index', 'tanggapan' => 'tanggapan.pengaduan.index'],
                        ['key' => 'aspirasi', 'title' => 'Aspirasi', 'route' => 'aspirasi.index', 'tanggapan' => 'tanggapan.aspirasi.index'],
                        ['key' => 'kritik', 'title' => 'Kritik & Saran', 'route' => 'kritiksaran.index', 'tanggapan' => 'tanggapan.kritiksaran.index'],
                        ['key' => 'kehilangan', 'title' => 'Kehilangan', 'route' => 'kehilangan.index', 'tanggapan' => 'tanggapan.kehilangan.index'],
                        ['key' => 'keramaian', 'title' => 'Keramaian', 'route' => 'keramaian.index', 'tanggapan' => 'tanggapan.keramaian.index'],
                    ] as $menu)
                        <div @mouseenter="openMenu = '{{ $menu['key'] }}'" @mouseleave="openMenu = null" class="relative">
                            <button class="relative font-medium text-gray-700 transition-colors duration-300 hover:text-blue-600 group">
                                <span>{{ $menu['title'] }}</span>
                                <div class="absolute -bottom-1 left-0 w-0 group-hover:w-full h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300"></div>
                            </button>

                            <div x-show="openMenu === '{{ $menu['key'] }}'" class="absolute z-10 w-56 py-2 mt-2 bg-white rounded-lg shadow-lg"
                                @click.away="openMenu = null">
                                <x-dropdown-link :href="route($menu['route'])"
                                    :active="request()->routeIs(str_replace('.index', '.*', $menu['route']))">
                                    {{ $menu['title'] }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route($menu['tanggapan'])"
                                    :active="request()->routeIs(str_replace('.index', '.*', $menu['tanggapan']))">
                                    Tanggapan {{ $menu['title'] }}
                                </x-dropdown-link>
                            </div>
                        </div>
                    @endforeach
                @endauth
            </div>

            <!-- Auth Buttons & Mobile Menu -->
            <div class="flex items-center space-x-4">
                @if (Auth::check())
                    <!-- User Dropdown (Authenticated) -->
                    <div class="relative" x-data="{ userOpen: false }">
                        <button @click="userOpen = !userOpen"
                            class="flex items-center px-4 py-2 space-x-2 font-medium text-white transition-all duration-300 shadow-lg rounded-xl bg-gradient-to-r from-blue-500 to-purple-600 hover:shadow-blue-500/25 hover:scale-105">
                            <div class="flex items-center justify-center w-8 h-8 rounded-lg bg-white/20">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <span class="hidden sm:block">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': userOpen }"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="userOpen" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            @click.away="userOpen = false"
                            class="absolute right-0 z-50 w-56 py-2 mt-2 bg-white border border-gray-100 shadow-xl rounded-2xl">
                            <a href="{{ route('profile.edit') }}"
                                class="flex items-center px-4 py-3 text-gray-700 transition-colors duration-200 hover:bg-blue-50 hover:text-blue-600">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                {{ __('Profile') }}
                            </a>
                            <hr class="my-2 border-gray-100">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="flex items-center w-full px-4 py-3 text-red-600 transition-colors duration-200 hover:bg-red-50">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <!-- Auth Buttons (Guest) -->
                    <div class="items-center hidden space-x-3 sm:flex">
                        <a href="{{ route('login') }}"
                            class="px-6 py-2 font-medium text-gray-700 transition-colors duration-300 hover:text-blue-600">
                            Log In
                        </a>
                        <a href="{{ route('register') }}"
                            class="px-6 py-2 font-medium text-white transition-all duration-300 shadow-lg bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl hover:shadow-blue-500/25 hover:scale-105">
                            Register
                        </a>
                    </div>
                @endif

                <!-- Mobile Menu Button -->
                <button @click="open = !open"
                    class="p-2 transition-colors duration-300 bg-gray-100 lg:hidden rounded-xl hover:bg-gray-200">
                    <svg class="w-6 h-6 text-gray-600" :class="{ 'hidden': open, 'block': !open }" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="w-6 h-6 text-gray-600" :class="{ 'block': open, 'hidden': !open }" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="border-t lg:hidden bg-white/95 backdrop-blur-md border-gray-200/50" x-data="{ openSubmenu: null }">
        <div class="px-4 py-6 space-y-4">
            <!-- Beranda -->
            <a href="{{ route('home') }}"
                class="block px-4 py-3 font-medium text-gray-700 transition hover:text-blue-600 hover:bg-blue-50 rounded-xl"
                @click="open = false">
                Beranda
            </a>

            <!-- Grouped Menus -->
            @foreach([
                ['key' => 'pengaduan', 'title' => 'Pengaduan', 'route' => 'pengaduan.index', 'tanggapan' => 'tanggapan.pengaduan.index'],
                ['key' => 'aspirasi', 'title' => 'Aspirasi', 'route' => 'aspirasi.index', 'tanggapan' => 'tanggapan.aspirasi.index'],
                ['key' => 'kritiksaran', 'title' => 'Kritik & Saran', 'route' => 'kritiksaran.index', 'tanggapan' => 'tanggapan.kritiksaran.index'],
                ['key' => 'kehilangan', 'title' => 'Kehilangan', 'route' => 'kehilangan.index', 'tanggapan' => 'tanggapan.kehilangan.index'],
                ['key' => 'keramaian', 'title' => 'Keramaian', 'route' => 'keramaian.index', 'tanggapan' => 'tanggapan.keramaian.index'],
            ] as $menu)
                <div>
                    <!-- Parent Button -->
                    <button @click="openSubmenu === '{{ $menu['key'] }}' ? openSubmenu = null : openSubmenu = '{{ $menu['key'] }}'"
                        class="flex items-center justify-between w-full px-4 py-3 font-medium text-gray-700 transition rounded-xl hover:bg-blue-50">
                        {{ $menu['title'] }}
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition-transform transform"
                            :class="{ 'rotate-180': openSubmenu === '{{ $menu['key'] }}' }" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown Items -->
                    <div x-show="openSubmenu === '{{ $menu['key'] }}'" x-collapse>
                        <a href="{{ route($menu['route']) }}"
                            class="block px-4 py-2 mt-2 ml-6 text-sm text-gray-600 rounded hover:bg-blue-50 hover:text-blue-700"
                            @click="open = false">
                            {{ $menu['title'] }}
                        </a>
                        <a href="{{ route($menu['tanggapan']) }}"
                            class="block px-4 py-2 mt-1 ml-6 text-sm text-gray-600 rounded hover:bg-blue-50 hover:text-blue-700"
                            @click="open = false">
                            Tanggapan {{ $menu['title'] }}
                        </a>
                    </div>
                </div>
            @endforeach

            @guest
                <hr class="my-4 border-gray-200">
                <div class="space-y-3">
                    <a href="{{ route('login') }}"
                        class="block w-full px-4 py-3 font-medium text-center text-gray-700 border border-gray-300 rounded-xl hover:text-blue-600 hover:border-blue-400"
                        @click="open = false">
                        Log In
                    </a>
                    <a href="{{ route('register') }}"
                        class="block w-full px-4 py-3 font-medium text-center text-white shadow-lg bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl"
                        @click="open = false">
                        Register
                    </a>
                </div>
            @endguest
        </div>
    </div>

</nav>
