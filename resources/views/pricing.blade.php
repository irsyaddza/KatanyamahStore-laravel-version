<x-layout>
    <div class="bg-yellow-400 py-12 sm:py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight">Choose the best plan for
                    you</h1>
                <p class="mt-5 text-xl text-gray-800">
                    Choose what services you want from us, and see the prices here. We offer the right prices that match
                    the quality.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Custom Skin -->
                @foreach ($pricing as $Pricing )
                <div class="bg-yellow-200 rounded-lg shadow-lg overflow-hidden border border-gray-800">
                    <div class="px-6 py-8">
                        <h3 class="text-gray-800 font-medium text-lg">{{ $Pricing['price_title'] }}</h3>
                        <p class="text-grey-800 mt-2">{{ $Pricing['price_desc'] }}</p>
                        <div class="mt-4 flex items-baseline">
                            <span class="text-5xl font-extrabold tracking-tight text-gray-900">{{ $Pricing['price'] }}</span>
                            <div class="ml-1 flex flex-col">
                                <span class="text-sm font-medium text-grey-800">Rp</span>
                                <span class="text-sm font-medium text-grey-800">per request</span>
                            </div>
                        </div>
                        <a href="/login"
                            class="mt-6 w-full bg-gray-800 hover:bg-yellow-600 text-white font-medium py-2 px-4 rounded-md transition-colors duration-200 inline-block text-center">
                            Order Now
                        </a>
                    </div>
                    <div class="border-t border-gray-800 px-6 py-8">
                        <h4 class="text-sm font-medium text-gray-900 mb-4">You will get:</h4>
                        <ul class="space-y-4">
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-yellow-500" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <p class="ml-3 text-sm text-gray-700">{{ $Pricing['price_feature1']}}</p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-yellow-500" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <p class="ml-3 text-sm text-gray-700">{{ $Pricing['price_feature1']}}</p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-yellow-500" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <p class="ml-3 text-sm text-gray-700">{{ $Pricing['price_feature1']}}</p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-yellow-500" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <p class="ml-3 text-sm text-gray-700">{{ $Pricing['price_feature1']}}</p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-yellow-500" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <p class="ml-3 text-sm text-gray-700">{{ $Pricing['price_feature1']}}</p>
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- FAQ Section with Accordion -->
            <div class="max-w-4xl mx-auto mt-20 px-4 sm:px-6">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-extrabold text-grey-900 sm:text-4xl">Frequently Asked Questions</h2>
                    <p class="mt-4 text-lg text-gray-800">Everything you need to know about our services</p>
                    <div class="mt-3 w-24 h-1 bg-yellow-500 mx-auto rounded-full"></div>
                </div>

                <div class="space-y-4" x-data="{ selected: null }">
                    @foreach ($faq as $index => $Faq)
                        <div
                            class="bg-gray-800 p-1 rounded-lg border border-gray-700 shadow-md overflow-hidden transition-all duration-200 hover:shadow-yellow-500/20">
                            <button
                                @click="selected !== {{ $index }} ? selected = {{ $index }} : selected = null"
                                class="flex justify-between items-center w-full px-6 py-5 text-left"
                                :class="{ 'text-yellow-400': selected === {{ $index }}, 'text-white': selected !==
                                        {{ $index }} }">
                                <span class="text-lg font-medium">{{ $Faq['question'] }}</span>
                                <svg class="h-6 w-6 transform transition-transform duration-200 text-yellow-500"
                                    :class="{ 'rotate-180': selected === {{ $index }} }" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div x-show="selected === {{ $index }}" x-collapse x-cloak
                                class="px-6 pb-5 text-gray-300">
                                <div class="border-t border-gray-700 pt-4">
                                    {{ $Faq['answer'] }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- CTA Section -->
                <div class="mt-20 bg-yellow-200 rounded-xl overflow-hidden">
                    <div
                        class="px-6 py-12 sm:px-12 lg:py-16 lg:px-16 flex flex-col lg:flex-row items-center justify-between">
                        <div>
                            <h2 class="text-3xl font-extrabold text-gray-900">Ready to get started?</h2>
                            <p class="mt-4 text-lg text-grey-800">Order now and get your own mods.</p>
                        </div>
                        <div class="mt-8 lg:mt-0 lg:ml-8">
                            <a href="login"
                                class="bg-gray-800 hover:bg-yellow-600 text-white px-6 py-3 rounded-md font-medium inline-flex items-center transition-colors duration-200">
                                Order Now
                                <svg class="ml-2 -mr-1 w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</x-layout>
