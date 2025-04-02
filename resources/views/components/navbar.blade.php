<nav class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 shadow-lg" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 items-center justify-between">
            <!-- Logo and Navigation Links -->
            <div class="flex items-center">
                <div class="shrink-0 flex items-center">
                    <!-- Logo with glow effect -->
                    <div class="relative">
                        <div class="absolute inset-0 bg-yellow-400 rounded-full blur-md opacity-30 animate-pulse"></div>
                        <img class="size-15 relative z-10 transform transition-transform duration-300 hover:scale-110"
                            src="https://www.upload.ee/image/17920337/logo2.png"
                            alt="logo">
                    </div>
                    <span class="text-white font-bold ml-2 text-lg tracking-tight">KatanyamahStore</span>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-1">
                        <!-- Enhanced nav links with better hover effects and transitions -->
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
                    <!-- Order Button -->
                    <a href="login" class="mr-4 bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-medium rounded-md px-4 py-2 transition-all duration-200 transform hover:scale-105 shadow-md">
                        Login
                    </a>
                    
                    <!-- Profile dropdown with improved styling -->
                    <div class="relative ml-3" x-data="{ profileOpen: false }">
                        <div>
                            <button type="button" @click="profileOpen = !profileOpen"
                                class="relative flex items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 focus:ring-offset-gray-800 overflow-hidden border-2 border-transparent hover:border-yellow-500 transition-all duration-200"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <img class="size-10 rounded-full transition-transform duration-300 hover:scale-110"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="">
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
                            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 ring-1 shadow-lg ring-black/5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                            tabindex="-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors" role="menuitem" tabindex="-1">Your Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors" role="menuitem" tabindex="-1">Settings</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition-colors" role="menuitem" tabindex="-1">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Mobile menu button with improved styling -->
            <div class="-mr-2 flex md:hidden">
                <button type="button" @click="isOpen = !isOpen"
                    class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-yellow-400 hover:bg-gray-700 hover:text-yellow-500 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 transition-colors"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu icons with animation -->
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
        class="md:hidden bg-gray-800 shadow-lg" id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
            <!-- Mobile navigation links with enhanced styling -->
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
            
            <!-- Mobile Order Button -->
            <a href="login" 
               class="block w-full text-center mt-2 bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-medium rounded-md px-3 py-2 transition-colors duration-200 shadow-md">
                Order Now
            </a>
        </div>
        
        <!-- Enhanced Mobile Profile Section -->
        <div class="border-t border-gray-700 pt-4 pb-3 bg-gray-800/50 backdrop-blur-sm">
            <div class="flex items-center px-5">
                <div class="shrink-0">
                    <img class="size-10 rounded-full border-2 border-yellow-500"
                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium text-white">Tom Cook</div>
                    <div class="text-sm font-medium text-gray-400">tom@example.com</div>
                </div>
            </div>
            
            <!-- Mobile Profile Actions -->
            <div class="mt-3 space-y-1 px-2">
                <a href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-yellow-400 transition-colors duration-200">
                    Your Profile
                </a>
                <a href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-yellow-400 transition-colors duration-200">
                    Settings
                </a>
                <a href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-yellow-400 transition-colors duration-200">
                    Sign out
                </a>
            </div>
        </div>
    </div>
</nav>