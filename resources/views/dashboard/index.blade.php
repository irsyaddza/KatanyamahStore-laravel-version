<x-userdashboard>
    <div class="min-h-screen">
        
        <!-- Main Content - More compact -->
        <main class="max-w-5xl mx-auto px-4 py-6">
            <!-- Welcome Card - Simplified -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                <div class="bg-yellow-600 px-4 py-5">
                    <div class="text-center">
                        <h2 class="text-2xl font-bold text-white">Welcome</h2>
                        <div class="w-16 h-1 bg-white mx-auto my-2"></div>
                        <p class="text-yellow-100 text-base">
                            Your one-stop shop for all your needs
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Order Buttons - Stacked for mobile -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                <div class="px-4 py-5 flex flex-col items-center">
                    <div class="bg-yellow-500 rounded-full p-3 mb-3 shadow-sm">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-yellow-600 mb-3">Ready to Shop?</h3>
                    
                    <div class="flex flex-col w-full space-y-3">
                        <a href="/dashboard/user/makeorder" 
                           class="flex justify-center items-center px-4 py-3 text-base font-medium rounded-lg text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-300 transition-colors duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Make Order
                        </a>
                        
                        <a href="/dashboard/user/myorder" 
                           class="flex justify-center items-center px-4 py-3 text-base font-medium rounded-lg text-yellow-700 bg-yellow-100 hover:bg-yellow-200 focus:outline-none focus:ring-2 focus:ring-yellow-300 transition-colors duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            My Orders
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Quick Info - Mobile friendly -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="grid grid-cols-2 divide-x divide-yellow-100">
                    <a href="/contact" class="text-center p-4 hover:bg-yellow-50">
                        <svg class="w-6 h-6 mx-auto mb-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <span class="text-sm font-medium text-gray-600">Contact Us</span>
                    </a>
                    <a href="/pricing" class="text-center p-4 hover:bg-yellow-50">
                        <svg class="w-6 h-6 mx-auto mb-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-sm font-medium text-gray-600">Help & FAQ</span>
                    </a>
                </div>
            </div>
        </main>
    </div>
</x-userdashboard>