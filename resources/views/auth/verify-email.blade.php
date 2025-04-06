<x-layout>
    <div class="container mx-auto px-4 py-12 max-w-md">
        <div class="bg-gradient-to-br from-yellow-200 to-yellow-300 p-6 rounded-xl shadow-xl border border-yellow-400 relative overflow-hidden">
            <!-- Background pattern -->
            <div class="absolute -right-6 -top-6 w-24 h-24 rounded-full bg-gray-900 opacity-10"></div>
            <div class="absolute -left-10 -bottom-10 w-32 h-32 rounded-full bg-gray-800 opacity-5"></div>
            
            <div class="relative">
                <!-- Header section -->
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-yellow-400 shadow-lg mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900">Email Verification</h2>
                    <div class="w-16 h-1 bg-gray-800 mx-auto mt-2 rounded-full"></div>
                </div>
                
                <!-- Notification -->
                @if (session('message'))
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" 
                        class="bg-white bg-opacity-90 text-green-700 p-4 mb-6 rounded-lg border-l-4 border-green-500 flex items-center justify-between backdrop-filter backdrop-blur-sm">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="font-medium">{{ session('message') }}</span>
                        </div>
                        <button @click="show = false" class="text-gray-400 hover:text-gray-600 transition duration-150">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                @endif
                
                <!-- Content card -->
                <div class="bg-white rounded-lg p-5 mb-6 shadow-lg border border-gray-100">
                    <div class="flex items-start">
                        <div class="bg-gray-900 rounded-full p-1 mr-3 mt-1 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <p class="mb-4 text-gray-800 leading-relaxed">Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you?</p>
                    </div>
                    <div class="flex items-start">
                        <div class="bg-gray-800 rounded-full p-1 mr-3 mt-1 flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <p class="text-gray-700">If you didn't receive the email, we will gladly send you another.</p>
                    </div>
                </div>
                
                <!-- Action button -->
                <div x-data="{ loading: false }">
                    <form method="POST" action="{{ route('verification.send') }}" @submit="loading = true">
                        @csrf
                        <button type="submit" 
                            class="w-full bg-gray-800 text-yellow-300 py-3 px-4 rounded-lg font-medium
                            hover:bg-gray-700 transform hover:-translate-y-1 transition duration-200 
                            focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-opacity-50
                            shadow-lg flex items-center justify-center"
                            :class="{ 'opacity-75 cursor-wait': loading }">
                            <span x-show="!loading" class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg>
                                Resend Verification Email
                            </span>
                            <span x-show="loading" class="flex items-center">
                                <svg class="animate-spin -ml-1 mr-2 h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Sending...
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>