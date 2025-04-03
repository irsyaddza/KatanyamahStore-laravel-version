<x-dashboard>
    <div x-data="{ tab: '{{ request()->is('*/edit') ? 'form' : 'list' }}' }" class="px-4 sm:px-6 lg:px-8 py-6">
        <!-- Mobile tabs -->
        <div class="sm:hidden mb-6 flex justify-center">
            <div class="bg-white rounded-lg shadow-md p-1 inline-flex space-x-1">
                <button 
                    @click="tab = 'list'" 
                    :class="{'bg-yellow-400 text-white': tab === 'list', 'text-gray-700': tab !== 'list'}"
                    class="px-4 py-2 text-sm font-medium rounded-md transition-colors duration-200">
                    View Plans
                </button>
                <button 
                    @click="tab = 'form'" 
                    :class="{'bg-yellow-400 text-white': tab === 'form', 'text-gray-700': tab !== 'form'}"
                    class="px-4 py-2 text-sm font-medium rounded-md transition-colors duration-200">
                    {{ isset($editPricing) ? 'Edit Plan' : 'Add Plan' }}
                </button>
            </div>
        </div>

        <!-- Success message -->
        @if (session()->has('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 mx-auto max-w-6xl"
                role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <!-- Pricing Table Section -->
        <div x-show="tab === 'list'" class="bg-white shadow-md rounded-lg p-4 sm:p-6 mb-8 max-w-6xl mx-auto overflow-hidden">
            <h2 class="text-xl font-semibold mb-4">Current Pricing Plans</h2>

            <!-- Desktop View - Full Table -->
            <div class="hidden md:block overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Features</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($pricing as $Pricing)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $Pricing['price_title'] }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500">{{ $Pricing['price_desc'] }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">Rp{{ number_format($Pricing['price'], 0, ',', '.') }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <ul class="text-sm text-gray-500 list-disc pl-5">
                                        <li>{{ $Pricing['price_feature1'] }}</li>
                                        <li>{{ $Pricing['price_feature2'] }}</li>
                                        <li>{{ $Pricing['price_feature3'] }}</li>
                                        <li>{{ $Pricing['price_feature4'] }}</li>
                                        <li>{{ $Pricing['price_feature5'] }}</li>
                                    </ul>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="/dashboard/pricing/{{ $Pricing['id'] }}/edit" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                    <form action="/dashboard/pricing/{{ $Pricing['id'] }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900"
                                            onclick="return confirm('Are you sure you want to delete this pricing plan?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Mobile View - Cards -->
            <div class="md:hidden space-y-6">
                @foreach ($pricing as $Pricing)
                    <div class="bg-white border rounded-lg shadow-sm overflow-hidden">
                        <div class="p-4 border-b bg-yellow-50">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-gray-900">{{ $Pricing['price_title'] }}</h3>
                                <div class="text-yellow-600 font-bold">
                                    Rp{{ number_format($Pricing['price'], 0, ',', '.') }}
                                </div>
                            </div>
                        </div>
                        <div class="p-4">
                            <p class="text-sm text-gray-600 mb-4">{{ $Pricing['price_desc'] }}</p>
                            
                            <div x-data="{ showFeatures: false }">
                                <button 
                                    @click="showFeatures = !showFeatures" 
                                    class="text-sm text-yellow-600 font-medium flex items-center mb-3">
                                    <span x-text="showFeatures ? 'Hide Features' : 'Show Features'"></span>
                                    <svg 
                                        :class="{'rotate-180': showFeatures}"
                                        class="ml-1 w-4 h-4 transition-transform duration-200" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                
                                <ul x-show="showFeatures" 
                                    x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="opacity-0 transform scale-95"
                                    x-transition:enter-end="opacity-100 transform scale-100"
                                    class="text-sm text-gray-600 list-disc pl-5 space-y-1 mb-4">
                                    <li>{{ $Pricing['price_feature1'] }}</li>
                                    <li>{{ $Pricing['price_feature2'] }}</li>
                                    <li>{{ $Pricing['price_feature3'] }}</li>
                                    <li>{{ $Pricing['price_feature4'] }}</li>
                                    <li>{{ $Pricing['price_feature5'] }}</li>
                                </ul>
                            </div>
                            
                            <div class="flex space-x-3 mt-3">
                                <button
                                   @click="tab = 'form'; window.location.href='/dashboard/pricing/{{ $Pricing['id'] }}/edit'" 
                                   class="inline-flex items-center px-3 py-1 border border-yellow-600 text-yellow-600 text-sm rounded-md hover:bg-yellow-50">
                                    <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </button>
                                <form action="/dashboard/pricing/{{ $Pricing['id'] }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        onclick="return confirm('Are you sure you want to delete this pricing plan?')"
                                        class="inline-flex items-center px-3 py-1 border border-red-600 text-red-600 text-sm rounded-md hover:bg-red-50">
                                        <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Add/Edit Form Section -->
        <div x-show="tab === 'form'" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100"
             class="bg-white shadow-md rounded-lg p-4 sm:p-6 max-w-4xl mx-auto">
            <h2 class="text-xl font-semibold mb-4">
                {{ isset($editPricing) ? 'Edit Pricing Plan' : 'Add New Pricing Plan' }}
            </h2>
            <form action="{{ isset($editPricing) ? '/dashboard/pricing/' . $editPricing->id : '/dashboard/pricing' }}"
                method="POST" class="space-y-4">
                @csrf
                @if (isset($editPricing))
                    @method('PUT')
                @endif

                <div>
                    <label for="price_title" class="block text-gray-700 font-medium mb-2">Price Title</label>
                    <input type="text" name="price_title" id="price_title"
                        class="@error('price_title') border-red-500 @enderror w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                        placeholder="e.g. Basic Plan" required
                        value="{{ old('price_title', isset($editPricing) ? $editPricing->price_title : '') }}">
                    @error('price_title')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="price_desc" class="block text-gray-700 font-medium mb-2">Price Description</label>
                    <textarea name="price_desc" id="price_desc" rows="3"
                        class="@error('price_desc') border-red-500 @enderror w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                        placeholder="Short description of the pricing plan">{{ old('price_desc', isset($editPricing) ? $editPricing->price_desc : '') }}</textarea>
                    @error('price_desc')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="price" class="block text-gray-700 font-medium mb-2">Price (IDR)</label>
                    <input type="number" name="price" id="price"
                        class="@error('price') border-red-500 @enderror w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                        placeholder="e.g. 99000" required
                        value="{{ old('price', isset($editPricing) ? $editPricing->price : '') }}">
                    @error('price')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Features Section -->
                <div x-data="{ showFeatures: true }" class="border rounded-lg overflow-hidden">
                    <div @click="showFeatures = !showFeatures" class="bg-gray-50 px-4 py-3 flex justify-between items-center cursor-pointer">
                        <h3 class="text-sm font-medium text-gray-700">Features</h3>
                        <svg 
                            :class="{'rotate-180': showFeatures}"
                            class="w-5 h-5 text-gray-500 transition-transform duration-200" 
                            fill="none" 
                            viewBox="0 0 24 24" 
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                    
                    <div x-show="showFeatures" class="p-4 space-y-4">
                        <!-- Feature 1 -->
                        <div>
                            <label for="price_feature1" class="block text-gray-700 font-medium mb-2">Feature 1</label>
                            <input type="text" name="price_feature1" id="price_feature1"
                                class="@error('price_feature1') border-red-500 @enderror w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                                placeholder="e.g. Unlimited Access"
                                value="{{ old('price_feature1', isset($editPricing) ? $editPricing->price_feature1 : '') }}">
                            @error('price_feature1')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Feature 2 -->
                        <div>
                            <label for="price_feature2" class="block text-gray-700 font-medium mb-2">Feature 2</label>
                            <input type="text" name="price_feature2" id="price_feature2"
                                class="@error('price_feature2') border-red-500 @enderror w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                                placeholder="e.g. Unlimited Access"
                                value="{{ old('price_feature2', isset($editPricing) ? $editPricing->price_feature2 : '') }}">
                            @error('price_feature2')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Feature 3 -->
                        <div>
                            <label for="price_feature3" class="block text-gray-700 font-medium mb-2">Feature 3</label>
                            <input type="text" name="price_feature3" id="price_feature3"
                                class="@error('price_feature3') border-red-500 @enderror w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                                placeholder="e.g. Unlimited Access"
                                value="{{ old('price_feature3', isset($editPricing) ? $editPricing->price_feature3 : '') }}">
                            @error('price_feature3')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Feature 4 -->
                        <div>
                            <label for="price_feature4" class="block text-gray-700 font-medium mb-2">Feature 4</label>
                            <input type="text" name="price_feature4" id="price_feature4"
                                class="@error('price_feature4') border-red-500 @enderror w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                                placeholder="e.g. Unlimited Access"
                                value="{{ old('price_feature4', isset($editPricing) ? $editPricing->price_feature4 : '') }}">
                            @error('price_feature4')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Feature 5 -->
                        <div>
                            <label for="price_feature5" class="block text-gray-700 font-medium mb-2">Feature 5</label>
                            <input type="text" name="price_feature5" id="price_feature5"
                                class="@error('price_feature5') border-red-500 @enderror w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                                placeholder="e.g. Unlimited Access"
                                value="{{ old('price_feature5', isset($editPricing) ? $editPricing->price_feature5 : '') }}">
                            @error('price_feature5')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4 pt-4">
                    <button type="button" @click="tab = 'list'"
                        class="w-full sm:w-auto px-6 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        Cancel
                    </button>
                    <button type="submit"
                        class="w-full sm:w-auto px-6 py-2 bg-yellow-400 rounded-md text-white hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        {{ isset($editPricing) ? 'Update Pricing' : 'Save Pricing' }}
                    </button>
                </div>
            </form>
        </div>

        <!-- Desktop View: Add Button (fixed) -->
        <div class="hidden sm:block">
            <button 
                @click="tab = tab === 'list' ? 'form' : 'list'"
                class="fixed bottom-8 right-8 bg-yellow-400 text-white p-4 rounded-full shadow-lg hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:ring-offset-2">
                <svg x-show="tab === 'list'" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                <svg x-show="tab === 'form'" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
            </button>
        </div>
    </div>
</x-dashboard>