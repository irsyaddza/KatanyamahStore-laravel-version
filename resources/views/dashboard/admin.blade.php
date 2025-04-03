<x-dashboard>
    <div 
        x-data="{ 
            currentTime: new Date().toLocaleTimeString(),
            currentDate: new Date().toLocaleDateString('id-ID', {weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'}),
            stats: [
                { label: 'Total Users', value: '1,284', icon: 'users' },
                { label: 'Revenue', value: 'Rp 7,842,500', icon: 'currency' },
                { label: 'Orders', value: '268', icon: 'shopping-cart' },
                { label: 'Conversion', value: '5.28%', icon: 'chart' }
            ]
        }"
        x-init="setInterval(() => { currentTime = new Date().toLocaleTimeString() }, 1000)"
        class="flex-1 overflow-auto bg-yellow-400"
    >
        <!-- Header Section -->
        <div class="bg-yellow-500 shadow-md">
            <div class="max-w-7xl mx-auto p-4 sm:p-6">
                <div class="flex flex-col md:flex-row md:items-center justify-between">
                    <div>
                        <div class="inline-flex items-center space-x-2">
                            <div class="bg-white rounded-full w-3 h-3 animate-pulse"></div>
                            <h1 class="text-2xl font-bold text-white">Admin Control Panel</h1>
                        </div>
                        <p class="text-yellow-100 mt-1">Manage your business efficiently</p>
                    </div>
                    <div class="mt-4 md:mt-0 flex flex-col items-end">
                        <div class="text-white font-medium" x-text="currentDate"></div>
                        <div class="text-white font-mono" x-text="currentTime"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto p-3 sm:p-6">
            <!-- Welcome Banner -->
            <div 
                x-data="{ show: true }" 
                x-show="show" 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform -translate-y-4"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                class="bg-yellow-600 text-white rounded-lg shadow-md mb-8 relative overflow-hidden"
            >
                <button 
                    @click="show = false" 
                    class="absolute top-3 right-3 text-yellow-100 hover:text-white"
                    aria-label="Close banner"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="p-6 flex flex-col md:flex-row items-center">
                    <div class="flex-shrink-0 mr-4 mb-4 md:mb-0">
                        <div class="bg-yellow-300 rounded-full p-3 shadow-inner">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-white">Welcome to the Admin Dashboard</h2>
                        <p class="text-yellow-100 mt-1">You now have full access to manage your business operations.</p>
                    </div>
                    <div class="mt-4 md:mt-0 md:ml-auto">
                        <button class="bg-yellow-300 hover:bg-yellow-200 text-yellow-800 px-4 py-2 rounded-md shadow-sm font-medium transition duration-150 ease-in-out">
                            Get Started
                        </button>
                    </div>
                </div>
                <div class="h-1 bg-gradient-to-r from-yellow-300 to-yellow-200"></div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-8">
                <template x-for="(stat, index) in stats" :key="index">
                    <div 
                        class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300"
                        :class="{ 
                            'border-l-4 border-yellow-400': index === 0,
                            'border-l-4 border-green-400': index === 1,
                            'border-l-4 border-blue-400': index === 2,
                            'border-l-4 border-purple-400': index === 3
                        }"
                    >
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div 
                                        class="rounded-md p-3"
                                        :class="{
                                            'bg-yellow-100 text-yellow-600': index === 0,
                                            'bg-green-100 text-green-600': index === 1,
                                            'bg-blue-100 text-blue-600': index === 2,
                                            'bg-purple-100 text-purple-600': index === 3
                                        }"
                                    >
                                        <svg x-show="stat.icon === 'users'" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                        <svg x-show="stat.icon === 'currency'" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <svg x-show="stat.icon === 'shopping-cart'" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        <svg x-show="stat.icon === 'chart'" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate" x-text="stat.label"></dt>
                                        <dd>
                                            <div class="text-lg font-bold text-gray-900" x-text="stat.value"></div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-5 py-3">
                            <div class="text-sm">
                                <a href="#" class="font-medium text-yellow-600 hover:text-yellow-700 transition">
                                    View details &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <!-- Quick Action Cards -->
            <div class="mb-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Quick Actions</h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3 sm:gap-4">
                    <div class="bg-white rounded-lg shadow-md p-3 sm:p-6 text-center hover:shadow-lg transition-shadow duration-300 hover:bg-yellow-50 cursor-pointer group">
                        <div class="inline-flex items-center justify-center p-3 bg-yellow-100 rounded-full text-yellow-500 mb-4 group-hover:bg-yellow-200 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </div>
                        <h3 class="font-medium text-gray-700 group-hover:text-gray-900">Add Product</h3>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition-shadow duration-300 hover:bg-yellow-50 cursor-pointer group">
                        <div class="inline-flex items-center justify-center p-3 bg-yellow-100 rounded-full text-yellow-500 mb-4 group-hover:bg-yellow-200 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </div>
                        <h3 class="font-medium text-gray-700 group-hover:text-gray-900">New Order</h3>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition-shadow duration-300 hover:bg-yellow-50 cursor-pointer group">
                        <div class="inline-flex items-center justify-center p-3 bg-yellow-100 rounded-full text-yellow-500 mb-4 group-hover:bg-yellow-200 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h3 class="font-medium text-gray-700 group-hover:text-gray-900">Manage Users</h3>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition-shadow duration-300 hover:bg-yellow-50 cursor-pointer group">
                        <div class="inline-flex items-center justify-center p-3 bg-yellow-100 rounded-full text-yellow-500 mb-4 group-hover:bg-yellow-200 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                        </div>
                        <h3 class="font-medium text-gray-700 group-hover:text-gray-900">Reports</h3>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition-shadow duration-300 hover:bg-yellow-50 cursor-pointer group">
                        <div class="inline-flex items-center justify-center p-3 bg-yellow-100 rounded-full text-yellow-500 mb-4 group-hover:bg-yellow-200 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                        </div>
                        <h3 class="font-medium text-gray-700 group-hover:text-gray-900">Payments</h3>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow-md p-6 text-center hover:shadow-lg transition-shadow duration-300 hover:bg-yellow-50 cursor-pointer group">
                        <div class="inline-flex items-center justify-center p-3 bg-yellow-100 rounded-full text-yellow-500 mb-4 group-hover:bg-yellow-200 transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h3 class="font-medium text-gray-700 group-hover:text-gray-900">Settings</h3>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Section -->
            <div 
                x-data="{ activeTab: 'recent' }"
                class="bg-yellow-50 rounded-lg shadow-md overflow-hidden mb-8"
            >
                <div class="border-b border-gray-200">
                    <nav class="flex -mb-px">
                        <button 
                            @click="activeTab = 'recent'" 
                            :class="{'text-yellow-600 border-yellow-500': activeTab === 'recent', 'text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300': activeTab !== 'recent'}"
                            class="py-3 sm:py-4 px-2 sm:px-6 border-b-2 font-medium text-xs sm:text-sm flex-1 text-center focus:outline-none transition"
                        >
                            Recent Activity
                        </button>
                        <button 
                            @click="activeTab = 'notifications'" 
                            :class="{'text-yellow-600 border-yellow-500': activeTab === 'notifications', 'text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300': activeTab !== 'notifications'}"
                            class="py-3 sm:py-4 px-2 sm:px-6 border-b-2 font-medium text-xs sm:text-sm flex-1 text-center focus:outline-none transition"
                        >
                            Notifications
                        </button>
                        <button 
                            @click="activeTab = 'messages'" 
                            :class="{'text-yellow-600 border-yellow-500': activeTab === 'messages', 'text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300': activeTab !== 'messages'}"
                            class="py-3 sm:py-4 px-2 sm:px-6 border-b-2 font-medium text-xs sm:text-sm flex-1 text-center focus:outline-none transition"
                        >
                            Messages
                        </button>
                    </nav>
                </div>
                
                <div class="p-3 sm:p-6">
                    <div x-show="activeTab === 'recent'">
                        <ul class="divide-y divide-gray-200">
                            <li class="py-3">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 bg-yellow-100 rounded-full p-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900">New order received</p>
                                        <p class="text-sm text-gray-500">Order #12345 from John Doe</p>
                                        <span class="text-xs text-gray-400">2 minutes ago</span>
                                    </div>
                                </div>
                            </li>
                            <li class="py-3">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 bg-green-100 rounded-full p-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900">Payment successful</p>
                                        <p class="text-sm text-gray-500">Rp 2,500,000 received from Maria Rodriguez</p>
                                        <span class="text-xs text-gray-400">15 minutes ago</span>
                                    </div>
                                </div>
                            </li>
                            <li class="py-3">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 bg-blue-100 rounded-full p-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-900">New user registered</p>
                                        <p class="text-sm text-gray-500">User #1087 - Alex Johnson</p>
                                        <span class="text-xs text-gray-400">1 hour ago</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="mt-4 text-center">
                            <a href="#" class="text-sm font-medium text-yellow-600 hover:text-yellow-700">View all activity</a>
                        </div>
                    </div>
                    
                    <div x-show="activeTab === 'notifications'" class="text-center py-12">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No new notifications</h3>
                        <p class="mt-1 text-sm text-gray-500">You're all caught up! Check back later for updates.</p>
                    </div>
                    
                    <div x-show="activeTab === 'messages'" class="text-center py-12">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No unread messages</h3>
                        <p class="mt-1 text-sm text-gray-500">All messages have been read. Check back later.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard>