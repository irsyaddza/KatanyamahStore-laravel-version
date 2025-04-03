<x-dashboard>
    <div x-data="{ tab: '{{ request()->is('*/edit') ? 'form' : 'list' }}' }" class="px-4 sm:px-6 lg:px-8 py-6">
        <!-- Mobile tabs -->
        <div class="sm:hidden mb-6 flex justify-center">
            <div class="bg-white rounded-lg shadow-md p-1 inline-flex space-x-1">
                <button 
                    @click="tab = 'list'" 
                    :class="{'bg-yellow-400 text-white': tab === 'list', 'text-gray-700': tab !== 'list'}"
                    class="px-4 py-2 text-sm font-medium rounded-md transition-colors duration-200">
                    View Skins
                </button>
                <button 
                    @click="tab = 'form'" 
                    :class="{'bg-yellow-400 text-white': tab === 'form', 'text-gray-700': tab !== 'form'}"
                    class="px-4 py-2 text-sm font-medium rounded-md transition-colors duration-200">
                    {{ isset($editSkin) ? 'Edit Skin' : 'Add Skin' }}
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

        <!-- Skin Table Section -->
        <div x-show="tab === 'list'" class="bg-white shadow-md rounded-lg p-4 sm:p-6 mb-8 max-w-6xl mx-auto overflow-hidden">
            <h2 class="text-xl font-semibold mb-4">Showroom Skins</h2>

            <!-- Desktop View - Full Table -->
            <div class="hidden md:block overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($skins as $skin)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-12 w-12 flex-shrink-0">
                                            <img class="h-12 w-12 rounded object-cover" src="{{ asset('storage/' . $skin->img_url) }}" alt="{{ $skin->name }}">
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $skin->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $skin->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $skin->status ? 'Available' : 'Sold Out' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $skin->created_at->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="/dashboard/showroom/{{ $skin->id }}/edit" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                    <form action="/dashboard/showroom/{{ $skin->id }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900"
                                            onclick="return confirm('Are you sure you want to delete this skin?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Mobile View - Cards -->
            <div class="md:hidden space-y-6">
                @foreach ($skins as $skin)
                    <div class="bg-white border rounded-lg shadow-sm overflow-hidden">
                        <div class="p-4 border-b bg-yellow-50">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-gray-900">{{ $skin->name }}</h3>
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $skin->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $skin->status ? 'Available' : 'Sold Out' }}
                                </span>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="mb-4">
                                <img class="h-32 w-full object-cover rounded" src="{{ asset('storage/' . $skin->img_url) }}" alt="{{ $skin->name }}">
                            </div>
                            
                            <div class="text-sm text-gray-600">
                                <p>Added on: {{ $skin->created_at->format('d M Y') }}</p>
                            </div>
                            
                            <div class="flex space-x-3 mt-3">
                                <button
                                   @click="tab = 'form'; window.location.href='/dashboard/showroom/{{ $skin->id }}/edit'" 
                                   class="inline-flex items-center px-3 py-1 border border-yellow-600 text-yellow-600 text-sm rounded-md hover:bg-yellow-50">
                                    <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </button>
                                <form action="/dashboard/showroom/{{ $skin->id }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        onclick="return confirm('Are you sure you want to delete this skin?')"
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
                {{ isset($editSkin) ? 'Edit Skin' : 'Add New Skin' }}
            </h2>
            <form action="{{ isset($editSkin) ? '/dashboard/showroom/' . $editSkin->id : '/dashboard/showroom' }}"
                method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @if (isset($editSkin))
                    @method('PUT')
                @endif

                <div>
                    <label for="name" class="block text-gray-700 font-medium mb-2">Skin Name</label>
                    <input type="text" name="name" id="name"
                        class="@error('name') border-red-500 @enderror w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                        placeholder="e.g. Premium Skin" required
                        value="{{ old('name', isset($editSkin) ? $editSkin->name : '') }}">
                    @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image Upload -->
                <div>
                    <label for="img_url" class="block text-gray-700 font-medium mb-2">Skin Image</label>
                    <input type="file" name="img_url" id="img_url"
                        class="@error('img_url') border-red-500 @enderror block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-yellow-600 file:text-gray-700 hover:file:bg-yellow-500 focus:outline-none"
                        accept="image/*"
                        {{ isset($editSkin) ? '' : 'required' }}>
                    <p class="mt-1 text-sm text-gray-500">PNG, JPG, GIF up to 2MB</p>
                    @error('img_url')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Current Image (for edit) -->
                @if (isset($editSkin) && $editSkin->img_url)
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Current Image</label>
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $editSkin->img_url) }}" alt="{{ $editSkin->name }}" class="h-32 w-32 object-cover rounded-md border border-yellow-400">
                    </div>
                </div>
                @endif

                <!-- Image Preview -->
                <div x-data="{ imageUrl: '' }">
                    <div x-show="imageUrl" class="mt-2">
                        <label class="block text-gray-700 font-medium mb-2">Preview</label>
                        <img :src="imageUrl" class="h-32 w-32 object-cover rounded-md border border-yellow-400">
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const inputElement = document.querySelector('#img_url');
                            if (inputElement) {
                                const imagePreview = document.querySelector('[x-data="{ imageUrl: \'\' }"]').__x.$data;
                                
                                inputElement.addEventListener('change', function(e) {
                                    const file = e.target.files[0];
                                    if (file) {
                                        imagePreview.imageUrl = URL.createObjectURL(file);
                                    }
                                });
                            }
                        });
                    </script>
                </div>

                <!-- Status Radio buttons -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Status</label>
                    <div class="mt-2 space-y-2">
                        <div class="flex items-center">
                            <input 
                                id="available" 
                                name="status" 
                                type="radio" 
                                value="1" 
                                class="h-4 w-4 text-yellow-400 focus:ring-yellow-500 border-gray-300"
                                {{ (old('status', isset($editSkin) ? $editSkin->status : '1') == '1') ? 'checked' : '' }}
                                required>
                            <label for="available" class="ml-2 block text-sm text-gray-700">
                                Available
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input 
                                id="sold_out" 
                                name="status" 
                                type="radio" 
                                value="0" 
                                class="h-4 w-4 text-yellow-400 focus:ring-yellow-500 border-gray-300"
                                {{ (old('status', isset($editSkin) ? $editSkin->status : '') == '0') ? 'checked' : '' }}>
                            <label for="sold_out" class="ml-2 block text-sm text-gray-700">
                                Sold Out
                            </label>
                        </div>
                    </div>
                    @error('status')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4 pt-4">
                    <button type="button" @click="tab = 'list'"
                        class="w-full sm:w-auto px-6 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        Cancel
                    </button>
                    <button type="submit"
                        class="w-full sm:w-auto px-6 py-2 bg-yellow-600 rounded-md text-white hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        {{ isset($editSkin) ? 'Update Skin' : 'Save Skin' }}
                    </button>
                </div>
            </form>
        </div>

        <!-- Desktop View: Add Button (fixed) -->
        <div class="hidden sm:block">
            <button 
                @click="tab = tab === 'list' ? 'form' : 'list'"
                class="fixed bottom-8 right-8 bg-yellow-600 text-white p-4 rounded-full shadow-lg hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:ring-offset-2">
                <svg x-show="tab === 'list'" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                <svg x-show="tab === 'form'" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
            </button>
        </div>
    </div>

    <style>
        [x-cloak] { display: none !important; }
    </style>
</x-dashboard>