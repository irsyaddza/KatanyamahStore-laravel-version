<x-dashboard>
    <div x-data="teamManager()" 
         x-init="initialize()" 
         class="px-4 sm:px-6 lg:px-8 py-6">
         
        <!-- Mobile tabs -->
        <div class="sm:hidden mb-6 flex justify-center">
            <div class="bg-white rounded-lg shadow-md p-1 inline-flex space-x-1">
                <button 
                    @click="activeTab = 'list'" 
                    :class="{'bg-yellow-400 text-white': activeTab === 'list', 'text-gray-700': activeTab !== 'list'}"
                    class="px-4 py-2 text-sm font-medium rounded-md transition-colors duration-200">
                    View Teams
                </button>
                <button 
                    @click="activeTab = 'form'" 
                    :class="{'bg-yellow-400 text-white': activeTab === 'form', 'text-gray-700': activeTab !== 'form'}"
                    class="px-4 py-2 text-sm font-medium rounded-md transition-colors duration-200">
                    <span x-text="isEditMode ? 'Edit Team' : 'Add Team'"></span>
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

        <!-- Team Table Section -->
        <div x-show="activeTab === 'list'" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             class="bg-white shadow-md rounded-lg p-4 sm:p-6 mb-8 max-w-6xl mx-auto overflow-hidden">
            <h2 class="text-xl font-semibold mb-4">Team Section</h2>

            <!-- Desktop View - Full Table -->
            <div class="hidden md:block overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rank</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bio</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Instagram</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($team as $Team)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $Team['team_name'] }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500">{{ $Team['team_rank'] }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="h-16 w-16 overflow-hidden">
                                        <img src="{{ asset('storage/' . $Team['team_img']) }}" alt="Team Member Image" class="h-full w-full object-cover">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500">{{ Str::limit($Team['team_bio'], 50) }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500 hover:underline hover:text-blue-500"><a href="{{ ('https://instagram.com/' . $Team['team_instagram']) }}">
                                    {{ $Team['team_instagram'] }}</a></div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" @click.prevent="editTeam({{ $Team['id'] }})" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                    <a href="#" @click.prevent="deleteTeam({{ $Team['id'] }}, '{{ $Team['team_name'] }}')" class="text-red-600 hover:text-red-900">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Mobile View - Accordion Cards -->
            <div class="md:hidden space-y-6">
                @foreach ($team as $Team)
                    <div class="bg-white border rounded-lg shadow-sm overflow-hidden">
                        <div x-data="{ open: false }" class="w-full">
                            <div @click="open = !open" class="flex justify-between items-center p-4 cursor-pointer bg-yellow-50 border-b">
                                <h3 class="text-sm font-medium text-gray-900">{{ $Team['team_name'] }}</h3>
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
                                        <p class="text-xs font-medium text-gray-500 mb-1">Name</p>
                                        <p class="text-sm text-gray-700">{{ $Team['team_name'] }}</p>
                                    </div>
                                    
                                    <div>
                                        <p class="text-xs font-medium text-gray-500 mb-1">Rank</p>
                                        <p class="text-sm text-gray-700">{{ $Team['team_rank'] }}</p>
                                    </div>
                                    
                                    <div>
                                        <p class="text-xs font-medium text-gray-500 mb-1">Image</p>
                                        <div class="h-32 w-full overflow-hidden">
                                            <img src="{{ asset('storage/' . $Team['team_img']) }}" alt="Team Member Image" class="h-full w-auto object-cover">
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <p class="text-xs font-medium text-gray-500 mb-1">Bio</p>
                                        <p class="text-sm text-gray-700">{{ $Team['team_bio'] }}</p>
                                    </div>
                                    
                                    <div>
                                        <p class="text-xs font-medium text-gray-500 mb-1">Instagram</p>
                                        <p class="text-sm text-gray-700">{{ $Team['team_instagram'] }}</p>
                                    </div>
                                </div>
                                
                                <div class="flex space-x-3 mt-6">
                                    <button
                                        @click="editTeam({{ $Team['id'] }})" 
                                        class="inline-flex items-center px-3 py-1 border border-indigo-600 text-indigo-600 text-sm rounded-md hover:bg-indigo-50">
                                        <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        Edit
                                    </button>
                                    <button 
                                        @click="deleteTeam({{ $Team['id'] }}, '{{ $Team['team_name'] }}')"
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
            <h2 class="text-xl font-semibold mb-4" x-text="isEditMode ? 'Edit Team Member' : 'Add New Team Member'"></h2>
            
            <form id="teamForm" @submit.prevent="submitForm" class="space-y-4" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" :value="formMethod">
                <input type="hidden" name="team_id" x-model="formData.id">

                <div>
                    <label for="team_name" class="block text-gray-700 font-medium mb-2">
                        Name <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text"
                        name="team_name" 
                        id="team_name" 
                        x-model="formData.team_name"
                        @input="validateField('team_name')"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                        :class="{'border-red-500': errors.team_name}"
                        placeholder="Enter team member's name">
                    <p class="mt-1 text-sm text-red-500" x-show="errors.team_name" x-text="errors.team_name"></p>
                </div>

                <div>
                    <label for="team_rank" class="block text-gray-700 font-medium mb-2">
                        Rank/Position <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text"
                        name="team_rank" 
                        id="team_rank" 
                        x-model="formData.team_rank"
                        @input="validateField('team_rank')"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                        :class="{'border-red-500': errors.team_rank}"
                        placeholder="Enter team member's position">
                    <p class="mt-1 text-sm text-red-500" x-show="errors.team_rank" x-text="errors.team_rank"></p>
                </div>

                <div>
                    <label for="team_bio" class="block text-gray-700 font-medium mb-2">
                        Bio <span class="text-red-500">*</span>
                    </label>
                    <textarea 
                        name="team_bio" 
                        id="team_bio" 
                        rows="3"
                        x-model="formData.team_bio"
                        @input="validateField('team_bio')"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                        :class="{'border-red-500': errors.team_bio}"
                        placeholder="Enter team member's bio"></textarea>
                    <p class="mt-1 text-sm text-red-500" x-show="errors.team_bio" x-text="errors.team_bio"></p>
                </div>

                <div>
                    <label for="team_instagram" class="block text-gray-700 font-medium mb-2">
                        Instagram <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="text"
                        name="team_instagram" 
                        id="team_instagram" 
                        x-model="formData.team_instagram"
                        @input="validateField('team_instagram')"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                        :class="{'border-red-500': errors.team_instagram}"
                        placeholder="Enter Instagram username (without @)">
                    <p class="mt-1 text-sm text-red-500" x-show="errors.team_instagram" x-text="errors.team_instagram"></p>
                </div>

                <div>
                    <label for="team_img" class="block text-gray-700 font-medium mb-2">
                        Profile Image <span class="text-red-500">*</span>
                    </label>
                    <div class="flex items-center space-x-4">
                        <div x-show="formData.team_img_preview" class="h-24 w-24 border rounded overflow-hidden">
                            <img :src="formData.team_img_preview" alt="Preview" class="h-full w-full object-cover">
                        </div>
                        <div class="flex-1">
                            <label class="block">
                                <span class="sr-only">Choose file</span>
                                <input type="file"
                                    name="team_img" 
                                    id="team_img"
                                    @change="handleImageUpload"
                                    class="block w-full text-sm text-gray-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-medium
                                    file:bg-yellow-50 file:text-yellow-700
                                    hover:file:bg-yellow-100"
                                    :class="{'border-red-500': errors.team_img}"
                                    accept="image/*">
                            </label>
                            <p class="mt-1 text-sm text-gray-500">JPG, PNG, or GIF up to 1MB</p>
                            <p class="mt-1 text-sm text-red-500" x-show="errors.team_img" x-text="errors.team_img"></p>
                        </div>
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
                     <span x-text="isEditMode ? 'Update Team Member' : 'Save Team Member'"></span>
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
    Alpine.data('teamManager', () => ({
        activeTab: '{{ request()->is("*/edit") ? "form" : "list" }}',
        isEditMode: {{ isset($editTeam) ? 'true' : 'false' }},
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
            id: '{{ isset($editTeam) ? $editTeam->id : "" }}',
            team_name: '{{ isset($editTeam) ? $editTeam->team_name : "" }}',
            team_rank: '{{ isset($editTeam) ? $editTeam->team_rank : "" }}',
            team_img: null,
            team_img_preview: '{{ isset($editTeam) ? asset("storage/" . $editTeam->team_img) : "" }}',
            team_bio: '{{ isset($editTeam) ? $editTeam->team_bio : "" }}',
            team_instagram: '{{ isset($editTeam) ? $editTeam->team_instagram : "" }}'
        },
        errors: {
            team_name: null,
            team_rank: null,
            team_img: null,
            team_bio: null,
            team_instagram: null
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
                team_name: '',
                team_rank: '',
                team_img: null,
                team_img_preview: '',
                team_bio: '',
                team_instagram: ''
            };
            this.errors = {
                team_name: null,
                team_rank: null,
                team_img: null,
                team_bio: null,
                team_instagram: null
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
            this.errors.team_img = null;
            
            if (!file) return;
            
            // Validate file size (1MB = 1024 * 1024 bytes)
            if (file.size > 1024 * 1024) {
                this.errors.team_img = 'Image size should be less than 1MB';
                event.target.value = '';
                return;
            }
            
            // Validate file type
            if (!['image/jpeg', 'image/png', 'image/gif'].includes(file.type)) {
                this.errors.team_img = 'Please upload a valid image (JPG, PNG, GIF)';
                event.target.value = '';
                return;
            }
            
            // Set file and preview
            this.formData.team_img = file;
            
            // Create image preview
            const reader = new FileReader();
            reader.onload = e => {
                this.formData.team_img_preview = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        
        editTeam(id) {
            // Set edit mode and redirect to edit page
            this.isEditMode = true;
            this.formMethod = 'PUT';
            window.location.href = `/dashboard/admin/team/${id}/edit`;
        },
        
        validateField(field) {
            // Clear previous error
            this.errors[field] = null;
            
            // Validate based on field type
            switch(field) {
                case 'team_name':
                    if (!this.formData[field]?.trim()) {
                        this.errors[field] = 'Name is required';
                    }
                    break;
                    case 'team_rank':
                    if (!this.formData[field]?.trim()) {
                        this.errors[field] = 'Rank/Position is required';
                    }
                    break;
                case 'team_bio':
                    if (!this.formData[field]?.trim()) {
                        this.errors[field] = 'Bio is required';
                    }
                    break;
                case 'team_instagram':
                    if (!this.formData[field]?.trim()) {
                        this.errors[field] = 'Instagram username is required';
                    }
                    break;
                case 'team_img':
                    if (!this.isEditMode && !this.formData.team_img) {
                        this.errors.team_img = 'Image is required';
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
                'team_name', 'team_rank', 'team_bio', 'team_instagram'
            ];
            
            fields.forEach(field => {
                this.validateField(field);
                if (this.errors[field]) isValid = false;
            });
            
            // Validate image only for new records
            if (!this.isEditMode) {
                this.validateField('team_img');
                if (this.errors.team_img) isValid = false;
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
            
            // Create a form programmatically
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = this.isEditMode ? 
                `/dashboard/admin/team/${this.formData.id}` : 
                '/dashboard/admin/team';
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
            const teamNameInput = document.createElement('input');
            teamNameInput.type = 'hidden';
            teamNameInput.name = 'team_name';
            teamNameInput.value = this.formData.team_name;
            form.appendChild(teamNameInput);
            
            const teamRankInput = document.createElement('input');
            teamRankInput.type = 'hidden';
            teamRankInput.name = 'team_rank';
            teamRankInput.value = this.formData.team_rank;
            form.appendChild(teamRankInput);
            
            const teamBioInput = document.createElement('input');
            teamBioInput.type = 'hidden';
            teamBioInput.name = 'team_bio';
            teamBioInput.value = this.formData.team_bio;
            form.appendChild(teamBioInput);
            
            const teamInstagramInput = document.createElement('input');
            teamInstagramInput.type = 'hidden';
            teamInstagramInput.name = 'team_instagram';
            teamInstagramInput.value = this.formData.team_instagram;
            form.appendChild(teamInstagramInput);
            
            // Image (only if a new one is selected)
            if (this.formData.team_img instanceof File) {
                // For image files, we need to clone the file input
                const fileInput = document.getElementById('team_img').cloneNode(true);
                fileInput.name = 'team_img';
                form.appendChild(fileInput);
            }
            
            document.body.appendChild(form);
            form.submit();
        },
        
        cancelForm() {
            this.activeTab = 'list';
            this.resetForm();
        },
        
        deleteTeam(id, name) {
            this.deleteItemId = id;
            this.deleteItemName = name;
            this.isDeleteModalOpen = true;
        },
        
        confirmDelete() {
            // Create and submit a form to delete the team member
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/dashboard/admin/team/${this.deleteItemId}`;
            
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