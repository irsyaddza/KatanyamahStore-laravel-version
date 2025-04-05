<x-layout>
    <!-- Hero Section with animated gradient background -->
    <div class="relative bg-gradient-to-r from-yellow-400 via-yellow-300 to-yellow-400 bg-animate">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">
            <div class="text-center" 
                 x-data="{ show: false }" 
                 x-init="setTimeout(() => show = true, 200)">
                <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl"
                    x-show="show"
                    x-transition:enter="transition ease-out duration-700"
                    x-transition:enter-start="opacity-0 transform -translate-y-4"
                    x-transition:enter-end="opacity-100 transform translate-y-0">
                    Get In Touch</h1>
                <p class="mt-5 max-w-xl mx-auto text-xl text-gray-800"
                   x-show="show"
                   x-transition:enter="transition ease-out duration-700 delay-300"
                   x-transition:enter-start="opacity-0"
                   x-transition:enter-end="opacity-100">
                    We'd love to hear from you. Reach out through any of these channels.
                </p>
            </div>
            
            <!-- Animated wave divider -->
            <div class="absolute bottom-0 left-0 right-0 overflow-hidden">
                <svg class="w-full h-16 text-white" viewBox="0 0 1440 80" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0,64L80,58.7C160,53,320,43,480,48C640,53,800,75,960,74.7C1120,75,1280,53,1360,42.7L1440,32L1440,80L1360,80C1280,80,1120,80,960,80C800,80,640,80,480,80C320,80,160,80,80,80L0,80Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Contact Form Section -->
    <div class="bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="lg:grid lg:grid-cols-2 lg:gap-16 mb-20">
                <!-- Contact Information with hover effects -->
                <div x-data="{ activeCard: null }" class="mb-12 lg:mb-0">
                    <h2 class="text-3xl font-extrabold text-gray-900 mb-8 relative inline-block">
                        Contact Information
                        <span class="absolute bottom-0 left-0 w-1/2 h-1 bg-yellow-400"></span>
                    </h2>
                    
                    <p class="mt-4 text-lg text-gray-700 mb-10">
                        Have questions about our services or want to collaborate? Contact
                        us directly using the information below.
                    </p>
                    
                    @foreach ($contact as $Contact)
                    <div class="space-y-6 mb-10">
                        <!-- Email Card -->
                        <div class="bg-white rounded-lg shadow-lg p-6 transform transition duration-300 hover:scale-105"
                             @mouseenter="activeCard = 'email'"
                             @mouseleave="activeCard = null"
                             :class="{ 'border-l-4 border-yellow-400': activeCard === 'email' }">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-12 w-12 bg-yellow-100 rounded-full flex items-center justify-center">
                                    <svg class="h-6 w-6 text-yellow-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-medium text-gray-900">Email Us</h3>
                                    <p class="mt-1 text-gray-600">{{ $Contact['email'] }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Phone Card -->
                        <div class="bg-white rounded-lg shadow-lg p-6 transform transition duration-300 hover:scale-105"
                             @mouseenter="activeCard = 'phone'"
                             @mouseleave="activeCard = null"
                             :class="{ 'border-l-4 border-yellow-400': activeCard === 'phone' }">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-12 w-12 bg-yellow-100 rounded-full flex items-center justify-center">
                                    <svg class="h-6 w-6 text-yellow-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-medium text-gray-900">Call Us</h3>
                                    <p class="mt-1 text-gray-600">{{ $Contact['phone'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- Social Media Links with animations -->
                    <div x-data="{ activeIcon: null }">
                        <h3 class="text-xl font-bold text-gray-900 mb-6">Connect with us</h3>
                        <div class="flex space-x-8">
                            <!-- GitHub -->
                            <a href="https://github.com/irsyaddza" 
                               class="group relative" 
                               @mouseenter="activeIcon = 'github'" 
                               @mouseleave="activeIcon = null">
                                <div class="h-12 w-12 bg-gray-100 rounded-full flex items-center justify-center transform transition duration-300 group-hover:bg-gray-800 group-hover:scale-110"
                                     :class="{ 'bg-gray-800': activeIcon === 'github' }">
                                    <svg class="h-6 w-6 text-gray-800 group-hover:text-white transition duration-300"
                                         :class="{ 'text-white': activeIcon === 'github' }"
                                         fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="absolute top-full left-1/2 transform -translate-x-1/2 mt-2 text-sm text-gray-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">GitHub</span>
                            </a>

                            <!-- Discord -->
                            <a href="https:bit.ly/OderSkinSAMP" 
                               class="group relative"
                               @mouseenter="activeIcon = 'discord'" 
                               @mouseleave="activeIcon = null">
                                <div class="h-12 w-12 bg-gray-100 rounded-full flex items-center justify-center transform transition duration-300 group-hover:bg-indigo-600 group-hover:scale-110"
                                     :class="{ 'bg-indigo-600': activeIcon === 'discord' }">
                                    <svg class="h-6 w-6 text-gray-800 group-hover:text-white transition duration-300"
                                         :class="{ 'text-white': activeIcon === 'discord' }"
                                         fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path
                                            d="M20.317 4.3698a19.7913 19.7913 0 00-4.8851-1.5152.0741.0741 0 00-.0785.0371c-.211.3753-.4447.8648-.6083 1.2495-1.8447-.2762-3.68-.2762-5.4868 0-.1636-.3847-.4058-.8742-.6177-1.2495a.077.077 0 00-.0785-.037 19.7363 19.7363 0 00-4.8852 1.515.0699.0699 0 00-.0321.0277C.5334 9.0458-.319 13.5799.0992 18.0578a.0824.0824 0 00.0312.0561c2.0528 1.5076 4.0413 2.4228 5.9929 3.0294a.0777.0777 0 00.0842-.0276c.4616-.6304.8731-1.2952 1.226-1.9942a.076.076 0 00-.0416-.1057c-.6528-.2476-1.2743-.5495-1.8722-.8923a.077.077 0 01-.0076-.1277c.1258-.0943.2517-.1923.3718-.2914a.0743.0743 0 01.0776-.0105c3.9278 1.7933 8.18 1.7933 12.0614 0a.0739.0739 0 01.0785.0095c.1202.099.246.1981.3728.2924a.077.077 0 01-.0066.1276 12.2986 12.2986 0 01-1.873.8914.0766.0766 0 00-.0407.1067c.3604.698.7719 1.3628 1.225 1.9932a.076.076 0 00.0842.0286c1.961-.6067 3.9495-1.5219 6.0023-3.0294a.077.077 0 00.0313-.0552c.5004-5.177-.8382-9.6739-3.5485-13.6604a.061.061 0 00-.0312-.0286zM8.02 15.3312c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9555-2.4189 2.157-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.9555 2.4189-2.1569 2.4189zm7.9748 0c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9554-2.4189 2.1569-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.946 2.4189-2.1568 2.4189Z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="absolute top-full left-1/2 transform -translate-x-1/2 mt-2 text-sm text-gray-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">Discord</span>
                            </a>

                            <!-- Instagram -->
                            <a href="https://instagram.com/_irsyad.za" 
                               class="group relative"
                               @mouseenter="activeIcon = 'instagram'" 
                               @mouseleave="activeIcon = null">
                                <div class="h-12 w-12 bg-gray-100 rounded-full flex items-center justify-center transform transition duration-300 group-hover:bg-gradient-to-tr from-yellow-500 via-red-500 to-purple-600 group-hover:scale-110"
                                     :class="{ 'bg-gradient-to-tr from-yellow-500 via-red-500 to-purple-600': activeIcon === 'instagram' }">
                                    <svg class="h-6 w-6 text-gray-800 group-hover:text-white transition duration-300"
                                         :class="{ 'text-white': activeIcon === 'instagram' }"
                                         fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="absolute top-full left-1/2 transform -translate-x-1/2 mt-2 text-sm text-gray-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">Instagram</span>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Form with animations -->
                <div x-data="{ 
                    formData: { name: '', email: '', message: '' },
                    errors: { name: false, email: false, message: false },
                    submitted: false,
                    validateEmail(email) {
                        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
                    },
                    submitForm() {
                        // Reset errors
                        this.errors = { name: false, email: false, message: false };
                        
                        // Validate
                        if (!this.formData.name) this.errors.name = true;
                        if (!this.formData.email || !this.validateEmail(this.formData.email)) this.errors.email = true;
                        if (!this.formData.message) this.errors.message = true;
                        
                        // If form is valid
                        if (!this.errors.name && !this.errors.email && !this.errors.message) {
                            // Simulate form submission
                            setTimeout(() => {
                                this.submitted = true;
                                this.formData = { name: '', email: '', message: '' };
                                setTimeout(() => this.submitted = false, 5000);
                            }, 1000);
                        }
                    }
                }" class="bg-white rounded-lg shadow-xl p-8">
                    <div x-show="!submitted">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Send us a message</h2>
                        
                        <form @submit.prevent="submitForm">
                            <div class="mb-6" 
                                 x-data="{ focused: false }"
                                 :class="{ 'transform transition-all duration-300': true }">
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                                    Your Name
                                </label>
                                <input type="text" 
                                       id="name" 
                                       x-model="formData.name"
                                       @focus="focused = true"
                                       @blur="focused = false"
                                       :class="{ 
                                           'w-full px-4 py-3 border rounded-lg outline-none transition-all duration-300': true,
                                           'border-gray-300 focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400': !errors.name,
                                           'border-red-500 bg-red-50': errors.name,
                                           'ring-2 ring-yellow-400 border-yellow-400': focused
                                       }"
                                       placeholder="John Doe">
                                <p x-show="errors.name" class="mt-1 text-sm text-red-600">Please enter your name</p>
                            </div>
                            
                            <div class="mb-6"
                                 x-data="{ focused: false }"
                                 :class="{ 'transform transition-all duration-300': true }">
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                                    Your Email
                                </label>
                                <input type="email" 
                                       id="email" 
                                       x-model="formData.email"
                                       @focus="focused = true"
                                       @blur="focused = false"
                                       :class="{ 
                                           'w-full px-4 py-3 border rounded-lg outline-none transition-all duration-300': true,
                                           'border-gray-300 focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400': !errors.email,
                                           'border-red-500 bg-red-50': errors.email,
                                           'ring-2 ring-yellow-400 border-yellow-400': focused
                                       }"
                                       placeholder="john@example.com">
                                <p x-show="errors.email" class="mt-1 text-sm text-red-600">Please enter a valid email address</p>
                            </div>
                            
                            <div class="mb-6"
                                 x-data="{ focused: false }"
                                 :class="{ 'transform transition-all duration-300': true }">
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-1">
                                    Your Message
                                </label>
                                <textarea id="message" 
                                          rows="4" 
                                          x-model="formData.message"
                                          @focus="focused = true"
                                          @blur="focused = false"
                                          :class="{ 
                                              'w-full px-4 py-3 border rounded-lg outline-none transition-all duration-300': true,
                                              'border-gray-300 focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400': !errors.message,
                                              'border-red-500 bg-red-50': errors.message,
                                              'ring-2 ring-yellow-400 border-yellow-400': focused
                                          }"
                                          placeholder="Your message here..."></textarea>
                                <p x-show="errors.message" class="mt-1 text-sm text-red-600">Please enter your message</p>
                            </div>
                            
                            <div>
                                <button type="submit" 
                                        class="w-full bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-bold py-3 px-6 rounded-lg transform transition duration-300 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50">
                                    Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Success message -->
                    <div x-show="submitted" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         class="text-center py-12">
                        <div class="inline-flex items-center justify-center w-16 h-16 mb-6 rounded-full bg-green-100">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">Message Sent!</h3>
                        <p class="text-gray-600">Thank you for reaching out. We'll get back to you as soon as possible.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <style>
        .bg-animate {
            background-size: 200% 200%;
            animation: gradient 5s ease infinite;
        }
        
        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
    </style>
</x-layout>