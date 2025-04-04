<x-dashboard>
    <div x-data="contactManager()" 
         x-init="initialize()" 
         class="px-4 sm:px-6 lg:px-8 py-6">
         
        <!-- Mobile tabs -->
        <div class="sm:hidden mb-6 flex justify-center">
            <div class="bg-white rounded-lg shadow-md p-1 inline-flex space-x-1">
                <button 
                    @click="activeTab = 'list'" 
                    :class="{'bg-yellow-400 text-white': activeTab === 'list', 'text-gray-700': activeTab !== 'list'}"
                    class="px-4 py-2 text-sm font-medium rounded-md transition-colors duration-200">
                    View Contacts
                </button>
                <button 
                    @click="activeTab = 'form'" 
                    :class="{'bg-yellow-400 text-white': activeTab === 'form', 'text-gray-700': activeTab !== 'form'}"
                    class="px-4 py-2 text-sm font-medium rounded-md transition-colors duration-200">
                    <span x-text="isEditMode ? 'Edit Contact' : 'Add Contact'"></span>
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

        <!-- Contact Table Section -->
        <div x-show="activeTab === 'list'" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             class="bg-white shadow-md rounded-lg p-4 sm:p-6 mb-8 max-w-6xl mx-auto overflow-hidden">
            <h2 class="text-xl font-semibold mb-4">Administrator Contact</h2>

            <!-- Desktop View - Full Table -->
            <div class="hidden md:block overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($contact as $Contact)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $Contact['email'] }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500">{{ $Contact['phone'] }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" @click.prevent="editContact({{ $Contact['id'] }})" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                    <a href="#" @click.prevent="deleteContact({{ $Contact['id'] }}, '{{ $Contact['email'] }}')" class="text-red-600 hover:text-red-900">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Mobile View - Cards -->
            <div class="md:hidden space-y-6">
                @foreach ($contact as $Contact)
                    <div class="bg-white border rounded-lg shadow-sm overflow-hidden">
                        <div class="p-4 border-b bg-yellow-50">
                            <div class="flex justify-between items-center">
                                <h3 class="text-sm font-medium text-gray-900">{{ $Contact['email'] }}</h3>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="flex items-center mb-2">
                                <svg class="w-4 h-4 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span class="text-sm text-gray-600">{{ $Contact['phone'] }}</span>
                            </div>
                            
                            <div class="flex space-x-3 mt-3">
                                <button
                                    @click="editContact({{ $Contact['id'] }})" 
                                    class="inline-flex items-center px-3 py-1 border border-indigo-600 text-indigo-600 text-sm rounded-md hover:bg-indigo-50">
                                    <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </button>
                                <button 
                                    @click="deleteContact({{ $Contact['id'] }}, '{{ $Contact['email'] }}')"
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
            <h2 class="text-xl font-semibold mb-4" x-text="isEditMode ? 'Edit Contact' : 'Add New Contact'"></h2>
            
            <form id="contactForm" @submit.prevent="submitForm" class="space-y-4">
                @csrf
                <input type="hidden" name="_method" :value="formMethod">
                <input type="hidden" name="contact_id" x-model="formData.id">

                <div>
                    <label for="email" class="block text-gray-700 font-medium mb-2">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input type="email" 
                        name="email" 
                        id="email"
                        x-model="formData.email"
                        @input="validateField('email')"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                        :class="{'border-red-500': errors.email}"
                        placeholder="e.g. admin@example.com">
                    <p class="mt-1 text-sm text-red-500" x-show="errors.email" x-text="errors.email"></p>
                </div>

                <div>
                    <label for="phone" class="block text-gray-700 font-medium mb-2">
                        Phone <span class="text-red-500">*</span>
                    </label>
                    <input type="tel" 
                        name="phone" 
                        id="phone" 
                        x-model="formData.phone"
                        @input="validateField('phone')"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                        :class="{'border-red-500': errors.phone}"
                        placeholder="e.g. +1 234 567 8900">
                    <p class="mt-1 text-sm text-red-500" x-show="errors.phone" x-text="errors.phone"></p>
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
                        <span x-text="isEditMode ? 'Update Contact' : 'Save Contact'"></span>
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
                    Are you sure you want to delete contact "<span x-text="deleteItemName" class="font-semibold"></span>"? This action cannot be undone.
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
            Alpine.data('contactManager', () => ({
                activeTab: '{{ request()->is('*/edit') ? 'form' : 'list' }}',
                isEditMode: {{ isset($editContact) ? 'true' : 'false' }},
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
                    id: '{{ isset($editContact) ? $editContact->id : '' }}',
                    email: '{{ isset($editContact) ? $editContact->email : '' }}',
                    phone: '{{ isset($editContact) ? $editContact->phone : '' }}'
                },
                errors: {
                    email: null,
                    phone: null
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
                        email: '',
                        phone: ''
                    };
                    this.errors = {
                        email: null,
                        phone: null
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
                
                editContact(id) {
                    // Set edit mode and redirect to edit page
                    this.isEditMode = true;
                    this.formMethod = 'PUT';
                    window.location.href = `/dashboard/admin/contact/${id}/edit`;
                },
                
                validateField(field) {
                    // Clear previous error
                    this.errors[field] = null;
                    
                    // Validate based on field type
                    switch(field) {
                        case 'email':
                            if (!this.formData.email.trim()) {
                                this.errors.email = 'Email is required';
                            } else if (!this.isValidEmail(this.formData.email)) {
                                this.errors.email = 'Please enter a valid email address';
                            }
                            break;
                        case 'phone':
                            if (!this.formData.phone.trim()) {
                                this.errors.phone = 'Phone number is required';
                            } else if (this.formData.phone.trim().length < 5) {
                                this.errors.phone = 'Please enter a valid phone number';
                            }
                            break;
                        default:
                            break;
                    }
                },
                
                isValidEmail(email) {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    return emailRegex.test(email);
                },
                
                validateForm() {
                    let isValid = true;
                    
                    // Validate all required fields
                    const fields = ['email', 'phone'];
                    
                    fields.forEach(field => {
                        this.validateField(field);
                        if (this.errors[field]) isValid = false;
                    });
                    
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
                    
                    // Create and submit form
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = this.isEditMode ? 
                        `/dashboard/admin/contact/${this.formData.id}` : 
                        '/dashboard/admin/contact';
                    
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
                    Object.keys(this.formData).forEach(key => {
                        if (key !== 'id') {
                            const input = document.createElement('input');
                            input.type = 'hidden';
                            input.name = key;
                            input.value = this.formData[key];
                            form.appendChild(input);
                        }
                    });
                    
                    document.body.appendChild(form);
                    form.submit();
                },
                
                cancelForm() {
                    this.activeTab = 'list';
                    this.resetForm();
                },
                
                deleteContact(id, email) {
                    this.deleteItemId = id;
                    this.deleteItemName = email;
                    this.isDeleteModalOpen = true;
                },
                
                confirmDelete() {
                    // Create and submit a form to delete the contact
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `/dashboard/admin/contact/${this.deleteItemId}`;
                    
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
            }))
        });
    </script>
</x-dashboard>