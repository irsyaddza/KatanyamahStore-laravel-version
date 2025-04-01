<x-layout>
    <div class="container mx-auto px-4 py-8 ">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($skin as $Skin)
            <div class="bg-yellow-200 rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:shadow-xl hover:scale-105 border border-gray-600">
                <div class="p-4">
                    <h3 class="text-gray-800 font-medium text-lg text-center mb-3">{{ $Skin['name'] }}</h3>
                    <div class="relative h-[225px] rounded-md overflow-hidden mb-4">
                        <img 
                            src="{{ $Skin['img_url'] }}" 
                            alt="{{ $Skin['name'] }}" 
                            class="object-cover w-full h-full max-w-[800px] max-h-[600px] mx-auto"
                            loading="lazy"
                            style="object-fit: contain;">
                    </div>
                    
                    <!-- Compact Status Badge -->
                    <div class="flex items-center space-x-2 mb-3">
                        <div class="text-sm font-medium text-gray-500">Status:</div>
                        @if($Skin['status'] == 1)
                            <div class="inline-flex items-center px-2 py-1 rounded-md bg-gradient-to-r from-green-400 to-green-600 text-white text-sm font-medium shadow-sm">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                Available
                            </div>
                        @else
                            <div class="inline-flex items-center px-2 py-1 rounded-md bg-gradient-to-r from-red-400 to-red-600 text-white text-sm font-medium shadow-sm">
                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                </svg>
                                Sold Out
                            </div>
                        @endif
                    </div>
                    
                    {{-- <!-- Interactive Button -->
                    <div class="mt-4 text-center">
                        @if($Skin['status'] == 1)
                            <button 
                                class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-300"
                                onclick="window.location.href='{{ route('skin.view', $Skin['id']) }}'">
                                View Details
                            </button>
                        @else
                            <button 
                                class="bg-gray-400 text-white font-medium py-2 px-4 rounded-lg cursor-not-allowed opacity-75"
                                disabled>
                                Sold Out
                            </button>
                        @endif
                    </div> --}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>