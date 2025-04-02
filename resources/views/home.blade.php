<x-layout>
    <!-- Hero Section with Animation and Graphics -->
    <div class="relative bg-gradient-to-b from-yellow-400 to-yellow-500 min-h-screen overflow-hidden">
        <!-- Animated Floating Elements (GTA-style icons) -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-16 h-16 opacity-20 animate-bounce-slow">
                <svg viewBox="0 0 24 24" fill="currentColor" class="text-black w-full h-full">
                    <path d="M21 11c0 5.55-3.84 10.74-9 12-5.16-1.26-9-6.45-9-12V5l9-4 9 4v6z"></path>
                </svg>
            </div>
            <div class="absolute bottom-32 right-16 w-20 h-20 opacity-20 animate-pulse">
                <svg viewBox="0 0 24 24" fill="currentColor" class="text-black w-full h-full">
                    <path d="M12 1v3H3v10h3v7l7-7h4l4-4V1z"></path>
                </svg>
            </div>
            <div class="absolute top-1/2 left-1/4 w-12 h-12 opacity-20 animate-spin-slow">
                <svg viewBox="0 0 24 24" fill="currentColor" class="text-black w-full h-full">
                    <path d="M22 12c0 5.5-4.5 10-10 10S2 17.5 2 12 6.5 2 12 2s10 4.5 10 10zM12 8V6m0 12v-2m-4-4H6m12 0h-2"></path>
                </svg>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col items-center justify-center text-center px-4 py-16 min-h-screen relative z-10">
            <!-- Styled Heading with Highlight Effect -->
            <div class="relative mb-8">
                <h1 class="text-5xl md:text-7xl font-extrabold mb-3 text-black tracking-tight">
                    Make Your <span class="relative inline-block">
                        <span class="relative z-10">Custom Skin</span>
                        <span class="absolute -bottom-2 left-0 right-0 h-4 bg-black opacity-10 rounded-lg transform -rotate-1"></span>
                    </span>
                </h1>
                <div class="w-24 h-1 bg-black mx-auto rounded-full mb-6 animate-pulse"></div>
            </div>

            <!-- Feature Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mb-12">
                <div class="bg-yellow-200 bg-opacity-25 backdrop-filter backdrop-blur-sm p-6 rounded-xl shadow-xl border border-gray-800 border-opacity-20 transform transition-all duration-300 hover:scale-105">
                    <div class="w-12 h-12 bg-black bg-opacity-75 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Custom Skins</h3>
                    <p class="text-black text-opacity-75">Create unique characters that stand out in San Andreas</p>
                </div>
                
                <div class="bg-yellow-200 bg-opacity-25 backdrop-filter backdrop-blur-sm p-6 rounded-xl shadow-xl border border-gray-800 border-opacity-20 transform transition-all duration-300 hover:scale-105">
                    <div class="w-12 h-12 bg-black bg-opacity-75 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Retexturing</h3>
                    <p class="text-black text-opacity-75">Professional texture modifications for vehicles, objects, and environments</p>
                </div>
                
                <div class="bg-yellow-200 bg-opacity-25 backdrop-filter backdrop-blur-sm p-6 rounded-xl shadow-xl border border-gray-800 border-opacity-20 transform transition-all duration-300 hover:scale-105">
                    <div class="w-12 h-12 bg-black bg-opacity-75 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Head Swapping</h3>
                    <p class="text-black text-opacity-75">Create characters with custom facial features and unique looks</p>
                </div>
            </div>

            <!-- Enhanced Descriptive Text -->
            <div class="text-xl md:text-2xl text-black max-w-2xl mb-10 bg-yellow-200 bg-opacity-10 backdrop-filter backdrop-blur-sm p-6 rounded-xl">
                <p class="leading-relaxed">
                    Create your own GTA SA skin here now! <br>
                    We also offer retexturing, environment creation <br>
                    and head swapping services!
                </p>
            </div>

            <!-- Call to Action with Animation -->
            <div class="relative group">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-yellow-600 to-black opacity-75 rounded-full blur group-hover:opacity-100 transition duration-300"></div>
                <a href="login"
                   class="relative inline-flex items-center px-12 py-5 bg-black text-white text-2xl font-bold rounded-full hover:bg-opacity-90 transition-all duration-300 shadow-lg group-hover:shadow-2xl">
                    <span class="mr-3">Order Now!</span>
                    <svg class="w-6 h-6 animate-bounce-slow" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>

            <!-- Social Proof Section -->
            <div class="mt-16 max-w-4xl">
                <div class="flex flex-wrap justify-center gap-4 mb-8">
                    <div class="bg-yellow-200 bg-opacity-20 backdrop-filter backdrop-blur-sm py-2 px-4 rounded-full">
                        <span class="text-black font-semibold">⭐ Cheapest Price</span>
                    </div>
                    <div class="bg-yellow-200 bg-opacity-20 backdrop-filter backdrop-blur-sm py-2 px-4 rounded-full">
                        <span class="text-black font-semibold">🏆 Good Quality</span>
                    </div>
                    <div class="bg-yellow-200 bg-opacity-20 backdrop-filter backdrop-blur-sm py-2 px-4 rounded-full">
                        <span class="text-black font-semibold">⚡ Fast Respons</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Styles For Animation -->
    <style>
        @keyframes bounce-slow {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-15px);
            }
        }
        @keyframes spin-slow {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }
        .animate-bounce-slow {
            animation: bounce-slow 3s infinite;
        }
        .animate-spin-slow {
            animation: spin-slow 8s linear infinite;
        }
    </style>
</x-layout>