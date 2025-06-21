<x-app-layout>
    <x-slot name="header">
        <div class="relative overflow-hidden bg-white/70 dark:bg-gray-800/70 backdrop-blur-lg border-b border-gray-200/50 dark:border-gray-700/50">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-600/10 to-purple-600/10"></div>
            <div class="relative px-6 py-8 mx-auto max-w-7xl">
                <div class="flex items-center justify-between">
                    <div class="animate-fade-in">
                        <h1 class="text-3xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 dark:from-white dark:to-gray-300 bg-clip-text text-transparent">
                            Edit Profile
                        </h1>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">Update your personal information and settings</p>
                    </div>
                    <div class="animate-float">
                        <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center shadow-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="px-6 py-12 mx-auto max-w-7xl">
        <div class="grid gap-8 lg:grid-cols-3">
            <!-- Sidebar Navigation -->
            <div class="lg:col-span-1">
                <div class="sticky top-8 animate-slide-up">
                    <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-2xl shadow-xl border border-gray-200/50 dark:border-gray-700/50 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Profile Sections</h3>
                        <nav class="space-y-2">
                            <a href="#profile-info" class="nav-item flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-blue-50 dark:hover:bg-blue-900/30 transition-all duration-200 group">
                                <svg class="w-5 h-5 mr-3 group-hover:text-blue-600 dark:group-hover:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Profile Info
                            </a>
                            <a href="#address" class="nav-item flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-blue-50 dark:hover:bg-blue-900/30 transition-all duration-200 group">
                                <svg class="w-5 h-5 mr-3 group-hover:text-blue-600 dark:group-hover:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Address
                            </a>
                            <a href="#phone" class="nav-item flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-blue-50 dark:hover:bg-blue-900/30 transition-all duration-200 group">
                                <svg class="w-5 h-5 mr-3 group-hover:text-blue-600 dark:group-hover:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                Phone
                            </a>
                            <a href="#password" class="nav-item flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-blue-50 dark:hover:bg-blue-900/30 transition-all duration-200 group">
                                <svg class="w-5 h-5 mr-3 group-hover:text-blue-600 dark:group-hover:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                Password
                            </a>
                            <a href="#danger" class="nav-item flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-red-50 dark:hover:bg-red-900/30 transition-all duration-200 group">
                                <svg class="w-5 h-5 mr-3 group-hover:text-red-600 dark:group-hover:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.863-.833-2.633 0L4.181 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                </svg>
                                Danger Zone
                            </a>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Form Sections -->
            <div class="lg:col-span-2 space-y-8">
                <section id="profile-info" class="profile-section bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-2xl shadow-xl border border-gray-200/50 dark:border-gray-700/50 p-8">
                    @include('profile.partials.update-profile-information-form')
                </section>

                <section id="address" class="profile-section bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-2xl shadow-xl border border-gray-200/50 dark:border-gray-700/50 p-8">
                    @include('profile.partials.update-address-form')
                </section>

                <section id="phone" class="profile-section bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-2xl shadow-xl border border-gray-200/50 dark:border-gray-700/50 p-8">
                    @include('profile.partials.update-phone-form')
                </section>

                <section id="password" class="profile-section bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-2xl shadow-xl border border-gray-200/50 dark:border-gray-700/50 p-8">
                    @include('profile.partials.update-password-form')
                </section>

                <section id="danger" class="profile-section bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-2xl shadow-xl border border-red-200/50 dark:border-red-700/50 p-8">
                    @include('profile.partials.delete-user-form')
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
