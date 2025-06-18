<nav class="fixed top-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-md border-b border-gray-200/50 shadow-sm transition-all duration-300"
    x-data="{ open: false, scrolled: false }" x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 50 })" :class="{ 'bg-white/95 shadow-lg': scrolled }">

    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16 lg:h-20">

            <!-- Logo Section -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                    <!-- Logo Badge -->
                    <div class="w-auto h-10 lg:h-12 flex items-center">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo LPO" class="h-full object-contain" />
                    </div>
                    <!-- Logo Text -->
                    <div class="hidden sm:block">
                        <div
                            class="text-xl lg:text-2xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                            LPO
                        </div>
                        <div class="text-xs text-gray-500 -mt-1">
                            Layanan Pengaduan Online
                        </div>
                    </div>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-8">
                @auth
                    <a href="{{ route('home') }}"
                        class="{{ request()->routeIs('home') ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' }} font-medium transition-colors duration-300 relative group">
                        <span>Beranda</span>
                        <div
                            class="absolute -bottom-1 left-0 {{ request()->routeIs('home') ? 'w-full' : 'w-0' }} h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 group-hover:w-full transition-all duration-300">
                        </div>
                    </a>

                    <a href="{{ route('pengaduan.index') }}"
                        class="{{ request()->routeIs('pengaduan.*') ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' }} font-medium transition-colors duration-300 relative group">
                        <span>Pengaduan</span>
                        <div
                            class="absolute -bottom-1 left-0 {{ request()->routeIs('pengaduan.*') ? 'w-full' : 'w-0' }} h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 group-hover:w-full transition-all duration-300">
                        </div>
                    </a>

                    <a href="{{ route('tanggapan.index') }}"
                        class="{{ request()->routeIs('tanggapan.*') ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' }} font-medium transition-colors duration-300 relative group">
                        <span>Tanggapan</span>
                        <div
                            class="absolute -bottom-1 left-0 {{ request()->routeIs('tanggapan.*') ? 'w-full' : 'w-0' }} h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 group-hover:w-full transition-all duration-300">
                        </div>
                    </a>
                @endauth
            </div>

            <!-- Auth Buttons & Mobile Menu -->
            <div class="flex items-center space-x-4">
                @if (Auth::check())
                    <!-- User Dropdown (Authenticated) -->
                    <div class="relative" x-data="{ userOpen: false }">
                        <button @click="userOpen = !userOpen"
                            class="flex items-center space-x-2 px-4 py-2 rounded-xl bg-gradient-to-r from-blue-500 to-purple-600 text-white font-medium shadow-lg hover:shadow-blue-500/25 transition-all duration-300 hover:scale-105">
                            <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <span class="hidden sm:block">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': userOpen }"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="userOpen" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            @click.away="userOpen = false"
                            class="absolute right-0 mt-2 w-56 bg-white rounded-2xl shadow-xl border border-gray-100 py-2 z-50">
                            <a href="{{ route('profile.edit') }}"
                                class="flex items-center px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
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
                                    class="flex items-center w-full px-4 py-3 text-red-600 hover:bg-red-50 transition-colors duration-200">
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
                    <div class="hidden sm:flex items-center space-x-3">
                        <a href="{{ route('login') }}"
                            class="px-6 py-2 text-gray-700 font-medium hover:text-blue-600 transition-colors duration-300">
                            Log In
                        </a>
                        <a href="{{ route('register') }}"
                            class="px-6 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-medium rounded-xl shadow-lg hover:shadow-blue-500/25 transition-all duration-300 hover:scale-105">
                            Register
                        </a>
                    </div>
                @endif

                <!-- Mobile Menu Button -->
                <button @click="open = !open"
                    class="lg:hidden p-2 rounded-xl bg-gray-100 hover:bg-gray-200 transition-colors duration-300">
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
        class="lg:hidden bg-white/95 backdrop-blur-md border-t border-gray-200/50">
        <div class="px-4 py-6 space-y-4">
            <!-- Mobile Navigation Links -->
            <a href="{{ route('home') }}"
                class="block px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-xl font-medium transition-all duration-300"
                @click="open = false">
                Beranda
            </a>
            <a href="{{ route('pengaduan.index') }}"
                class="block px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-xl font-medium transition-all duration-300"
                @click="open = false">
                Pengaduan
            </a>
            <a href="{{ route('tanggapan.index') }}"
                class="block px-4 py-3 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-xl font-medium transition-all duration-300"
                @click="open = false">
                Tanggapan
            </a>

            @guest
                <hr class="border-gray-200">
                <!-- Mobile Auth Buttons -->
                <div class="space-y-3 pt-4">
                    <a href="{{ route('login') }}"
                        class="block w-full px-4 py-3 text-center text-gray-700 hover:text-blue-600 border border-gray-300 hover:border-blue-300 rounded-xl font-medium transition-all duration-300"
                        @click="open = false">
                        Log In
                    </a>
                    <a href="{{ route('register') }}"
                        class="block w-full px-4 py-3 text-center bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-medium shadow-lg transition-all duration-300"
                        @click="open = false">
                        Register
                    </a>
                </div>
            @endguest
        </div>
    </div>
</nav>
<div class="h-16 lg:h-20"></div>

<!-- Alpine.js CDN -->
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
