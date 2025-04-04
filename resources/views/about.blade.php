<x-layout>
    <!-- Hero Section with animated background -->
    <div x-data="{
        scrolled: false,
        activeSection: 'story'
    }" x-init="window.addEventListener('scroll', () => {
        scrolled = window.scrollY > 50;
    
        // Determine active section based on scroll position
        const sections = document.querySelectorAll('section[id]');
        let current = '';
    
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            if (scrollY >= sectionTop - 200) {
                current = section.getAttribute('id');
            }
        });
    
        if (current) {
            activeSection = current;
        }
    })" class="relative">
        <!-- Floating navigation dots for sections (desktop) -->
        <div
            class="hidden lg:flex fixed right-8 top-1/2 transform -translate-y-1/2 z-50 flex-col items-center space-y-4">
            <button @click="document.getElementById('story').scrollIntoView({behavior: 'smooth'})"
                :class="{ 'bg-yellow-400': activeSection === 'story', 'bg-gray-300': activeSection !== 'story' }"
                class="w-3 h-3 rounded-full transition-colors duration-300" aria-label="Go to Our Story section"></button>
            <button @click="document.getElementById('values').scrollIntoView({behavior: 'smooth'})"
                :class="{ 'bg-yellow-400': activeSection === 'values', 'bg-gray-300': activeSection !== 'values' }"
                class="w-3 h-3 rounded-full transition-colors duration-300"
                aria-label="Go to Our Values section"></button>
            <button @click="document.getElementById('team').scrollIntoView({behavior: 'smooth'})"
                :class="{ 'bg-yellow-400': activeSection === 'team', 'bg-gray-300': activeSection !== 'team' }"
                class="w-3 h-3 rounded-full transition-colors duration-300"
                aria-label="Go to Our Team section"></button>
        </div>

        <!-- Decorative elements -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
            <div class="absolute -top-12 -left-12 w-64 h-64 bg-yellow-300 rounded-full opacity-30 blur-2xl"></div>
            <div class="absolute top-1/3 -right-24 w-80 h-80 bg-yellow-400 rounded-full opacity-20 blur-3xl"></div>
            <div class="absolute bottom-0 left-1/4 w-72 h-72 bg-yellow-200 rounded-full opacity-30 blur-2xl"></div>
        </div>

        <!-- Hero Content -->
        <div class="relative bg-gradient-to-b from-yellow-400 to-yellow-300 pt-16 pb-24 overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10"
                x-intersect:enter="$el.classList.add('animate-fade-in-up')">
                <div class="text-center">
                    <h1
                        class="text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl mt-8 mb-6">
                        <span class="block">About</span>
                        <span class="block text-white drop-shadow-md">Katanyamah Store</span>
                    </h1>
                    <div class="w-24 h-1 bg-white mx-auto rounded-full my-6"></div>
                    <p class="mt-5 max-w-2xl mx-auto text-xl text-gray-800 leading-relaxed">
                        We're on a mission to transform the digital landscape with innovative solutions and provide
                        exceptional products to our customers.
                    </p>

                    <!-- Mobile section navigation -->
                    <div class="flex justify-center mt-10 lg:hidden">
                        <div class="bg-white/80 backdrop-blur-sm rounded-full p-1 inline-flex shadow-lg">
                            <button @click="document.getElementById('story').scrollIntoView({behavior: 'smooth'})"
                                :class="{ 'bg-yellow-400 text-white': activeSection === 'story' }"
                                class="px-4 py-2 text-sm font-medium rounded-full transition-colors duration-300">
                                Story
                            </button>
                            <button @click="document.getElementById('values').scrollIntoView({behavior: 'smooth'})"
                                :class="{ 'bg-yellow-400 text-white': activeSection === 'values' }"
                                class="px-4 py-2 text-sm font-medium rounded-full transition-colors duration-300">
                                Values
                            </button>
                            <button @click="document.getElementById('team').scrollIntoView({behavior: 'smooth'})"
                                :class="{ 'bg-yellow-400 text-white': activeSection === 'team' }"
                                class="px-4 py-2 text-sm font-medium rounded-full transition-colors duration-300">
                                Team
                            </button>
                        </div>
                    </div>

                    <!-- Scroll indicator -->
                    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
                        <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="bg-white relative z-10">
            <!-- Our Story Section -->
            <section id="story" class="py-20 relative overflow-hidden">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="lg:flex lg:items-center lg:justify-between gap-12"
                        x-intersect:enter="$el.classList.add('animate-fade-in-up')">
                        <div class="lg:w-1/2">
                            <h2 class="text-3xl font-extrabold text-gray-900 inline-flex items-center">
                                <span class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center mr-3">
                                    <span class="text-white text-lg font-bold">1</span>
                                </span>
                                Our Story
                            </h2>

                            @foreach ($about as $About)
                                <div class="mt-6 text-lg text-gray-600 space-y-4">
                                    <p class="leading-relaxed">
                                        {{ $About['story'] }}
                                    </p>
                                    <p class="leading-relaxed">
                                        {{ $About['story2'] }}
                                    </p>
                                </div>
                        </div>

                        <div class="mt-10 lg:mt-0 lg:w-1/2 relative">
                            <div class="absolute -top-4 -right-4 w-32 h-32 bg-yellow-200 rounded-full opacity-70"></div>
                            <div class="absolute -bottom-4 -left-4 w-24 h-24 bg-yellow-300 rounded-full opacity-70">
                            </div>
                            <img class="rounded-lg shadow-xl relative z-10 w-full transform transition-transform duration-500 hover:scale-105"
                                src="{{ $About['story_img'] }}" alt="Our team working together">
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Decorative dotted pattern -->
                <div class="absolute bottom-0 left-0 right-0 h-16 bg-repeat-x"
                    style="background-image: url('data:image/svg+xml,%3Csvg width=\'20\' height=\'20\' viewBox=\'0 0 20 20\' fill=\'none\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Ccircle cx=\'10\' cy=\'10\' r=\'2\' fill=\'%23FCD34D\'/%3E%3C/svg%3E%0A')">
                </div>
            </section>

            <!-- Our Values Section -->
            <section id="values" class="py-20 bg-gray-50 relative">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-16">
                        <h2 class="text-3xl font-extrabold text-gray-900 inline-flex items-center justify-center">
                            <span class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center mr-3">
                                <span class="text-white text-lg font-bold">2</span>
                            </span>
                            Our Values
                        </h2>
                        <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">
                            The principles that guide everything we do at Katanyamah Store
                        </p>
                    </div>

                    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                        <!-- Innovation Value Card -->
                        <div x-intersect:enter="$el.classList.add('animate-fade-in-up')"
                            class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                            <div class="h-2 bg-yellow-400"></div>
                            <div class="p-8">
                                <div
                                    class="bg-yellow-100 p-3 rounded-full w-14 h-14 flex items-center justify-center mb-6">
                                    <svg class="w-7 h-7 text-yellow-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900 mb-3">Innovation</h3>
                                <p class="text-gray-600">We embrace new ideas and technologies to solve complex problems
                                    and stay ahead of industry trends.</p>
                            </div>
                        </div>

                        <!-- Collaboration Value Card -->
                        <div x-intersect:enter="$el.classList.add('animate-fade-in-up')" x-intersect:enter.delay="100"
                            class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                            <div class="h-2 bg-yellow-400"></div>
                            <div class="p-8">
                                <div
                                    class="bg-yellow-100 p-3 rounded-full w-14 h-14 flex items-center justify-center mb-6">
                                    <svg class="w-7 h-7 text-yellow-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900 mb-3">Collaboration</h3>
                                <p class="text-gray-600">We believe in the power of teamwork and diverse perspectives
                                    to create exceptional products and experiences.</p>
                            </div>
                        </div>

                        <!-- Integrity Value Card -->
                        <div x-intersect:enter="$el.classList.add('animate-fade-in-up')" x-intersect:enter.delay="200"
                            class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
                            <div class="h-2 bg-yellow-400"></div>
                            <div class="p-8">
                                <div
                                    class="bg-yellow-100 p-3 rounded-full w-14 h-14 flex items-center justify-center mb-6">
                                    <svg class="w-7 h-7 text-yellow-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                        </path>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900 mb-3">Integrity</h3>
                                <p class="text-gray-600">We act with honesty, transparency, and respect in all that we
                                    do, building trust with our customers and partners.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Wave separator -->
                <div class="absolute bottom-0 left-0 right-0 z-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 200">
                        <path fill="#ffffff" fill-opacity="1"
                            d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,138.7C960,139,1056,117,1152,106.7C1248,96,1344,96,1392,96L1440,96L1440,200L1392,200C1344,200,1248,200,1152,200C1056,200,960,200,864,200C768,200,672,200,576,200C480,200,384,200,288,200C192,200,96,200,48,200L0,200Z">
                        </path>
                    </svg>
                </div>
            </section>

            <!-- Team Section with interactive cards -->
            <section id="team" class="py-20 relative overflow-hidden">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-16">
                        <h2 class="text-3xl font-extrabold text-gray-900 inline-flex items-center justify-center">
                            <span class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center mr-3">
                                <span class="text-white text-lg font-bold">3</span>
                            </span>
                            Meet Our Team
                        </h2>
                        <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">
                            Talented individuals working together to create amazing products and deliver exceptional
                            service.
                        </p>
                    </div>

                    <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-8 md:gap-16">
                        @foreach ($team as $index => $Team)
                            <div x-data="{ showBio: false }" x-intersect:enter="$el.classList.add('animate-fade-in-up')"
                                x-intersect:enter.delay="{{ $index * 100 }}"
                                class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:shadow-xl group">
                                <div class="h-2 bg-yellow-400"></div>
                                <div class="flex flex-col sm:flex-row p-6">
                                    <div class="sm:w-1/3 flex-shrink-0">
                                        <div
                                            class="relative mx-auto h-40 w-40 rounded-full overflow-hidden border-4 border-yellow-200 group-hover:border-yellow-400 transition-colors duration-300">
                                            <img class="h-full w-full object-cover transform transition-transform duration-500 group-hover:scale-110"
                                                src="{{ $Team['team_img'] }}" alt="{{ $Team['team_name'] }}">
                                        </div>
                                    </div>
                                    <div class="sm:w-2/3 mt-6 sm:mt-0 sm:pl-6 text-center sm:text-left">
                                        <h3 class="text-2xl font-bold text-gray-900">{{ $Team['team_name'] }}</h3>
                                        <p class="text-yellow-600 font-medium">{{ $Team['team_rank'] }}</p>

                                        <div class="mt-4">
                                            <button @click="showBio = !showBio"
                                                class="inline-flex items-center text-yellow-600 hover:text-yellow-700 font-medium">
                                                <span x-text="showBio ? 'Hide Bio' : 'Show Bio'"></span>
                                                <svg :class="{ 'rotate-180': showBio }"
                                                    class="ml-1 w-4 h-4 transition-transform duration-200"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </button>

                                            <div x-show="showBio"
                                                x-transition:enter="transition ease-out duration-300"
                                                x-transition:enter-start="opacity-0 transform -translate-y-4"
                                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                                class="mt-4 text-gray-600">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit
                                                    tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>
                                                <div class="mt-4 flex justify-center sm:justify-start space-x-4">
                                                    <a href="#" class="text-gray-400 hover:text-yellow-600">
                                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                            <path
                                                                d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z" />
                                                        </svg>
                                                    </a>
                                                    <a href="#" class="text-gray-400 hover:text-yellow-600">
                                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                            <path
                                                                d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 16h-2v-6h2v6zm-1-6.891c-.607 0-1.1-.496-1.1-1.109 0-.612.492-1.109 1.1-1.109s1.1.497 1.1 1.109c0 .613-.493 1.109-1.1 1.109zm8 6.891h-1.998v-2.861c0-1.881-2.002-1.722-2.002 0v2.861h-2v-6h2v1.093c.872-1.616 4-1.736 4 1.548v3.359z" />
                                                        </svg>
                                                    </a>
                                                    <a href="#" class="text-gray-400 hover:text-yellow-600">
                                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                            <path
                                                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Decorative elements -->
                <div
                    class="absolute top-0 left-0 w-64 h-64 bg-yellow-100 rounded-full opacity-30 -translate-x-1/2 -translate-y-1/2 blur-3xl">
                </div>
                <div
                    class="absolute bottom-0 right-0 w-80 h-80 bg-yellow-200 rounded-full opacity-30 translate-x-1/4 translate-y-1/4 blur-3xl">
                </div>
            </section>

            <!-- CTA Section -->
            <section class="bg-yellow-400 py-16">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <h2 class="text-3xl font-bold text-white mb-6">Ready to Experience the Difference?</h2>
                    <p class="text-lg text-yellow-900 mb-8 max-w-3xl mx-auto">
                        Join the Katanyamah community today and discover our exclusive collection of premium products.
                    </p>
                    <a href="showroom"
                        class="inline-flex items-center px-6 py-3 bg-white text-yellow-600 font-bold rounded-full shadow-lg hover:bg-gray-50 transition-colors duration-300">
                        Browse Our Collection
                        <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </section>
        </div>
    </div>

    <style>
        /* Animation classes */
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</x-layout>
