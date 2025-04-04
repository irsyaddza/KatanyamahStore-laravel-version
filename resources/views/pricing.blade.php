<x-layout>
    <!-- Hero Section with Animated Background -->
    <div class="relative overflow-hidden bg-gradient-to-b from-yellow-400 to-yellow-300">
        <!-- Decorative elements -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
            <div class="absolute -top-12 -left-12 w-64 h-64 bg-yellow-300 rounded-full opacity-30 blur-2xl"></div>
            <div class="absolute top-1/3 -right-24 w-80 h-80 bg-yellow-400 rounded-full opacity-20 blur-3xl"></div>
            <div class="absolute bottom-0 left-1/4 w-72 h-72 bg-yellow-200 rounded-full opacity-30 blur-2xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24 relative z-10">
            <div 
                class="text-center max-w-3xl mx-auto"
                x-data="{}"
                x-intersect:enter="$el.classList.add('animate-fade-in-up')"
            >
                <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl md:text-6xl tracking-tight">
                    <span class="block">Choose the best</span>
                    <span class="block text-white drop-shadow-md">plan for you</span>
                </h1>
                <div class="w-24 h-1 bg-white mx-auto rounded-full my-6"></div>
                <p class="mt-5 text-xl text-gray-800 max-w-2xl mx-auto">
                    Choose what services you want from us, and see the prices here. We offer the right prices that match
                    the quality you deserve.
                </p>
            </div>
        </div>

        <!-- Wave separator -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 160" class="w-full">
                <path fill="#ffffff" fill-opacity="1" d="M0,128L48,117.3C96,107,192,85,288,90.7C384,96,480,128,576,133.3C672,139,768,117,864,112C960,107,1056,117,1152,122.7C1248,128,1344,128,1392,128L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </div>

    <!-- Pricing Cards Section -->
    <div class="bg-white py-12 md:py-20 px-4 sm:px-6 lg:px-8 relative">
        <div class="max-w-7xl mx-auto">


            <!-- Pricing Cards -->
            <div 
                class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12"
                x-data="{
                    hoveredCard: null
                }"
            >
                @foreach ($pricing as $index => $Pricing)
                <div 
                    x-intersect:enter="$el.classList.add('animate-fade-in-up')"
                    x-intersect:enter.delay="{{ $index * 150 }}"
                    @mouseenter="hoveredCard = {{ $index }}"
                    @mouseleave="hoveredCard = null"
                    class="bg-white rounded-xl overflow-hidden transform transition-all duration-500 hover:shadow-2xl"
                    :class="{'scale-105 z-10 shadow-xl shadow-yellow-200/50': hoveredCard === {{ $index }}}"
                >
                    <div class="px-6 py-12 border border-gray-200 rounded-xl h-full flex flex-col">
                        <!-- Title and description -->
                        <div class="mb-8">
                            <h3 class="text-xl font-bold text-gray-900">{{ $Pricing['price_title'] }}</h3>
                            <p class="mt-2 text-gray-600">{{ $Pricing['price_desc'] }}</p>
                        </div>
                        
                        <!-- Price -->
                        <div class="flex items-baseline mb-8" x-data="{showTooltip: false}">
                            <span class="text-5xl font-extrabold tracking-tight text-gray-900">
                                Rp{{ number_format($Pricing['price'], 0, ',', '.') }}
                            </span>
                            <div class="ml-1 flex flex-col">
                                <span class="text-sm font-medium text-gray-500">IDR</span>
                                <span class="text-sm font-medium text-gray-500">
                                    per request
                                </span>
                            </div>
                        </div>
                        
                        <!-- Features -->
                        <div class="space-y-4 mb-8 flex-grow">
                            <div class="flex items-center">
                                <svg class="h-5 w-5 text-yellow-500 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-gray-700">{{ $Pricing['price_feature1']}}</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="h-5 w-5 text-yellow-500 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-gray-700">{{ $Pricing['price_feature2']}}</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="h-5 w-5 text-yellow-500 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-gray-700">{{ $Pricing['price_feature3']}}</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="h-5 w-5 text-yellow-500 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-gray-700">{{ $Pricing['price_feature4']}}</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="h-5 w-5 text-yellow-500 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-gray-700">{{ $Pricing['price_feature5']}}</span>
                            </div>
                        </div>
                        
                        {{-- <!-- Button -->
                        <a 
                            href="/login"
                            class="w-full rounded-lg font-medium py-3 px-4 transition-all duration-300 text-center shadow-md transform hover:-translate-y-1"
                            :class="{
                                'bg-yellow-300 hover:bg-yellow-400 text-gray-900': {{ $index }} === 0,
                                'bg-yellow-400 hover:bg-yellow-500 text-gray-900': {{ $index }} === 1,
                                'bg-gray-900 hover:bg-yellow-600 text-white': {{ $index }} === 2
                            }"
                        >
                            Order Now
                        </a> --}}
                    </div>
                </div>
                @endforeach
            </div>

            {{-- <!-- Features Comparison Table (Hidden on Mobile) -->
            <div class="hidden md:block mt-24 overflow-hidden bg-white rounded-xl shadow-lg border border-gray-200">
                <div 
                    class="bg-yellow-50 px-6 py-4 border-b border-gray-200"
                    x-intersect:enter="$el.classList.add('animate-fade-in-up')"
                >
                    <h3 class="text-lg font-bold text-gray-900">Features Comparison</h3>
                </div>
                <div class="divide-y divide-gray-200">
                    <div class="grid grid-cols-4 text-sm">
                        <div class="px-6 py-4 font-medium text-gray-900 bg-gray-50">Feature</div>
                        <div class="px-6 py-4 font-medium text-center">Basic</div>
                        <div class="px-6 py-4 font-medium text-center">Standard</div>
                        <div class="px-6 py-4 font-medium text-center">Premium</div>
                    </div>
                    
                    <div class="grid grid-cols-4 text-sm">
                        <div class="px-6 py-4 font-medium text-gray-900 bg-gray-50">Customization</div>
                        <div class="px-6 py-4 text-center">Basic</div>
                        <div class="px-6 py-4 text-center">Advanced</div>
                        <div class="px-6 py-4 text-center">Full</div>
                    </div>
                    
                    <div class="grid grid-cols-4 text-sm">
                        <div class="px-6 py-4 font-medium text-gray-900 bg-gray-50">Revisions</div>
                        <div class="px-6 py-4 text-center">1</div>
                        <div class="px-6 py-4 text-center">3</div>
                        <div class="px-6 py-4 text-center">Unlimited</div>
                    </div>
                    
                    <div class="grid grid-cols-4 text-sm">
                        <div class="px-6 py-4 font-medium text-gray-900 bg-gray-50">Delivery Time</div>
                        <div class="px-6 py-4 text-center">7 days</div>
                        <div class="px-6 py-4 text-center">5 days</div>
                        <div class="px-6 py-4 text-center">3 days</div>
                    </div>
                    
                    <div class="grid grid-cols-4 text-sm">
                        <div class="px-6 py-4 font-medium text-gray-900 bg-gray-50">Premium Support</div>
                        <div class="px-6 py-4 text-center">
                            <svg class="h-5 w-5 text-gray-400 mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="px-6 py-4 text-center">
                            <svg class="h-5 w-5 text-yellow-500 mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="px-6 py-4 text-center">
                            <svg class="h-5 w-5 text-yellow-500 mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    
    {{-- <!-- Testimonials Section with Carousel -->
    <div class="bg-gray-50 py-16 md:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div 
                class="text-center mb-16"
                x-intersect:enter="$el.classList.add('animate-fade-in-up')"
            >
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">What Our Customers Say</h2>
                <div class="mt-3 w-24 h-1 bg-yellow-400 mx-auto rounded-full"></div>
                <p class="mt-4 text-lg text-gray-600">Real feedback from satisfied customers</p>
            </div>
            
            <!-- Testimonials Carousel -->
            <div 
                x-data="{
                    testimonials: [
                        { name: 'Alex Johnson', title: 'Game Developer', quote: 'The custom skin service exceeded all my expectations. Highly recommended!', avatar: '/api/placeholder/100/100' },
                        { name: 'Sarah Williams', title: 'Content Creator', quote: 'Excellent work and professional service. I\'ll definitely be coming back for more.', avatar: '/api/placeholder/100/100' },
                        { name: 'Michael Brown', title: 'Twitch Streamer', quote: 'The mods I ordered transformed my gameplay experience completely. Worth every penny.', avatar: '/api/placeholder/100/100' }
                    ],
                    activeSlide: 0
                }"
                class="relative mx-auto max-w-3xl"
                x-intersect:enter="$el.classList.add('animate-fade-in-up')"
                x-intersect:enter.delay="200"
            >
                <div class="relative overflow-hidden rounded-xl bg-white shadow-lg p-8 md:p-12">
                    <div class="absolute top-0 left-0 w-full h-1 bg-yellow-400"></div>
                    
                    <!-- Quote Icon -->
                    <div class="absolute top-8 right-8 text-yellow-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M6.5 10c-.223 0-.437.034-.65.065.069-.232.14-.468.254-.68.114-.308.292-.575.469-.844.148-.291.409-.488.601-.737.201-.242.475-.403.692-.604.213-.21.492-.315.714-.463.232-.133.434-.28.65-.35.208-.086.39-.16.539-.222.302-.125.474-.197.474-.197L9.758 4.03c0 0-.218.052-.597.144C8.97 4.222 8.737 4.278 8.472 4.345c-.271.05-.56.187-.882.312-.318.142-.686.238-1.028.466-.344.218-.741.4-1.091.692-.339.301-.748.562-1.05.945-.33.358-.656.734-.909 1.162C3.249 8.404 3.05 8.909 2.9 9.428c-.142.515-.302 1.033-.339 1.571-.043.522-.043 1.056-.008 1.571.048.517.145 1.045.267 1.545.129.544.281 1.06.48 1.544.216.479.457.916.785 1.351.323.435.674.834 1.056 1.175.385.344.749.655 1.143.916.846.569 1.859.866 2.77.936.752.058 1.347-.009 1.719-.083.37-.084.609-.199.609-.199l-.125-.972c0 0-.411.103-.916.145-.502.044-1.171.025-1.854-.099-.656-.122-1.33-.341-1.91-.65-.583-.304-1.085-.678-1.464-1.13-.375-.45-.692-.965-.903-1.512-.209-.542-.357-1.128-.403-1.722-.044-.596 0-1.197.145-1.774.145-.6.338-1.148.637-1.676.3-.527.662-.962 1.072-1.36.443-.419.916-.723 1.417-.964.273-.121.559-.217.834-.33l.125-.052c.045-.024.125-.055.186-.083.051-.025.311-.11.462-.142.151-.033.346-.104.731-.158C5.038 6.05 5.919 6 5.919 6l.031-.907c0 0-.151.023-.411.055-.259.034-.661.055-1.09.164-.22.057-.442.095-.673.19l-.301.118c-.129.049-.218.104-.336.169-.257.134-.497.248-.726.43-.223.18-.414.343-.598.542-.185.2-.421.384-.53.645-.131.25-.302.577-.362.878-.113.555-.169 1.323-.061 1.932.108.613.303 1.95.732 1.39.171-.235.265-.539.423-.841.138-.302.321-.601.532-.846.216-.255.458-.483.692-.735.223-.237.479-.483.747-.655.268-.173.522-.359.819-.508.31-.189.611-.263.907-.39.577-.215 1.125-.254 1.125-.254L10.952 6c0 0-.76.184-1.514.335-.748.149-1.667.452-2.36.816-.233.144-.451.312-.653.446-.21.159-.371.312-.519.495-.138.171-.294.336-.375.504-.092.168-.142.487-.205.69-.033.218-.046.411-.046.609C5.28 9.662 5.844 10 6.5 10zm8 0c-.223 0-.437.034-.65.065.069-.232.14-.468.254-.68.114-.308.292-.575.469-.844.148-.291.409-.488.601-.737.201-.242.475-.403.692-.604.213-.21.492-.315.714-.463.232-.133.434-.28.65-.35.208-.086.39-.16.539-.222.302-.125.474-.197.474-.197L17.758 4.03c0 0-.218.052-.597.144-.376.048-.608.104-.875.171-.271.05-.56.187-.882.312-.317.143-.686.238-1.028.467-.343.218-.741.4-1.091.692-.339.301-.748.562-1.05.944-.33.358-.656.734-.909 1.162C11.063 8.404 10.863 8.909 10.714 9.428c-.142.515-.302 1.033-.339 1.571-.043.522-.043 1.056-.008 1.571.048.517.144 1.045.267 1.545.127.544.28 1.06.478 1.544.216.479.457.916.785 1.351.323.435.674.834 1.057 1.175.384.344.748.655 1.142.916.846.569 1.859.866 2.77.936.752.058 1.347-.009 1.719-.083.37-.084.609-.199.609-.199l-.125-.972c0 0-.411.103-.916.145-.502.044-1.171.025-1.854-.099-.656-.122-1.33-.341-1.91-.65-.583-.304-1.085-.678-1.464-1.13-.375-.45-.692-.965-.903-1.512-.209-.542-.357-1.128-.403-1.722-.044-.596 0-1.197.145-1.774.145-.6.338-1.148.637-1.676.3-.527.662-.962 1.072-1.36.443-.419.916-.723 1.417-.964.273-.121.559-.217.834-.33l.125-.052c.045-.024.125-.055.186-.083.051-.025.311-.11.462-.142.151-.033.346-.104.731-.158 1.614-.253 2.496-.303 2.496-.303l.031-.907c0 0-.151.023-.411.055-.259.034-.661.055-1.09.164-.22.057-.442.095-.673.19l-.301.118c-.129.049-.218.104-.336.169-.257.134-.497.248-.726.43-.223.18-.414.343-.598.542-.185.2-.421.384-.53.645-.131.25-.302.577-.362.878-.113.555-.169 1.323-.061 1.932.108.613.303 1.95.732 1.39.171-.235.265-.539.423-.841.138-.302.321-.601.532-.846.216-.255.458-.483.692-.735.223-.237.479-.483.747-.655.268-.173.522-.359.819-.508.31-.189.611-.263.907-.39.577-.215 1.125-.254 1.125-.254L18.952 6c0 0-.76.184-1.514.335-.749.149-1.667.452-2.36.816-.233.144-.451.312-.653.446-.21.159-.371.312-.519.495-.138.171-.294.336-.375.504-.092.168-.142.487-.205.69-.033.218-.046.411-.046.609C13.28 9.662 13.844 10 14.5 10z"/>
                        </svg>
                    </div>
                    
                    <!-- Testimonial Content -->
                    <div class="h-64 flex flex-col justify-center">
                        <template x-for="(testimonial, index) in testimonials" :key="index">
                            <div 
                                x-show="activeSlide === index"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform translate-x-8"
                                x-transition:enter-end="opacity-100 transform translate-x-0"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100 transform translate-x-0"
                                x-transition:leave-end="opacity-0 transform -translate-x-8"
                                class="flex flex-col items-center text-center"
                            >
                                <p class="text-xl text-gray-700 italic mb-8" x-text="testimonial.quote"></p>
                                <div class="flex items-center">
                                    <img :src="testimonial.avatar" :alt="testimonial.name" class="w-12 h-12 rounded-full object-cover border-2 border-yellow-300">
                                    <div class="ml-4 text-left">
                                        <h4 class="font-bold text-gray-900" x-text="testimonial.name"></h4>
                                        <p class="text-sm text-gray-600" x-text="testimonial.title"></p>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                    
                    <!-- Navigation Dots -->
                    <div class="flex justify-center mt-8 space-x-2">
                        <template x-for="(testimonial, index) in testimonials" :key="index">
                            <button 
                                @click="activeSlide = index" 
                                :class="{'bg-yellow-400': activeSlide === index, 'bg-gray-300': activeSlide !== index}"
                                class="w-3 h-3 rounded-full transition-colors duration-300 focus:outline-none"
                            ></button>
                        </template>
                    </div>
                    
                    <!-- Navigation Arrows -->
                    <button 
                        @click="activeSlide = activeSlide === 0 ? testimonials.length - 1 : activeSlide - 1" 
                        class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-white rounded-full p-2 shadow-md text-gray-800 hover:text-yellow-500 focus:outline-none hidden md:block"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button 
                        @click="activeSlide = activeSlide === testimonials.length - 1 ? 0 : activeSlide + 1" 
                        class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-white rounded-full p-2 shadow-md text-gray-800 hover:text-yellow-500 focus:outline-none hidden md:block"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- FAQ Section with Improved Accordion -->
    <div class="bg-white py-16 md:py-24 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div 
                class="text-center mb-16"
                x-intersect:enter="$el.classList.add('animate-fade-in-up')"
            >
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Frequently Asked Questions</h2>
                <div class="mt-3 w-24 h-1 bg-yellow-400 mx-auto rounded-full"></div>
                <p class="mt-4 text-lg text-gray-600">Everything you need to know about our services</p>
            </div>

            <div 
                class="space-y-6" 
                x-data="{ selected: null }"
                x-intersect:enter="$el.classList.add('animate-fade-in-up')"
                x-intersect:enter.delay="300"
            >
                @foreach ($faq as $index => $Faq)
                <div
                    class="overflow-hidden bg-white rounded-xl border border-gray-200 shadow-sm transition-all duration-200"
                    :class="{ 'shadow-md shadow-yellow-100 border-yellow-200': selected === {{ $index }} }"
                >
                    <button
                        @click="selected !== {{ $index }} ? selected = {{ $index }} : selected = null"
                        class="flex justify-between items-center w-full px-6 py-5 text-left"
                        :class="{ 'text-yellow-600': selected === {{ $index }}, 'text-gray-900': selected !==
                                {{ $index }} }"
                    >
                        <span class="text-lg font-medium">{{ $Faq['question'] }}</span>
                        <svg 
                            class="h-6 w-6 transform transition-transform duration-300"
                            :class="{ 'rotate-180 text-yellow-500': selected === {{ $index }}, 'text-gray-400': selected !== {{ $index }} }" 
                            fill="none"
                            viewBox="0 0 24 24" 
                            stroke="currentColor"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div 
                        x-show="selected === {{ $index }}" 
                        x-collapse 
                        x-cloak
                        class="px-6 pb-5 text-gray-600"
                    >
                        <div class="border-t border-gray-200 pt-4">
                            {{ $Faq['answer'] }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-gradient-to-r from-yellow-400 to-yellow-300 py-16 md:py-20 relative overflow-hidden">
        <!-- Decorative elements -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-yellow-300 rounded-full opacity-30 transform translate-x-1/3 -translate-y-1/3 blur-2xl"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-yellow-500 rounded-full opacity-20 transform -translate-x-1/3 translate-y-1/3 blur-2xl"></div>
        
        <div 
            class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10"
            x-data="{}"
            x-intersect:enter="$el.classList.add('animate-fade-in-up')"
        >
            <div class="bg-white rounded-2xl overflow-hidden shadow-xl">
                <div class="px-6 py-12 sm:px-12 lg:py-16 lg:px-16 flex flex-col md:flex-row items-center justify-between">
                    <div class="text-center md:text-left mb-8 md:mb-0">
                        <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Ready to get started?</h2>
                        <p class="mt-4 text-xl text-gray-600">Join thousands of satisfied customers today.</p>
                        <div class="mt-6 flex flex-wrap gap-2 justify-center md:justify-start">
                            <div class="flex items-center">
                                <svg class="h-5 w-5 text-yellow-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-gray-700">Fast delivery</span>
                            </div>
                            <div class="flex items-center ml-4">
                                <svg class="h-5 w-5 text-yellow-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-gray-700">High quality</span>
                            </div>
                            <div class="flex items-center ml-4">
                                <svg class="h-5 w-5 text-yellow-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-gray-700">Money-back guarantee</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col space-y-4 w-full md:w-auto">
                        <a href="index"
                            class="inline-flex justify-center items-center px-8 py-4 rounded-xl bg-yellow-400 hover:bg-yellow-500 text-gray-900 text-lg font-bold shadow-lg hover:shadow-xl transform transition-all duration-200 hover:-translate-y-1">
                            Order Now
                            <svg class="ml-2 w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <a href="/contact" class="text-center text-gray-600 hover:text-yellow-600 transition-colors">
                            Contact us for custom requirements
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Animation Styles -->
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
        
        /* For the pricing toggle animation */
        [x-cloak] { 
            display: none !important; 
        }
    </style>
</x-layout>