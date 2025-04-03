<!-- resources/views/components/sidebar.blade.php -->
<div x-data="{ 
    mobileOpen: false, 
    desktopOpen: false,
    toggleMobile() { this.mobileOpen = !this.mobileOpen; },
    toggleDesktop() { this.desktopOpen = !this.desktopOpen; },
    closeMobile() { this.mobileOpen = false; },
    closeDesktop() { this.desktopOpen = false; }
}" class="relative">
    <!-- Mobile dropdown button - only visible on mobile, fixed position on right -->
    <button 
        @click="toggleMobile" 
        class="md:hidden fixed top-23 right-2 z-50 p-2 rounded-md bg-gray-900 text-white">
        <!-- Logo/icon for the dropdown - will toggle between hamburger and close icons -->
        <svg 
            x-show="!mobileOpen" 
            xmlns="http://www.w3.org/2000/svg" 
            class="h-6 w-6" 
            fill="none" 
            viewBox="0 0 24 24" 
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg 
            x-show="mobileOpen" 
            xmlns="http://www.w3.org/2000/svg" 
            class="h-6 w-6" 
            fill="none" 
            viewBox="0 0 24 24" 
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <!-- Desktop dropdown button - only visible on desktop, position changes when sidebar is toggled -->
    <button 
        @click="toggleDesktop" 
        class="hidden md:block fixed top-4 left-4 z-50 p-2 rounded-md bg-gray-900 text-white transition-all duration-300"
        :style="desktopOpen ? 'left: 272px' : 'left: 16px'">
        <!-- Logo/icon for the dropdown - will toggle between hamburger and close icons -->
        <svg 
            x-show="!desktopOpen" 
            xmlns="http://www.w3.org/2000/svg" 
            class="h-6 w-6" 
            fill="none" 
            viewBox="0 0 24 24" 
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg 
            x-show="desktopOpen" 
            xmlns="http://www.w3.org/2000/svg" 
            class="h-6 w-6" 
            fill="none" 
            viewBox="0 0 24 24" 
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <!-- Mobile sidebar - hidden by default, slides in when toggled -->
    <aside 
        x-show="mobileOpen"
        x-transition:enter="transition duration-300 ease-in-out transform"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition duration-300 ease-in-out transform"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="md:hidden w-64 bg-gray-900 text-white flex-shrink-0 fixed inset-y-0 left-0 z-40" 
        style="min-height: calc(100vh - 64px);">
        <nav class="py-4 px-2 h-full overflow-y-auto">
            <a @click="closeMobile" href="/dashboard"
                class="flex items-center px-4 py-2 rounded-md group {{ request()->is('dashboard') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <svg class="mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span>Dashboard</span>
            </a>

            <a @click="closeMobile" href="/dashboard/pricing"
                class="mt-3 flex items-center px-4 py-2 rounded-md group {{ request()->is('dashboard/pricing*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <svg class="mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Pricing</span>
            </a>

            <a @click="closeMobile" href="/dashboard/showroom"
                class="mt-3 flex items-center px-4 py-2 rounded-md group {{ request()->is('dashboard/showroom*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <svg class="mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                </svg>
                <span>Showroom</span>
            </a>

            <a @click="closeMobile" href="/dashboard/about"
                class="mt-3 flex items-center px-4 py-2 rounded-md group {{ request()->is('dashboard/about*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <svg class="mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>About</span>
            </a>

            <a @click="closeMobile" href="/dashboard/contact"
                class="mt-3 flex items-center px-4 py-2 rounded-md group {{ request()->is('dashboard/contact*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <svg class="mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span>Contact</span>
            </a>

            <a @click="closeMobile" href="/dashboard/orders"
                class="mt-3 flex items-center px-4 py-2 rounded-md group {{ request()->is('dashboard/orders*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <svg class="mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
                <span>Order List</span>
            </a>

            <a @click="closeMobile" href="/dashboard/faqs"
                class="mt-3 flex items-center px-4 py-2 rounded-md group {{ request()->is('dashboard/faqs*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <svg class="mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2"
                        d="M8 9h1m3 0h4m-8 4h1m3 0h4M9.5 17h5M12 3c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 18.523 2 13 6.477 3 12 3z" />
                </svg>
                <span>FAQs</span>
            </a>
        </nav>
    </aside>

    <!-- Desktop sidebar - hidden by default, slides in when toggled -->
    <aside 
        x-show="desktopOpen"
        x-transition:enter="transition duration-300 ease-in-out transform"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition duration-300 ease-in-out transform"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="hidden md:block w-64 bg-gray-900 text-white flex-shrink-0 fixed inset-y-0 left-0 z-40" 
        style="min-height: calc(100vh - 64px);">
        <nav class="py-4 px-2 h-full overflow-y-auto">
            <a @click="closeDesktop" href="/dashboard"
                class="flex items-center px-4 py-2 rounded-md group {{ request()->is('dashboard') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <svg class="mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span>Dashboard</span>
            </a>

            <a @click="closeDesktop" href="/dashboard/pricing"
                class="mt-3 flex items-center px-4 py-2 rounded-md group {{ request()->is('dashboard/pricing*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <svg class="mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Pricing</span>
            </a>

            <a @click="closeDesktop" href="/dashboard/showroom"
                class="mt-3 flex items-center px-4 py-2 rounded-md group {{ request()->is('dashboard/showroom*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <svg class="mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                </svg>
                <span>Showroom</span>
            </a>

            <a @click="closeDesktop" href="/dashboard/about"
                class="mt-3 flex items-center px-4 py-2 rounded-md group {{ request()->is('dashboard/about*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <svg class="mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>About</span>
            </a>

            <a @click="closeDesktop" href="/dashboard/contact"
                class="mt-3 flex items-center px-4 py-2 rounded-md group {{ request()->is('dashboard/contact*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <svg class="mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span>Contact</span>
            </a>

            <a @click="closeDesktop" href="/dashboard/orders"
                class="mt-3 flex items-center px-4 py-2 rounded-md group {{ request()->is('dashboard/orders*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <svg class="mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
                <span>Order List</span>
            </a>

            <a @click="closeDesktop" href="/dashboard/faqs"
                class="mt-3 flex items-center px-4 py-2 rounded-md group {{ request()->is('dashboard/faqs*') ? 'bg-gray-800 text-white' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <svg class="mr-3 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2"
                        d="M8 9h1m3 0h4m-8 4h1m3 0h4M9.5 17h5M12 3c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 18.523 2 13 6.477 3 12 3z" />
                </svg>
                <span>FAQs</span>
            </a>
        </nav>
    </aside>

    <!-- Overlay for when sidebar is open (both mobile and desktop) -->
    <div 
        x-show="mobileOpen || desktopOpen" 
        @click="mobileOpen = false; desktopOpen = false"
        x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-50"
        x-transition:leave="transition-opacity ease-linear duration-300"
        x-transition:leave-start="opacity-50"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-black opacity-50 z-30">
    </div>

    <!-- Alpine.js will handle body overflow -->
    <div x-effect="
        if (mobileOpen || desktopOpen) {
            document.body.classList.add('overflow-hidden');
        } else {
            document.body.classList.remove('overflow-hidden');
        }
    "></div>

    <!-- Handle window resize -->
    <div x-effect="
        const handleResize = () => {
            if (window.innerWidth < 768 && desktopOpen) {
                desktopOpen = false;
            } else if (window.innerWidth >= 768 && mobileOpen) {
                mobileOpen = false;
            }
        };
        window.addEventListener('resize', handleResize);
        return () => window.removeEventListener('resize', handleResize);
    "></div>
</div>