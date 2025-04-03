<nav class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 shadow-lg" 
     x-data="{ 
        isOpen: false, 
        profileOpen: false,
        userInitial: '{{ auth()->check() ? substr(auth()->user()->username, 0, 1) : 'G' }}',
        gradients: [
            'from-yellow-400 to-yellow-600',
            'from-yellow-300 to-amber-500',
            'from-amber-400 to-yellow-500',
            'from-yellow-500 to-amber-600',
            'from-amber-300 to-yellow-500'
        ],
        userGradient: ''
     }"
     x-init="userGradient = gradients[Math.floor(Math.random() * gradients.length)]">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between">
            <!-- Logo and Navigation Links -->
            <div class="flex items-center">
                <div class="shrink-0 flex items-center">
                    <!-- Logo with glow effect -->
                    <div class="relative">
                        <div class="absolute inset-0 bg-yellow-400 rounded-full blur-md opacity-30 animate-pulse"></div>
                        <img class="size-15 relative z-10 transform transition-transform duration-300 hover:scale-110"
                            src="https://www.upload.ee/image/17920337/logo2.png" alt="logo">
                    </div>
                    <span class="text-white font-bold ml-2 text-lg tracking-tight">KatanyamahStore</span>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-1">
                        <!-- Navigation links with all items -->
                        <a href="/"
                            class="{{ request()->is('/') ? 'bg-yellow-500 text-gray-900 shadow-md' : 'text-gray-300 hover:bg-gray-700 hover:text-yellow-400' }} 
                            rounded-md px-4 py-2 text-sm font-medium transition-all duration-200 border-b-2 
                            {{ request()->is('/') ? 'border-yellow-500' : 'border-transparent hover:border-yellow-500' }}">
                            Home
                        </a>
                        <a href="pricing"
                            class="{{ request()->is('pricing') ? 'bg-yellow-500 text-gray-900 shadow-md' : 'text-gray-300 hover:bg-gray-700 hover:text-yellow-400' }} 
                            rounded-md px-4 py-2 text-sm font-medium transition-all duration-200 border-b-2 
                            {{ request()->is('pricing') ? 'border-yellow-500' : 'border-transparent hover:border-yellow-500' }}">
                            Pricing
                        </a>
                        <a href="showroom"
                            class="{{ request()->is('showroom') ? 'bg-yellow-500 text-gray-900 shadow-md' : 'text-gray-300 hover:bg-gray-700 hover:text-yellow-400' }} 
                            rounded-md px-4 py-2 text-sm font-medium transition-all duration-200 border-b-2 
                            {{ request()->is('showroom') ? 'border-yellow-500' : 'border-transparent hover:border-yellow-500' }}">
                            Showroom
                        </a>
                        <a href="about"
                            class="{{ request()->is('about') ? 'bg-yellow-500 text-gray-900 shadow-md' : 'text-gray-300 hover:bg-gray-700 hover:text-yellow-400' }} 
                            rounded-md px-4 py-2 text-sm font-medium transition-all duration-200 border-b-2 
                            {{ request()->is('about') ? 'border-yellow-500' : 'border-transparent hover:border-yellow-500' }}">
                            About
                        </a>
                        <a href="contact"
                            class="{{ request()->is('contact') ? 'bg-yellow-500 text-gray-900 shadow-md' : 'text-gray-300 hover:bg-gray-700 hover:text-yellow-400' }} 
                            rounded-md px-4 py-2 text-sm font-medium transition-all duration-200 border-b-2 
                            {{ request()->is('contact') ? 'border-yellow-500' : 'border-transparent hover:border-yellow-500' }}">
                            Contact
                        </a>
                    </div>
                </div>
            </div>

            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    @auth
                        <div class="ml-3">
                            <div class="text-base font-medium text-white">{{ auth()->user()->username }}</div>
                            <div class="text-sm font-medium text-gray-400">{{ auth()->user()->email }}</div>
                        </div>
                        
                        <!-- Modern Profile Avatar with Initial Letter -->
                        <div class="relative ml-3" x-data="{ profileOpen: false }">
                            <div>
                                <button type="button" 
                                    @click.stop="profileOpen = !profileOpen"
                                    class="relative flex items-center justify-center rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 focus:ring-offset-gray-800 overflow-hidden group h-10 w-10 transition-all duration-300"
                                    :class="'bg-gradient-to-br ' + userGradient"
                                    id="user-menu-button" 
                                    aria-expanded="false" 
                                    aria-haspopup="true">
                                    
                                    <!-- Animated background elements -->
                                    <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
                                    <div class="absolute -inset-1 bg-gradient-to-r from-yellow-400 to-yellow-600 rounded-full blur opacity-0 group-hover:opacity-30 transition-opacity duration-300 animate-pulse"></div>
                                    
                                    <!-- Username initial -->
                                    <span class="relative text-lg font-bold text-white" x-text="userInitial.toUpperCase()"></span>
                                    
                                    <!-- Animated ring indicator when menu is open -->
                                    <span 
                                        class="absolute inset-0 rounded-full border-2 border-transparent transition-all duration-300" 
                                        :class="{'border-yellow-300': profileOpen, 'border-transparent': !profileOpen}">
                                    </span>
                                </button>
                            </div>

                            <!-- Dropdown menu with enhanced styling -->
                            <div x-show="profileOpen" 
                                x-transition:enter="transition ease-out duration-200 transform"
                                x-transition:enter-start="opacity-0 scale-95" 
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-150 transform"
                                x-transition:leave-start="opacity-100 scale-100" 
                                x-transition:leave-end="opacity-0 scale-95"
                                @click.away="profileOpen = false"
                                class="absolute right-0 z-50 mt-2 w-56 origin-top-right rounded-lg overflow-hidden bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 py-1 shadow-lg ring-1 ring-black/5 focus:outline-none"
                                role="menu" 
                                aria-orientation="vertical" 
                                aria-labelledby="user-menu-button"
                                tabindex="-1">
                                
                                <!-- User info in dropdown -->
                                <div class="px-4 py-2 border-b border-gray-700">
                                    <div class="flex items-center">
                                        <!-- Smaller avatar in menu -->
                                        <div class="flex-shrink-0 h-8 w-8 rounded-full flex items-center justify-center text-sm font-bold text-white"
                                            :class="'bg-gradient-to-br ' + userGradient"
                                            x-text="userInitial.toUpperCase()">
                                        </div>
                                        <div class="ml-3 truncate">
                                            <div class="text-sm font-medium text-white">{{ auth()->user()->username }}</div>
                                            <div class="text-xs text-gray-400 truncate">{{ auth()->user()->email }}</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Menu options -->
                                <div class="pointer-events-auto">
                                    <a href="/dashboard"
                                        class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-yellow-400 transition-colors"
                                        role="menuitem" tabindex="-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                        My Dashboard
                                    </a>
                                    <form action="/logout" method="POST" class="block w-full">
                                        @csrf
                                        <button type="submit"
                                            class="flex items-center w-full text-left px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-yellow-400 transition-colors"
                                            role="menuitem" tabindex="-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                            </svg>
                                            Sign out
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Sign in Button -->
                        <a href="login"
                            class="mr-4 bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-medium rounded-md px-4 py-2 transition-all duration-200 transform hover:scale-105 shadow-md">
                            Sign in
                        </a>
                    @endauth
                </div>
            </div>

            <!-- Mobile menu button (unchanged) -->
            <div class="-mr-2 flex md:hidden">
                <button type="button" @click="isOpen = !isOpen"
                    class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-yellow-400 hover:bg-gray-700 hover:text-yellow-500 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 transition-colors"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu icons -->
                    <svg class="size-6" :class="{ 'hidden': isOpen, 'block': !isOpen }" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg class="size-6" :class="{ 'block': isOpen, 'hidden': !isOpen }" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Enhanced Mobile menu -->
    <div x-show="isOpen" 
        x-transition:enter="transition ease-out duration-200 transform"
        x-transition:enter-start="opacity-0 -translate-y-8" 
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150 transform"
        x-transition:leave-start="opacity-100 translate-y-0" 
        x-transition:leave-end="opacity-0 -translate-y-8"
        class="md:hidden bg-gray-800 shadow-lg" 
        id="mobile-menu">
        
        <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
            <!-- Mobile navigation links with all items -->
            <a href="/"
                class="{{ request()->is('/') ? 'bg-yellow-500 text-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-yellow-400' }} block rounded-md px-3 py-2 text-base font-medium transition-colors duration-200"
                aria-current="page">Home</a>
            <a href="pricing"
                class="{{ request()->is('pricing') ? 'bg-yellow-500 text-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-yellow-400' }} block rounded-md px-3 py-2 text-base font-medium transition-colors duration-200">Pricing</a>
            <a href="showroom"
                class="{{ request()->is('showroom') ? 'bg-yellow-500 text-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-yellow-400' }} block rounded-md px-3 py-2 text-base font-medium transition-colors duration-200">Showroom</a>
            <a href="about"
                class="{{ request()->is('about') ? 'bg-yellow-500 text-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-yellow-400' }} block rounded-md px-3 py-2 text-base font-medium transition-colors duration-200">About</a>
            <a href="contact"
                class="{{ request()->is('contact') ? 'bg-yellow-500 text-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-yellow-400' }} block rounded-md px-3 py-2 text-base font-medium transition-colors duration-200">Contact</a>

            <!-- Show Sign In button for guests on mobile -->
            @guest
            <a href="login"
                class="block w-full text-center mt-2 bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-medium rounded-md px-3 py-2 transition-colors duration-200 shadow-md">
                Sign in
            </a>
            @endguest
        </div>

        <!-- Mobile Profile Section with Initial -->
        @auth
        <div class="border-t border-gray-700 pt-4 pb-3 bg-gray-800/50 backdrop-blur-sm">
            <div class="flex items-center px-5">
                <div class="shrink-0 flex h-10 w-10 rounded-full items-center justify-center"
                     :class="'bg-gradient-to-br ' + userGradient">
                    <span class="text-lg font-bold text-white" x-text="userInitial.toUpperCase()"></span>
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium text-white">{{ auth()->user()->username }}</div>
                    <div class="text-sm font-medium text-gray-400">{{ auth()->user()->email }}</div>
                </div>
            </div>

            <!-- Mobile Profile Actions -->
            <div class="mt-3 space-y-1 px-2">
                <a href="/dashboard"
                    class="flex items-center rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-yellow-400 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    My Dashboard
                </a>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit"
                        class="flex items-center w-full text-left rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-yellow-400 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Sign out
                    </button>
                </form>
            </div>
        </div>
        @endauth
    </div>
</nav>