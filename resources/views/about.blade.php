<x-layout>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="bg-yellow-400 py-12">
            <!-- Hero Section -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1
                        class="text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl">
                        About Katanyamah Store</h1>
                    <p class="mt-5 max-w-xl mx-auto text-xl text-gray-800">We're on a mission to transform the
                        digital landscape with innovative solutions.</p>
                </div>
            </div>

            <!-- Our Story Section -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-20">
                <div class="lg:flex lg:items-center lg:justify-between">
                    <div class="lg:w-1/2">
                        <h2 class="text-3xl font-extrabold text-gray-900">Our Story</h2>
                        @foreach ($about as $About)
                        <p class="mt-4 text-lg text-gray-800">
                            {{$About['story']}}
                        </p>
                        <p class="mt-4 text-lg text-gray-800">
                            {{$About['story2']}}
                        </p>
                    </div>
                    @endforeach
                    @foreach ($about as $About)
                    <div class="mt-10 lg:mt-0 lg:w-1/2 lg:pl-10">
                        <img class="rounded-lg shadow-xl" src="{{ $About['story_img']}}"
                            alt="Our team working together">
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Our Values Section -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-20">
                <h2 class="text-3xl font-extrabold text-gray-900 text-center">Our Values</h2>
                <div class="mt-10 grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="bg-yellow-300 p-6 rounded-lg shadow">
                        <div class="bg-yellow-200 p-2 rounded-full w-12 h-12 flex items-center justify-center">
                            <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="mt-4 text-xl font-bold text-gray-900">Innovation</h3>
                        <p class="mt-2 text-gray-800">We embrace new ideas and technologies to solve complex
                            problems.</p>
                    </div>

                    <div class="bg-yellow-300 p-6 rounded-lg shadow">
                        <div class="bg-yellow-200 p-2 rounded-full w-12 h-12 flex items-center justify-center">
                            <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="mt-4 text-xl font-bold text-gray-900">Collaboration</h3>
                        <p class="mt-2 text-gray-800">We believe in the power of teamwork and diverse
                            perspectives.</p>
                    </div>

                    <div class="bg-yellow-300 p-6 rounded-lg shadow">
                        <div class="bg-yellow-200 p-2 rounded-full w-12 h-12 flex items-center justify-center">
                            <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="mt-4 text-xl font-bold text-gray-900">Integrity</h3>
                        <p class="mt-2 text-gray-800">We act with honesty, transparency, and respect in all
                            that we do.</p>
                    </div>
                </div>
            </div>
            <!-- Team Section -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-20">
                <h2 class="text-3xl font-extrabold text-gray-900 text-center">Meet Our Team</h2>
                <p class="mt-5 max-w-xl mx-auto text-xl text-center text-gray-800">Talented individuals working
                    together to create amazing products.</p>
                <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2">
                    @foreach ($team as $Team)
                    <div class="text-center">
                        <div class="mx-auto h-40 w-40 rounded-full overflow-hidden">
                            <img class="h-full w-full object-cover" src="{{$Team['team_img']}}"
                                alt="{{$Team['team_name']}}">
                        </div>
                        <h3 class="mt-6 text-lg font-medium text-gray-900">{{$Team['team_name']}}</h3>
                        <p class="text-indigo-600">{{$Team['team_rank']}}</p>
                    </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
</x-layout>