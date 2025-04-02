<x-layout>
    <div class="container mx-auto px-4 lg:py-12">
        <!-- Header Section -->
        <div class="mb-8 text-center ">
            <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl">Our Collection
            </h1>
            <div class="w-24 h-1 bg-gray-800 mx-auto mb-4 rounded-full"></div>
            <p class="mt-5 max-w-xl mx-auto text-xl text-gray-800">Discover our exclusive collection of premium products
                designed just for you.</p>
        </div>

        <!-- Products Grid - 1 column on small screens, 2 on medium, 3 on large screens -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 lg:px-20">
            @foreach ($skin as $Skin)
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:shadow-2xl hover:scale-105 border border-gray-800">
                    <!-- Badge for status (top right corner) -->
                    <div class="relative">
                        @if ($Skin['status'] == 1)
                            <div
                                class="absolute top-4 right-4 z-10 inline-flex items-center px-3 py-1 rounded-full bg-gradient-to-r from-green-400 to-green-600 text-white text-sm font-medium shadow-md">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Available
                            </div>
                        @else
                            <div
                                class="absolute top-4 right-4 z-10 inline-flex items-center px-3 py-1 rounded-full bg-gradient-to-r from-red-400 to-red-600 text-white text-sm font-medium shadow-md">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Sold Out
                            </div>
                        @endif

                        <!-- Product Image with improved presentation -->
                        <div class="relative overflow-hidden bg-yellow-200">
                            <!-- Yellow accent on top -->
                            <div class="absolute top-0 left-0 w-full h-3 bg-yellow-200"></div>

                            <!-- Image with shadow effect -->
                            <div class="h-64 p-6">
                                <img src="{{ $Skin['img_url'] }}" alt="{{ $Skin['name'] }}"
                                    class="object-contain w-full h-full transition-transform duration-300 hover:scale-110"
                                    loading="lazy">
                            </div>
                        </div>
                    </div>

                    <!-- Product Details -->
                    <div class="p-4 md:p-6 bg-gradient-to-b from-yellow-200 to-yellow-100">
                        <h3 class="text-gray-800 font-bold text-xl mb-3 text-center truncate">{{ $Skin['name'] }}</h3>
                        <div class="h-10 overflow-hidden">
                            <p class="text-sm text-gray-600 text-center">{{ Str::limit($Skin['name'], 50) }}</p>
                        </div>

                        <!-- Additional details can be added here -->
                        <div class="flex justify-center mt-4">
                            <button
                                class="px-6 py-2 bg-yellow-400 text-gray-800 font-medium rounded-full transform transition hover:bg-yellow-500 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50 shadow-md">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="px-16 my-5">
            {{ $skin->links() }}
        </div>

    </div>
</x-layout>
