<x-dashboard>
    <div x-data="userManager()" 
         x-init="initialize()" 
         class="px-4 sm:px-6 lg:px-8 py-6">

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

        <!-- User Table Section -->
        <div x-show="activeTab === 'list'" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             class="bg-white shadow-md rounded-lg p-4 sm:p-6 mb-8 max-w-6xl mx-auto overflow-hidden">
            <h2 class="text-xl font-semibold mb-4">Manage Users</h2>

            <!-- Desktop View - Full Table -->
            <div class="hidden md:block overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Username</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Join Date</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($users as $User)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $User['id'] }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ $User['username'] }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500">{{ $User['email'] }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium">
                                        @if($User['is_admin'] == 1)
                                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full">Admin</span>
                                        @else
                                            <span class="px-2 py-1 bg-gray-100 text-gray-800 rounded-full">User</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500">{{ $User['created_at'] }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" @click.prevent="editUser({{ $User['id'] }})" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Mobile View - Accordion Cards -->
            <div class="md:hidden space-y-6">
                @foreach ($users as $User)
                    <div class="bg-white border rounded-lg shadow-sm overflow-hidden">
                        <div x-data="{ open: false }" class="w-full">
                            <div @click="open = !open" class="flex justify-between items-center p-4 cursor-pointer bg-yellow-50 border-b">
                                <h3 class="text-sm font-medium text-gray-900">{{ $User['username'] }}</h3>
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
                                <div class="space-y-3">
                                    <div>
                                        <p class="text-xs font-medium text-gray-500 mb-1">ID</p>
                                        <p class="text-sm text-gray-900">{{ $User['id'] }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs font-medium text-gray-500 mb-1">Email</p>
                                        <p class="text-sm text-gray-900">{{ $User['email'] }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs font-medium text-gray-500 mb-1">Role</p>
                                        @if($User['is_admin'] == 1)
                                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">Admin</span>
                                        @else
                                            <span class="px-2 py-1 bg-gray-100 text-gray-800 rounded-full text-sm">User</span>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="text-xs font-medium text-gray-500 mb-1">Join Date</p>
                                        <p class="text-sm text-gray-900">{{ $User['created_at'] }}</p>
                                    </div>
                                </div>
                                
                                <div class="flex space-x-3 mt-4">
                                    <button
                                        @click="editUser({{ $User['id'] }})" 
                                        class="inline-flex items-center px-3 py-1 border border-indigo-600 text-indigo-600 text-sm rounded-md hover:bg-indigo-50">
                                        <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        Edit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Edit Form Section -->
        <div x-show="activeTab === 'form'" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100"
             class="bg-white shadow-md rounded-lg p-4 sm:p-6 max-w-4xl mx-auto">
            <h2 class="text-xl font-semibold mb-4">Edit User Role</h2>
            
            <form id="userForm" @submit.prevent="submitForm" class="space-y-4">
                @csrf
                <input type="hidden" name="_method" :value="formMethod">
                <input type="hidden" name="user_id" x-model="formData.id">

                <div>
                    <label for="username" class="block text-gray-700 font-medium mb-2">
                        Username
                    </label>
                    <input type="text" 
                        name="username" 
                        id="username"
                        x-model="formData.username"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400 bg-gray-100"
                        readonly>
                </div>

                <div>
                    <label for="email" class="block text-gray-700 font-medium mb-2">
                        Email
                    </label>
                    <input type="email" 
                        name="email" 
                        id="email"
                        x-model="formData.email"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400 bg-gray-100"
                        readonly>
                </div>

                <!-- Role Radio buttons -->
                <div>
                    <label class="block text-gray-700 font-medium mb-2">
                        User Role <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-2 space-y-2">
                        <div class="flex items-center">
                            <input id="admin" 
                                   name="is_admin" 
                                   type="radio" 
                                   value="1"
                                   x-model="formData.is_admin"
                                   class="h-4 w-4 text-yellow-400 focus:ring-yellow-500 border-gray-300">
                            <label for="admin" class="ml-2 block text-sm text-gray-700">
                                Admin
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input id="user" 
                                   name="is_admin" 
                                   type="radio" 
                                   value="0"
                                   x-model="formData.is_admin"
                                   class="h-4 w-4 text-yellow-400 focus:ring-yellow-500 border-gray-300">
                            <label for="user" class="ml-2 block text-sm text-gray-700">
                                Regular User
                            </label>
                        </div>
                    </div>
                    <p class="mt-1 text-sm text-red-500" x-show="errors.is_admin" x-text="errors.is_admin"></p>
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
                        Update Role
                    </button>
                </div>
            </form>
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
            Alpine.data('userManager', () => ({
                activeTab: '{{ isset($editUser) ? "form" : "list" }}',
                isEditMode: {{ isset($editUser) ? 'true' : 'false' }},
                formMethod: 'PUT',
                isShaking: false,
                notifications: {
                    success: '{{ session("success") }}',
                    error: '{{ session("error") }}'
                },
                formData: {
                    id: `{{ isset($editUser) ? $editUser->id : "" }}`,
                    username: `{{ isset($editUser) ? $editUser->username : "" }}`,
                    email: `{{ isset($editUser) ? $editUser->email : "" }}`,
                    is_admin: `{{ isset($editUser) ? $editUser->is_admin : "" }}`
                },
                errors: {
                    is_admin: null
                },
                
                initialize() {
                    console.log('User Manager initialized');
                    console.log('activeTab:', this.activeTab);
                    console.log('isEditMode:', this.isEditMode);
                    
                    // Auto-dismiss notifications after 5 seconds
                    if (this.notifications.success || this.notifications.error) {
                        setTimeout(() => {
                            this.notifications.success = null;
                            this.notifications.error = null;
                        }, 5000);
                    }
                },
                
                editUser(id) {
                    // Redirect to edit page
                    window.location.href = `/dashboard/admin/manageuser/${id}/edit`;
                },
                
                validateField(field) {
                    // Clear previous error
                    this.errors[field] = null;
                    
                    if (field === 'is_admin' && (this.formData.is_admin === '' || this.formData.is_admin === null)) {
                        this.errors.is_admin = 'Please select a role';
                    }
                },
                
                validateForm() {
                    let isValid = true;
                    
                    // Validate role selection
                    this.validateField('is_admin');
                    if (this.errors.is_admin) isValid = false;
                    
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
                    form.action = `/dashboard/admin/manageuser/${this.formData.id}`;
                    
                    // CSRF token
                    const csrfToken = document.querySelector('input[name="_token"]').value;
                    const csrfInput = document.createElement('input');
                    csrfInput.type = 'hidden';
                    csrfInput.name = '_token';
                    csrfInput.value = csrfToken;
                    form.appendChild(csrfInput);
                    
                    // Method (PUT for edit)
                    const methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    methodInput.value = 'PUT';
                    form.appendChild(methodInput);
                    
                    // Role field
                    const roleInput = document.createElement('input');
                    roleInput.type = 'hidden';
                    roleInput.name = 'is_admin';
                    roleInput.value = this.formData.is_admin;
                    form.appendChild(roleInput);
                    
                    document.body.appendChild(form);
                    form.submit();
                },
                
                cancelForm() {
                    window.location.href = '/dashboard/admin/manageuser';
                }
            }));
        });
    </script>
</x-dashboard>