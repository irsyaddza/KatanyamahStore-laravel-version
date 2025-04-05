<x-dashboard>
    <div x-data="aboutManager()" 
         x-init="initialize()" 
         class="px-4 sm:px-6 lg:px-8 py-6">
         
        <!-- Mobile tabs -->
        <div class="sm:hidden mb-6 flex justify-center">
            <div class="bg-white rounded-lg shadow-md p-1 inline-flex space-x-1">
                <button 
                    @click="activeTab = 'list'" 
                    :class="{'bg-yellow-400 text-white': activeTab === 'list', 'text-gray-700': activeTab !== 'list'}"
                    class="px-4 py-2 text-sm font-medium rounded-md transition-colors duration-200">
                    View About
                </button>
                <button 
                    @click="activeTab = 'form'" 
                    :class="{'bg-yellow-400 text-white': activeTab === 'form', 'text-gray-700': activeTab !== 'form'}"
                    class="px-4 py-2 text-sm font-medium rounded-md transition-colors duration-200">
                    <span x-text="isEditMode ? 'Edit About' : 'Add About'"></span>
                </button>
            </div>
        </div>

        <!-- Notifications -->
        <template x-if="notifications.success">
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 mx-auto max-w-6xl"
                role="alert" x-text="notifications.success"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform -translate-y-2">
            </div>
        </template>

        <!-- About Table Section -->
        <div x-show="activeTab === 'list'" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             class="bg-white shadow-md rounded-lg p-4 sm:p-6 mb-8 max-w-6xl mx-auto overflow-hidden">
            <h2 class="text-xl font-semibold mb-4">About Section</h2>

            <!-- Desktop View - Full Table -->
            <!-- Desktop View - Full Table (With Fixed Values Section) -->
            <div class="hidden md:block overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Story</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Story 2</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Story Image</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Values</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($about as $About)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900">{{ Str::limit($About['story'], 50) }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500">{{ Str::limit($About['story2'], 50) }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="h-16 w-16 overflow-hidden">
                                        <img src="{{ asset('storage/' . $About['story_img']) }}" alt="Story Image" class="h-full w-full object-cover">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col space-y-2">
                                        <div class="flex items-center">
                                            <div class="w-6 h-6 bg-yellow-400 rounded-full flex items-center justify-center mr-2 flex-shrink-0">
                                                <span class="text-white text-xs font-bold">1</span>
                                            </div>
                                            <span class="text-sm font-medium text-gray-900">{{ $About['title_values1'] ?? 'Value 1' }}</span>
                                        </div>
                                        <div class="flex items-center">
                                            <div class="w-6 h-6 bg-yellow-400 rounded-full flex items-center justify-center mr-2 flex-shrink-0">
                                                <span class="text-white text-xs font-bold">2</span>
                                            </div>
                                            <span class="text-sm font-medium text-gray-900">{{ $About['title_values2'] ?? 'Value 2' }}</span>
                                        </div>
                                        <div class="flex items-center">
                                            <div class="w-6 h-6 bg-yellow-400 rounded-full flex items-center justify-center mr-2 flex-shrink-0">
                                                <span class="text-white text-xs font-bold">3</span>
                                            </div>
                                            <span class="text-sm font-medium text-gray-900">{{ $About['title_values3'] ?? 'Value 3' }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" @click.prevent="editAbout({{ $About['id'] }})" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                    <a href="#" @click.prevent="deleteAbout({{ $About['id'] }}, '{{ Str::limit($About['story'], 20) }}')" class="text-red-600 hover:text-red-900">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Mobile View - Accordion Cards -->
            <div class="md:hidden space-y-6">
                @foreach ($about as $About)
                    <div class="bg-white border rounded-lg shadow-sm overflow-hidden">
                        <div x-data="{ open: false }" class="w-full">
                            <div @click="open = !open" class="flex justify-between items-center p-4 cursor-pointer bg-yellow-50 border-b">
                                <h3 class="text-sm font-medium text-gray-900">{{ Str::limit($About['story'], 50) }}</h3>
                                <svg 
                                    :class="{'rotate-180': open}"
                                    class="w-5 h-5 text-gray-500 transition-transform duration-200" 
                                    fill="none" 
                                    viewBox="0 0 24 24" 
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                            <div x-show="open" 
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 transform scale-95"
                                 x-transition:enter-end="opacity-100 transform scale-100"
                                 class="p-4 bg-white">
                                <div class="space-y-4">
                                    <div>
                                        <p class="text-xs font-medium text-gray-500 mb-1">Story</p>
                                        <p class="text-sm text-gray-700">{{ $About['story'] }}</p>
                                    </div>
                                    
                                    <div>
                                        <p class="text-xs font-medium text-gray-500 mb-1">Story 2</p>
                                        <p class="text-sm text-gray-700">{{ $About['story2'] }}</p>
                                    </div>
                                    
                                    <div>
                                        <p class="text-xs font-medium text-gray-500 mb-1">Story Image</p>
                                        <div class="h-32 w-full overflow-hidden">
                                            <img src="{{ asset('storage/' . $About['story_img']) }}" alt="Story Image" class="h-full w-auto object-cover">
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <p class="text-xs font-medium text-gray-500 mb-2">Values</p>
                                        <div class="space-y-4">
                                            <!-- Value 1 -->
                                            <div class="border rounded-lg p-3 bg-gray-50">
                                                <div class="flex items-center mb-1">
                                                    <div class="w-6 h-6 bg-yellow-400 rounded-full flex items-center justify-center mr-2">
                                                        <span class="text-white text-xs font-bold">1</span>
                                                    </div>
                                                    <h4 class="text-sm font-medium text-gray-900">{{ $About['title_values1'] ?? 'Value 1' }}</h4>
                                                </div>
                                                <p class="text-sm text-gray-600 ml-8">{{ $About['values1'] }}</p>
                                            </div>
                                            
                                            <!-- Value 2 -->
                                            <div class="border rounded-lg p-3 bg-gray-50">
                                                <div class="flex items-center mb-1">
                                                    <div class="w-6 h-6 bg-yellow-400 rounded-full flex items-center justify-center mr-2">
                                                        <span class="text-white text-xs font-bold">2</span>
                                                    </div>
                                                    <h4 class="text-sm font-medium text-gray-900">{{ $About['title_values2'] ?? 'Value 2' }}</h4>
                                                </div>
                                                <p class="text-sm text-gray-600 ml-8">{{ $About['values2'] }}</p>
                                            </div>
                                            
                                            <!-- Value 3 -->
                                            <div class="border rounded-lg p-3 bg-gray-50">
                                                <div class="flex items-center mb-1">
                                                    <div class="w-6 h-6 bg-yellow-400 rounded-full flex items-center justify-center mr-2">
                                                        <span class="text-white text-xs font-bold">3</span>
                                                    </div>
                                                    <h4 class="text-sm font-medium text-gray-900">{{ $About['title_values3'] ?? 'Value 3' }}</h4>
                                                </div>
                                                <p class="text-sm text-gray-600 ml-8">{{ $About['values3'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="flex space-x-3 mt-6">
                                    <button
                                        @click="editAbout({{ $About['id'] }})" 
                                        class="inline-flex items-center px-3 py-1 border border-indigo-600 text-indigo-600 text-sm rounded-md hover:bg-indigo-50">
                                        <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        Edit
                                    </button>
                                    <button 
                                        @click="deleteAbout({{ $About['id'] }}, '{{ Str::limit($About['story'], 20) }}')"
                                        class="inline-flex items-center px-3 py-1 border border-red-600 text-red-600 text-sm rounded-md hover:bg-red-50">
                                        <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Add/Edit Form Section -->
        <div x-show="activeTab === 'form'" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100"
             class="bg-white shadow-md rounded-lg p-4 sm:p-6 max-w-4xl mx-auto">
            <h2 class="text-xl font-semibold mb-4" x-text="isEditMode ? 'Edit About Section' : 'Add New About Section'"></h2>
            
            <form id="aboutForm" @submit.prevent="submitForm" class="space-y-4" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" :value="formMethod">
                <input type="hidden" name="about_id" x-model="formData.id">

                <div>
                    <label for="story" class="block text-gray-700 font-medium mb-2">
                        Story <span class="text-red-500">*</span>
                    </label>
                    <textarea 
                        name="story" 
                        id="story" 
                        rows="3"
                        x-model="formData.story"
                        @input="validateField('story')"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                        :class="{'border-red-500': errors.story}"
                        placeholder="Enter your main story"></textarea>
                    <p class="mt-1 text-sm text-red-500" x-show="errors.story" x-text="errors.story"></p>
                </div>

                <div>
                    <label for="story2" class="block text-gray-700 font-medium mb-2">
                        Story 2 <span class="text-red-500">*</span>
                    </label>
                    <textarea 
                        name="story2" 
                        id="story2" 
                        rows="3"
                        x-model="formData.story2"
                        @input="validateField('story2')"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                        :class="{'border-red-500': errors.story2}"
                        placeholder="Enter your secondary story"></textarea>
                    <p class="mt-1 text-sm text-red-500" x-show="errors.story2" x-text="errors.story2"></p>
                </div>

                <div>
                    <label for="story_img" class="block text-gray-700 font-medium mb-2">
                        Story Image <span class="text-red-500">*</span>
                    </label>
                    <div class="flex items-center space-x-4">
                        <div x-show="formData.story_img_preview" class="h-24 w-24 border rounded overflow-hidden">
                            <img :src="formData.story_img_preview" alt="Preview" class="h-full w-full object-cover">
                        </div>
                        <div class="flex-1">
                            <label class="block">
                                <span class="sr-only">Choose file</span>
                                <input type="file"
                                    name="story_img" 
                                    id="story_img"
                                    @change="handleImageUpload"
                                    class="block w-full text-sm text-gray-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-medium
                                    file:bg-yellow-50 file:text-yellow-700
                                    hover:file:bg-yellow-100"
                                    :class="{'border-red-500': errors.story_img}"
                                    accept="image/*">
                            </label>
                            <p class="mt-1 text-sm text-gray-500">JPG, PNG, or GIF up to 1MB</p>
                            <p class="mt-1 text-sm text-red-500" x-show="errors.story_img" x-text="errors.story_img"></p>
                        </div>
                    </div>
                </div>

                <!-- Values Section -->
                <div class="mb-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-3">Company Values</h3>
                    <div class="bg-gray-50 p-4 rounded-lg mb-4">
                        <p class="text-sm text-gray-600 mb-2">
                            Each value should include a title and description. These will be displayed as cards on the About page.
                        </p>
                    </div>
                </div>

                <!-- Value 1 -->
                <div class="p-4 border rounded-md mb-4">
                    <div class="flex items-center mb-2">
                        <div class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center mr-2">
                            <span class="text-white text-sm font-bold">1</span>
                        </div>
                        <h3 class="font-medium">First Value</h3>
                    </div>
                    
                    <div>
                        <label for="title_values1" class="block text-gray-700 font-medium mb-2">
                            Title <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                            name="title_values1" 
                            id="title_values1"
                            x-model="formData.title_values1"
                            @input="validateField('title_values1')"
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            :class="{'border-red-500': errors.title_values1}"
                            placeholder="e.g. Innovation">
                        <p class="mt-1 text-sm text-red-500" x-show="errors.title_values1" x-text="errors.title_values1"></p>
                    </div>
                    
                    <div class="mt-3">
                        <label for="values1" class="block text-gray-700 font-medium mb-2">
                            Description <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            name="values1" 
                            id="values1"
                            rows="2"
                            x-model="formData.values1"
                            @input="validateField('values1')"
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            :class="{'border-red-500': errors.values1}"
                            placeholder="Value description"></textarea>
                        <p class="mt-1 text-sm text-red-500" x-show="errors.values1" x-text="errors.values1"></p>
                    </div>
                </div>

                <!-- Value 2 -->
                <div class="p-4 border rounded-md mb-4">
                    <div class="flex items-center mb-2">
                        <div class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center mr-2">
                            <span class="text-white text-sm font-bold">2</span>
                        </div>
                        <h3 class="font-medium">Second Value</h3>
                    </div>
                    
                    <div>
                        <label for="title_values2" class="block text-gray-700 font-medium mb-2">
                            Title <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                            name="title_values2" 
                            id="title_values2"
                            x-model="formData.title_values2"
                            @input="validateField('title_values2')"
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            :class="{'border-red-500': errors.title_values2}"
                            placeholder="e.g. Collaboration">
                        <p class="mt-1 text-sm text-red-500" x-show="errors.title_values2" x-text="errors.title_values2"></p>
                    </div>
                    
                    <div class="mt-3">
                        <label for="values2" class="block text-gray-700 font-medium mb-2">
                            Description <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            name="values2" 
                            id="values2"
                            rows="2"
                            x-model="formData.values2"
                            @input="validateField('values2')"
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            :class="{'border-red-500': errors.values2}"
                            placeholder="Value description"></textarea>
                        <p class="mt-1 text-sm text-red-500" x-show="errors.values2" x-text="errors.values2"></p>
                    </div>
                </div>

                <!-- Value 3 -->
                <div class="p-4 border rounded-md mb-4">
                    <div class="flex items-center mb-2">
                        <div class="w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center mr-2">
                            <span class="text-white text-sm font-bold">3</span>
                        </div>
                        <h3 class="font-medium">Third Value</h3>
                    </div>
                    
                    <div>
                        <label for="title_values3" class="block text-gray-700 font-medium mb-2">
                            Title <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                            name="title_values3" 
                            id="title_values3"
                            x-model="formData.title_values3"
                            @input="validateField('title_values3')"
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            :class="{'border-red-500': errors.title_values3}"
                            placeholder="e.g. Integrity">
                        <p class="mt-1 text-sm text-red-500" x-show="errors.title_values3" x-text="errors.title_values3"></p>
                    </div>
                    
                    <div class="mt-3">
                        <label for="values3" class="block text-gray-700 font-medium mb-2">
                            Description <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            name="values3" 
                            id="values3"
                            rows="2"
                            x-model="formData.values3"
                            @input="validateField('values3')"
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                            :class="{'border-red-500': errors.values3}"
                            placeholder="Value description"></textarea>
                        <p class="mt-1 text-sm text-red-500" x-show="errors.values3" x-text="errors.values3"></p>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4 pt-4"
                     :class="{'shake-animation': isShaking}">
                    <button type="button" 
                            @click="cancelForm"
                            class="w-full sm:w-auto px-6 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        Cancel
                    </button>
                    <button type="submit"
                        class="w-full sm:w-auto px-6 py-2 bg-yellow-600 rounded-md text-white hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                     <span x-text="isEditMode ? 'Update About' : 'Save About'"></span>
            </button>
                </div>
            </form>
        </div>

        <!-- Delete Confirmation Modal -->
        <div x-show="isDeleteModalOpen" 
             class="fixed inset-0 bg-gray-900 bg-opacity-50 z-50 flex items-center justify-center"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">
            <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4 p-6" 
                 @click.away="isDeleteModalOpen = false"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform scale-95"
                 x-transition:enter-end="opacity-100 transform scale-100">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Confirm Deletion</h3>
                <p class="text-sm text-gray-600 mb-6">
                    Are you sure you want to delete "<span x-text="deleteItemName" class="font-semibold"></span>"? This action cannot be undone.
                </p>
                <div class="flex justify-end space-x-3">
                    <button @click="isDeleteModalOpen = false"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-400">
                        Cancel
                    </button>
                    <button @click="confirmDelete"
                            class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                        Delete
                    </button>
                </div>
            </div>
        </div>

        <!-- Desktop View: Toggle Button (fixed) -->
        <div class="hidden sm:block">
            <button 
                @click="toggleView"
                class="fixed bottom-8 right-8 bg-yellow-600 text-white p-4 rounded-full shadow-lg hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:ring-offset-2">
                <template x-if="activeTab === 'list'">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                </template>
                <template x-if="activeTab === 'form'">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </template>
            </button>
        </div>
    </div>

    <style>
        [x-cloak] { display: none !important; }
        
        .shake-animation {
            animation: shake 0.5s cubic-bezier(.36,.07,.19,.97) both;
            transform: translate3d(0, 0, 0);
            backface-visibility: hidden;
            perspective: 1000px;
        }
        
        @keyframes shake {
            10%, 90% {
                transform: translate3d(-1px, 0, 0);
            }
            
            20%, 80% {
                transform: translate3d(2px, 0, 0);
            }
            
            30%, 50%, 70% {
                transform: translate3d(-4px, 0, 0);
            }
            
            40%, 60% {
                transform: translate3d(4px, 0, 0);
            }
        }
    </style>

    <script>
        document.addEventListener('alpine:init', () => {
    Alpine.data('aboutManager', () => ({
        activeTab: '{{ request()->is("*/edit") ? "form" : "list" }}',
        isEditMode: {{ isset($editAbout) ? 'true' : 'false' }},
        formMethod: 'POST',
        deleteItemId: null,
        deleteItemName: '',
        isDeleteModalOpen: false,
        isShaking: false,
        notifications: {
            success: '{{ session("success") }}',
            error: '{{ session("error") }}'
        },
        formData: {
            id: '{{ isset($editAbout) ? $editAbout->id : "" }}',
            story: '{{ isset($editAbout) ? $editAbout->story : "" }}',
            story2: '{{ isset($editAbout) ? $editAbout->story2 : "" }}',
            story_img: null,
            story_img_preview: '{{ isset($editAbout) ? asset("storage/" . $editAbout->story_img) : "" }}',
            title_values1: '{{ isset($editAbout) ? $editAbout->title_values1 : "" }}',
            values1: '{{ isset($editAbout) ? $editAbout->values1 : "" }}',
            title_values2: '{{ isset($editAbout) ? $editAbout->title_values2 : "" }}',
            values2: '{{ isset($editAbout) ? $editAbout->values2 : "" }}',
            title_values3: '{{ isset($editAbout) ? $editAbout->title_values3 : "" }}',
            values3: '{{ isset($editAbout) ? $editAbout->values3 : "" }}'
        },
        errors: {
            story: null,
            story2: null,
            story_img: null,
            title_values1: null,
            values1: null,
            title_values2: null,
            values2: null,
            title_values3: null,
            values3: null
        },
        
        initialize() {
            // Auto-dismiss notifications after 5 seconds
            if (this.notifications.success || this.notifications.error) {
                setTimeout(() => {
                    this.notifications.success = null;
                    this.notifications.error = null;
                }, 5000);
            }
        },
        
        resetForm() {
            this.formData = {
                id: '',
                story: '',
                story2: '',
                story_img: null,
                story_img_preview: '',
                title_values1: '',
                values1: '',
                title_values2: '',
                values2: '',
                title_values3: '',
                values3: ''
            };
            this.errors = {
                story: null,
                story2: null,
                story_img: null,
                title_values1: null,
                values1: null,
                title_values2: null,
                values2: null,
                title_values3: null,
                values3: null
            };
            this.isEditMode = false;
            this.formMethod = 'POST';
        },
        
        toggleView() {
            if (this.activeTab === 'list') {
                this.resetForm();
                this.activeTab = 'form';
            } else {
                this.activeTab = 'list';
            }
        },
        
        handleImageUpload(event) {
            const file = event.target.files[0];
            this.errors.story_img = null;
            
            if (!file) return;
            
            // Validate file size (1MB = 1024 * 1024 bytes)
            if (file.size > 1024 * 1024) {
                this.errors.story_img = 'Image size should be less than 1MB';
                event.target.value = '';
                return;
            }
            
            // Validate file type
            if (!['image/jpeg', 'image/png', 'image/gif'].includes(file.type)) {
                this.errors.story_img = 'Please upload a valid image (JPG, PNG, GIF)';
                event.target.value = '';
                return;
            }
            
            // Set file and preview
            this.formData.story_img = file;
            
            // Create image preview
            const reader = new FileReader();
            reader.onload = e => {
                this.formData.story_img_preview = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        
        editAbout(id) {
            // Set edit mode and redirect to edit page
            this.isEditMode = true;
            this.formMethod = 'PUT';
            window.location.href = `/dashboard/admin/about/${id}/edit`;
        },
        
        validateField(field) {
            // Clear previous error
            this.errors[field] = null;
            
            // Validate based on field type
            switch(field) {
                case 'story':
                case 'story2':
                    if (!this.formData[field]?.trim()) {
                        this.errors[field] = `${field.charAt(0).toUpperCase() + field.slice(1)} is required`;
                    } else if (this.formData[field].trim().length < 10) {
                        this.errors[field] = `${field.charAt(0).toUpperCase() + field.slice(1)} must be at least 10 characters`;
                    }
                    break;
                case 'title_values1':
                case 'title_values2':
                case 'title_values3':
                    if (!this.formData[field]?.trim()) {
                        this.errors[field] = `Value title is required`;
                    } else if (this.formData[field].trim().length < 3) {
                        this.errors[field] = `Value title must be at least 3 characters`;
                    }
                    break;
                case 'values1':
                case 'values2':
                case 'values3':
                    if (!this.formData[field]?.trim()) {
                        this.errors[field] = `Value description is required`;
                    } else if (this.formData[field].trim().length < 3) {
                        this.errors[field] = `Value description must be at least 3 characters`;
                    }
                    break;
                case 'story_img':
                    if (!this.isEditMode && !this.formData.story_img) {
                        this.errors.story_img = 'Image is required';
                    }
                    break;
                default:
                    break;
            }
        },
        
        validateForm() {
            let isValid = true;
            
            // Validate all required fields
            const fields = [
                'story', 'story2', 
                'title_values1', 'values1', 
                'title_values2', 'values2', 
                'title_values3', 'values3'
            ];
            
            fields.forEach(field => {
                this.validateField(field);
                if (this.errors[field]) isValid = false;
            });
            
            // Validate image only for new records
            if (!this.isEditMode) {
                this.validateField('story_img');
                if (this.errors.story_img) isValid = false;
            }
            
            return isValid;
        },
        
        submitForm() {
            if (!this.validateForm()) {
                // Apply shake animation
                this.isShaking = true;
                setTimeout(() => {
                    this.isShaking = false;
                }, 500);
                return;
            }
            
            // Create a form programmatically (like in showroom.blade.php)
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = this.isEditMode ? 
                `/dashboard/admin/about/${this.formData.id}` : 
                '/dashboard/admin/about';
            form.enctype = 'multipart/form-data';
            
            // CSRF token
            const csrfToken = document.querySelector('input[name="_token"]').value;
            const csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = csrfToken;
            form.appendChild(csrfInput);
            
            // Method (PUT for edit)
            if (this.isEditMode) {
                const methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'PUT';
                form.appendChild(methodInput);
            }
            
            // Add all form fields
            // Story fields
            const storyInput = document.createElement('input');
            storyInput.type = 'hidden';
            storyInput.name = 'story';
            storyInput.value = this.formData.story;
            form.appendChild(storyInput);
            
            const story2Input = document.createElement('input');
            story2Input.type = 'hidden';
            story2Input.name = 'story2';
            story2Input.value = this.formData.story2;
            form.appendChild(story2Input);
            
            // Values fields
            const values1Input = document.createElement('input');
            values1Input.type = 'hidden';
            values1Input.name = 'values1';
            values1Input.value = this.formData.values1;
            form.appendChild(values1Input);
            
            const title_values1Input = document.createElement('input');
            title_values1Input.type = 'hidden';
            title_values1Input.name = 'title_values1';
            title_values1Input.value = this.formData.title_values1;
            form.appendChild(title_values1Input);
            
            const values2Input = document.createElement('input');
            values2Input.type = 'hidden';
            values2Input.name = 'values2';
            values2Input.value = this.formData.values2;
            form.appendChild(values2Input);
            
            const title_values2Input = document.createElement('input');
            title_values2Input.type = 'hidden';
            title_values2Input.name = 'title_values2';
            title_values2Input.value = this.formData.title_values2;
            form.appendChild(title_values2Input);
            
            const values3Input = document.createElement('input');
            values3Input.type = 'hidden';
            values3Input.name = 'values3';
            values3Input.value = this.formData.values3;
            form.appendChild(values3Input);
            
            const title_values3Input = document.createElement('input');
            title_values3Input.type = 'hidden';
            title_values3Input.name = 'title_values3';
            title_values3Input.value = this.formData.title_values3;
            form.appendChild(title_values3Input);
            
            // Image (only if a new one is selected)
            if (this.formData.story_img instanceof File) {
                // For image files, we need to clone the file input
                const fileInput = document.getElementById('story_img').cloneNode(true);
                fileInput.name = 'story_img';
                form.appendChild(fileInput);
            }
            
            document.body.appendChild(form);
            form.submit();
        },
        
        cancelForm() {
            this.activeTab = 'list';
            this.resetForm();
        },
        
        deleteAbout(id, name) {
            this.deleteItemId = id;
            this.deleteItemName = name;
            this.isDeleteModalOpen = true;
        },
        
        confirmDelete() {
            // Create and submit a form to delete the About section
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/dashboard/admin/about/${this.deleteItemId}`;
            
            // CSRF token
            const csrfToken = document.querySelector('input[name="_token"]').value;
            const csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = csrfToken;
            form.appendChild(csrfInput);
            
            // Method (DELETE)
            const methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'DELETE';
            form.appendChild(methodInput);
            
            document.body.appendChild(form);
            form.submit();
        }
    }));
});
    </script>
</x-dashboard>
