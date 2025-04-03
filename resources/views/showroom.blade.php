<x-layout>
    <div 
        x-data="{ 
            showFilter: false,
            availabilityFilter: 'all',
            filteredProducts: []
        }"
        x-init="filteredProducts = []"
        class="container mx-auto px-4 py-6 lg:py-12"
    >
        <!-- Header Section with animated underline -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 tracking-tight">
                Our Collection
            </h1>
            <div class="w-16 md:w-24 h-1 bg-yellow-400 mx-auto my-4 rounded-full"></div>
            <p class="mt-3 max-w-xl mx-auto text-base md:text-lg text-gray-700">
                Discover our exclusive collection of premium products designed just for you.
            </p>
        </div>

        <!-- Mobile filter button -->
        <div class="lg:hidden mb-4 px-4">
            <button 
                @click="showFilter = !showFilter" 
                class="w-full flex items-center justify-between px-4 py-2 bg-yellow-100 rounded-lg border border-yellow-200 text-gray-700"
            >
                <span class="font-medium">Filter Products</span>
                <svg 
                    :class="{'rotate-180': showFilter}"
                    class="w-5 h-5 transition-transform duration-200" 
                    fill="none" 
                    stroke="currentColor" 
                    viewBox="0 0 24 24"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
        </div>

        <!-- Filter options -->
        <div 
            :class="{'hidden': !showFilter}"
            class="lg:block mb-6 bg-white rounded-lg shadow-sm p-4 mx-4 lg:mx-20"
        >
            <div class="flex flex-wrap items-center gap-4">
                <span class="font-medium text-gray-700">Availability:</span>
                <div class="flex flex-wrap gap-2">
                    <button 
                        @click="availabilityFilter = 'all'" 
                        :class="{'bg-yellow-400': availabilityFilter === 'all', 'bg-gray-200 hover:bg-gray-300': availabilityFilter !== 'all'}"
                        class="px-3 py-1 rounded-full text-sm font-medium transition-colors duration-200"
                    >
                        All
                    </button>
                    <button 
                        @click="availabilityFilter = 'available'" 
                        :class="{'bg-yellow-400': availabilityFilter === 'available', 'bg-gray-200 hover:bg-gray-300': availabilityFilter !== 'available'}"
                        class="px-3 py-1 rounded-full text-sm font-medium transition-colors duration-200"
                    >
                        Available
                    </button>
                    <button 
                        @click="availabilityFilter = 'soldout'" 
                        :class="{'bg-yellow-400': availabilityFilter === 'soldout', 'bg-gray-200 hover:bg-gray-300': availabilityFilter !== 'soldout'}"
                        class="px-3 py-1 rounded-full text-sm font-medium transition-colors duration-200"
                    >
                        Sold Out
                    </button>
                </div>
            </div>
        </div>

        <!-- Products Grid - 1 column on small, 2 on medium, 3 on large, 4 on xl -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-6 px-2 md:px-8 lg:px-20">
            @foreach ($skin as $Skin)
                <div
                    x-show="availabilityFilter === 'all' || (availabilityFilter === 'available' && {{ $Skin['status'] }} === 1) || (availabilityFilter === 'soldout' && {{ $Skin['status'] }} === 0)"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100"
                >
                    <!-- Product Image Container -->
                    <div class="relative overflow-hidden bg-yellow-50">
                        <!-- Status badge -->
                        <div class="absolute top-0 right-0 z-10 m-2">
                            @if ($Skin['status'] == 1)
                                <div class="flex items-center px-2 py-1 rounded-full bg-green-100 border border-green-200">
                                    <div class="w-2 h-2 rounded-full bg-green-500 mr-1 animate-pulse"></div>
                                    <span class="text-xs font-medium text-green-700">Available</span>
                                </div>
                            @else
                                <div class="flex items-center px-2 py-1 rounded-full bg-red-100 border border-red-200">
                                    <div class="w-2 h-2 rounded-full bg-red-500 mr-1"></div>
                                    <span class="text-xs font-medium text-red-700">Sold Out</span>
                                </div>
                            @endif
                        </div>

                        <!-- Image with hover effect -->
                        <div class="h-48 sm:h-56 md:h-64 p-4 overflow-hidden">
                            <img 
                                src="{{ $Skin['img_url'] }}" 
                                alt="{{ $Skin['name'] }}"
                                class="object-contain w-full h-full transition-transform duration-500 group-hover:scale-110"
                                loading="lazy"
                            >
                        </div>
                    </div>

                    <!-- Product title area with yellow accent -->
                    <div class="relative">
                        <!-- Yellow accent bar -->
                        <div class="absolute top-0 left-0 right-0 h-1 bg-yellow-400"></div>
                        
                        <!-- Product title -->
                        <div class="p-4 pt-5">
                            <h3 class="text-gray-800 font-bold text-lg text-center line-clamp-2">
                                {{ $Skin['name'] }}
                            </h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination with better mobile styling -->
        <div class="px-4 sm:px-8 md:px-16 mt-8 mb-4">
            {{ $skin->links() }}
        </div>
    </div>
</x-layout>