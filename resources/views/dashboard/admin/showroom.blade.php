<x-dashboard>
    <div x-data="skinManager()" 
         x-init="initialize()" 
         class="px-4 sm:px-6 lg:px-8 py-6">
         
        <!-- Mobile tabs -->
        <div class="sm:hidden mb-6 flex justify-center">
            <div class="bg-white rounded-lg shadow-md p-1 inline-flex space-x-1">
                <button 
                    @click="activeTab = 'list'" 
                    :class="{'bg-yellow-400 text-white': activeTab === 'list', 'text-gray-700': activeTab !== 'list'}"
                    class="px-4 py-2 text-sm font-medium rounded-md transition-colors duration-200">
                    View Skins
                </button>
                <button 
                    @click="activeTab = 'form'" 
                    :class="{'bg-yellow-400 text-white': activeTab === 'form', 'text-gray-700': activeTab !== 'form'}"
                    class="px-4 py-2 text-sm font-medium rounded-md transition-colors duration-200">
                    <span x-text="isEditMode ? 'Edit Skin' : 'Add Skin'"></span>
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

        <template x-if="notifications.error">
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 mx-auto max-w-6xl"
                role="alert" x-text="notifications.error"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform -translate-y-2" 
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform -translate-y-2">
            </div>
        </template>

        <!-- Skin Table Section -->
        <div x-show="activeTab === 'list'" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             class="bg-white shadow-md rounded-lg p-4 sm:p-6 mb-8 max-w-6xl mx-auto overflow-hidden">
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
                                            <img class="h-12 w-12 rounded object-cover" 
                                                 src="{{ asset('storage/' . $skin->img_url) }}" 
                                                 alt="{{ $skin->name }}">
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
                                    <a href="#" @click.prevent="editSkin({{ $skin->id }})" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                    <a href="#" @click.prevent="deleteSkin({{ $skin->id }}, '{{ $skin->name }}')" class="text-red-600 hover:text-red-900">Delete</a>
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
                                    @click="editSkin({{ $skin->id }})" 
                                    class="inline-flex items-center px-3 py-1 border border-yellow-600 text-yellow-600 text-sm rounded-md hover:bg-yellow-50">
                                    <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </button>
                                <button 
                                    @click="deleteSkin({{ $skin->id }}, '{{ $skin->name }}')"
                                    class="inline-flex items-center px-3 py-1 border border-red-600 text-red-600 text-sm rounded-md hover:bg-red-50">
                                    <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    Delete
                                </button>
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
            <h2 class="text-xl font-semibold mb-4" x-text="isEditMode ? 'Edit Skin' : 'Add New Skin'"></h2>
            
            <form id="skinForm" @submit.prevent="submitForm" 
                  enctype="multipart/form-data" class="space-y-4">
                @csrf
                <input type="hidden" name="_method" :value="formMethod">
                <input type="hidden" name="skin_id" x-model="formData.id">

                <div>
                    <label for="name" class="block text-gray-700 font-medium mb-2">
                        Skin Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           name="name" 
                           id="name"
                           x-model="formData.name"
                           @input="validateField('name')"
                           class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                           :class="{'border-red-500': errors.name}"
                           placeholder="e.g. Premium Skin">
                    <p class="mt-1 text-sm text-red-500" x-show="errors.name" x-text="errors.name"></p>
                </div>

                <!-- Image Upload -->
                <div>
                    <label for="img_url" class="block text-gray-700 font-medium mb-2">
                        Skin Image <span class="text-red-500" x-show="!isEditMode || !formData.currentImage">*</span>
                    </label>
                    <input type="file" 
                           name="img_url" 
                           id="img_url"
                           @change="handleImageUpload($event)"
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-yellow-600 file:text-gray-700 hover:file:bg-yellow-500 focus:outline-none"
                           :class="{'border-red-500': errors.img_url}"
                           accept="image/*">
                    <p class="mt-1 text-sm text-gray-500">PNG, JPG, GIF up to 1MB</p>
                    <p class="mt-1 text-sm text-red-500" x-show="errors.img_url" x-text="errors.img_url"></p>
                    <p class="mt-1 text-sm text-red-500" x-show="errors.img_size" x-text="errors.img_size"></p>
                </div>

                <!-- Image Preview -->
                <div x-show="formData.imagePreview || formData.currentImage" class="mt-2">
                    <label class="block text-gray-700 font-medium mb-2">Image Preview</label>
                    <img :src="formData.imagePreview || (formData.currentImage ? '{{ asset('storage/') }}/' + formData.currentImage : '')" 
                         class="h-32 w-32 object-cover rounded-md border border-yellow-400">
                </div>

                <!-- Status Radio buttons -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">
                        Status <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-2 space-y-2">
                        <div class="flex items-center">
                            <input id="available" 
                                   name="status" 
                                   type="radio" 
                                   value="1"
                                   x-model="formData.status"
                                   @change="validateField('status')"
                                   class="h-4 w-4 text-yellow-400 focus:ring-yellow-500 border-gray-300">
                            <label for="available" class="ml-2 block text-sm text-gray-700">
                                Available
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input id="sold_out" 
                                   name="status" 
                                   type="radio" 
                                   value="0"
                                   x-model="formData.status"
                                   @change="validateField('status')"
                                   class="h-4 w-4 text-yellow-400 focus:ring-yellow-500 border-gray-300">
                            <label for="sold_out" class="ml-2 block text-sm text-gray-700">
                                Sold Out
                            </label>
                        </div>
                    </div>
                    <p class="mt-1 text-sm text-red-500" x-show="errors.status" x-text="errors.status"></p>
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
                        <span x-text="isEditMode ? 'Update Skin' : 'Save Skin'"></span>
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
            Alpine.data('skinManager', () => ({
                activeTab: '{{ request()->is('*/edit') ? 'form' : 'list' }}',
                isEditMode: {{ isset($editSkin) ? 'true' : 'false' }},
                formMethod: 'POST',
                deleteItemId: null,
                deleteItemName: '',
                isDeleteModalOpen: false,
                isShaking: false,
                notifications: {
                    success: '{{ session('success') }}',
                    error: '{{ session('error') }}'
                },
                formData: {
                    id: '{{ isset($editSkin) ? $editSkin->id : '' }}',
                    name: '{{ isset($editSkin) ? $editSkin->name : '' }}',
                    status: '{{ isset($editSkin) ? $editSkin->status : '1' }}',
                    currentImage: '{{ isset($editSkin) ? $editSkin->img_url : '' }}',
                    imagePreview: null,
                    imageFile: null
                },
                errors: {
                    name: null,
                    img_url: null,
                    img_size: null,
                    status: null
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
                        name: '',
                        status: '1',
                        currentImage: '',
                        imagePreview: null,
                        imageFile: null
                    };
                    this.errors = {
                        name: null,
                        img_url: null,
                        img_size: null,
                        status: null
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
                
                editSkin(id) {
                    // Fetch skin data via AJAX and populate form
                    this.isEditMode = true;
                    this.formMethod = 'PUT';
                    
                    // In a real application, you'd fetch the skin data from the server
                    // For now, we'll redirect to the edit page
                    window.location.href = `/dashboard/admin/showroom/${id}/edit`;
                },
                
                handleImageUpload(event) {
                    const file = event.target.files[0];
                    this.errors.img_url = null;
                    this.errors.img_size = null;
                    
                    if (file) {
                        // Check file size (1MB = 1024 * 1024 bytes)
                        if (file.size > 1024 * 1024) {
                            this.errors.img_size = 'Image size must be less than 1MB';
                            event.target.value = ''; // Clear the file input
                            this.formData.imagePreview = null;
                            this.formData.imageFile = null;
                            return;
                        }
                        
                        this.formData.imageFile = file;
                        this.formData.imagePreview = URL.createObjectURL(file);
                    } else {
                        this.formData.imagePreview = null;
                        this.formData.imageFile = null;
                    }
                },
                
                validateField(field) {
                    switch(field) {
                        case 'name':
                            this.errors.name = !this.formData.name.trim() ? 
                                'Skin name is required' : null;
                            break;
                        case 'img_url':
                            if (!this.isEditMode && !this.formData.imageFile) {
                                this.errors.img_url = 'Skin image is required';
                            } else {
                                this.errors.img_url = null;
                            }
                            break;
                        case 'status':
                            this.errors.status = this.formData.status === null ? 
                                'Status selection is required' : null;
                            break;
                        default:
                            break;
                    }
                },
                
                validateForm() {
                    let isValid = true;
                    
                    // Validate name
                    this.validateField('name');
                    if (this.errors.name) isValid = false;
                    
                    // Validate image
                    this.validateField('img_url');
                    if (this.errors.img_url || this.errors.img_size) isValid = false;
                    
                    // Validate status
                    this.validateField('status');
                    if (this.errors.status) isValid = false;
                    
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
                    
                    // In a real application, you'd submit the form with FormData
                    // For now, we'll simulate the form submission
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = this.isEditMode ? 
                        `/dashboard/admin/showroom/${this.formData.id}` : 
                        '/dashboard/admin/showroom';
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
                    
                    // Name
                    const nameInput = document.createElement('input');
                    nameInput.type = 'hidden';
                    nameInput.name = 'name';
                    nameInput.value = this.formData.name;
                    form.appendChild(nameInput);
                    
                    // Status
                    const statusInput = document.createElement('input');
                    statusInput.type = 'hidden';
                    statusInput.name = 'status';
                    statusInput.value = this.formData.status;
                    form.appendChild(statusInput);
                    
                    // Image (only if a new one is selected)
                    if (this.formData.imageFile) {
                        // For image files, we need to clone the file input
                        const fileInput = document.getElementById('img_url').cloneNode(true);
                        fileInput.name = 'img_url';
                        form.appendChild(fileInput);
                    }
                    
                    document.body.appendChild(form);
                    form.submit();
                },
                
                cancelForm() {
                    this.activeTab = 'list';
                    this.resetForm();
                },
                
                deleteSkin(id, name) {
                    this.deleteItemId = id;
                    this.deleteItemName = name;
                    this.isDeleteModalOpen = true;
                },
                
                confirmDelete() {
                    // Create and submit a form to delete the skin
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `/dashboard/admin/showroom/${this.deleteItemId}`;
                    
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