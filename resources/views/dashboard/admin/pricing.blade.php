<x-dashboard>
    <div x-data="pricingManager()" 
         x-init="initialize()" 
         class="px-4 sm:px-6 lg:px-8 py-6">
         
        <!-- Mobile tabs -->
        <div class="sm:hidden mb-6 flex justify-center">
            <div class="bg-white rounded-lg shadow-md p-1 inline-flex space-x-1">
                <button 
                    @click="activeTab = 'list'" 
                    :class="{'bg-yellow-400 text-white': activeTab === 'list', 'text-gray-700': activeTab !== 'list'}"
                    class="px-4 py-2 text-sm font-medium rounded-md transition-colors duration-200">
                    View Plans
                </button>
                <button 
                    @click="activeTab = 'form'" 
                    :class="{'bg-yellow-400 text-white': activeTab === 'form', 'text-gray-700': activeTab !== 'form'}"
                    class="px-4 py-2 text-sm font-medium rounded-md transition-colors duration-200">
                    <span x-text="isEditMode ? 'Edit Plan' : 'Add Plan'"></span>
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

        <!-- Pricing Table Section -->
        <div x-show="activeTab === 'list'" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             class="bg-white shadow-md rounded-lg p-4 sm:p-6 mb-8 max-w-6xl mx-auto overflow-hidden">
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
                                    <a href="#" @click.prevent="editPricing({{ $Pricing['id'] }})" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                    <a href="#" @click.prevent="deletePricing({{ $Pricing['id'] }}, '{{ $Pricing['price_title'] }}')" class="text-red-600 hover:text-red-900">Delete</a>
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
                                   @click="editPricing({{ $Pricing['id'] }})" 
                                   class="inline-flex items-center px-3 py-1 border border-yellow-600 text-yellow-600 text-sm rounded-md hover:bg-yellow-50">
                                    <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </button>
                                <button 
                                    @click="deletePricing({{ $Pricing['id'] }}, '{{ $Pricing['price_title'] }}')"
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
            <h2 class="text-xl font-semibold mb-4" x-text="isEditMode ? 'Edit Pricing Plan' : 'Add New Pricing Plan'"></h2>
            
            <form id="pricingForm" @submit.prevent="submitForm" class="space-y-4">
                @csrf
                <input type="hidden" name="_method" :value="formMethod">
                <input type="hidden" name="pricing_id" x-model="formData.id">

                <div>
                    <label for="price_title" class="block text-gray-700 font-medium mb-2">
                        Price Title <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                        name="price_title" 
                        id="price_title"
                        x-model="formData.price_title"
                        @input="validateField('price_title')"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                        :class="{'border-red-500': errors.price_title}"
                        placeholder="e.g. Basic Plan">
                    <p class="mt-1 text-sm text-red-500" x-show="errors.price_title" x-text="errors.price_title"></p>
                </div>

                <div>
                    <label for="price_desc" class="block text-gray-700 font-medium mb-2">
                        Price Description <span class="text-red-500">*</span>
                    </label>
                    <textarea 
                        name="price_desc" 
                        id="price_desc" 
                        rows="3"
                        x-model="formData.price_desc"
                        @input="validateField('price_desc')"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                        :class="{'border-red-500': errors.price_desc}"
                        placeholder="Short description of the pricing plan"></textarea>
                    <p class="mt-1 text-sm text-red-500" x-show="errors.price_desc" x-text="errors.price_desc"></p>
                </div>

                <div>
                    <label for="price" class="block text-gray-700 font-medium mb-2">
                        Price (IDR) <span class="text-red-500">*</span>
                    </label>
                    <input type="number" 
                        name="price" 
                        id="price"
                        x-model="formData.price"
                        @input="validateField('price')"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                        :class="{'border-red-500': errors.price}"
                        placeholder="e.g. 99000">
                    <p class="mt-1 text-sm text-red-500" x-show="errors.price" x-text="errors.price"></p>
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
                    
                    <div x-show="showFeatures" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         class="p-4 space-y-4">
                        <!-- Feature 1 -->
                        <div>
                            <label for="price_feature1" class="block text-gray-700 font-medium mb-2">
                                Feature 1 <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                name="price_feature1" 
                                id="price_feature1"
                                x-model="formData.price_feature1"
                                @input="validateField('price_feature1')"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                                :class="{'border-red-500': errors.price_feature1}"
                                placeholder="e.g. Unlimited Access">
                            <p class="mt-1 text-sm text-red-500" x-show="errors.price_feature1" x-text="errors.price_feature1"></p>
                        </div>

                        <!-- Feature 2 -->
                        <div>
                            <label for="price_feature2" class="block text-gray-700 font-medium mb-2">
                                Feature 2 <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                name="price_feature2" 
                                id="price_feature2"
                                x-model="formData.price_feature2"
                                @input="validateField('price_feature2')"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                                :class="{'border-red-500': errors.price_feature2}"
                                placeholder="e.g. 24/7 Support">
                            <p class="mt-1 text-sm text-red-500" x-show="errors.price_feature2" x-text="errors.price_feature2"></p>
                        </div>

                        <!-- Feature 3 -->
                        <div>
                            <label for="price_feature3" class="block text-gray-700 font-medium mb-2">
                                Feature 3 <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                name="price_feature3" 
                                id="price_feature3"
                                x-model="formData.price_feature3"
                                @input="validateField('price_feature3')"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                                :class="{'border-red-500': errors.price_feature3}"
                                placeholder="e.g. Premium Content">
                            <p class="mt-1 text-sm text-red-500" x-show="errors.price_feature3" x-text="errors.price_feature3"></p>
                        </div>

                        <!-- Feature 4 -->
                        <div>
                            <label for="price_feature4" class="block text-gray-700 font-medium mb-2">
                                Feature 4 <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                name="price_feature4" 
                                id="price_feature4"
                                x-model="formData.price_feature4"
                                @input="validateField('price_feature4')"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                                :class="{'border-red-500': errors.price_feature4}"
                                placeholder="e.g. Priority Access">
                            <p class="mt-1 text-sm text-red-500" x-show="errors.price_feature4" x-text="errors.price_feature4"></p>
                        </div>

                        <!-- Feature 5 -->
                        <div>
                            <label for="price_feature5" class="block text-gray-700 font-medium mb-2">
                                Feature 5 <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                name="price_feature5" 
                                id="price_feature5"
                                x-model="formData.price_feature5"
                                @input="validateField('price_feature5')"
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400"
                                :class="{'border-red-500': errors.price_feature5}"
                                placeholder="e.g. Exclusive Content">
                            <p class="mt-1 text-sm text-red-500" x-show="errors.price_feature5" x-text="errors.price_feature5"></p>
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
                        <span x-text="isEditMode ? 'Update Pricing' : 'Save Pricing'"></span>
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
            Alpine.data('pricingManager', () => ({
                activeTab: '{{ request()->is('*/edit') ? 'form' : 'list' }}',
                isEditMode: {{ isset($editPricing) ? 'true' : 'false' }},
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
                    id: '{{ isset($editPricing) ? $editPricing->id : '' }}',
                    price_title: '{{ isset($editPricing) ? $editPricing->price_title : '' }}',
                    price_desc: '{{ isset($editPricing) ? $editPricing->price_desc : '' }}',
                    price: '{{ isset($editPricing) ? $editPricing->price : '' }}',
                    price_feature1: '{{ isset($editPricing) ? $editPricing->price_feature1 : '' }}',
                    price_feature2: '{{ isset($editPricing) ? $editPricing->price_feature2 : '' }}',
                    price_feature3: '{{ isset($editPricing) ? $editPricing->price_feature3 : '' }}',
                    price_feature4: '{{ isset($editPricing) ? $editPricing->price_feature4 : '' }}',
                    price_feature5: '{{ isset($editPricing) ? $editPricing->price_feature5 : '' }}'
                },
                errors: {
                    price_title: null,
                    price_desc: null,
                    price: null,
                    price_feature1: null,
                    price_feature2: null,
                    price_feature3: null,
                    price_feature4: null,
                    price_feature5: null
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
                        price_title: '',
                        price_desc: '',
                        price: '',
                        price_feature1: '',
                        price_feature2: '',
                        price_feature3: '',
                        price_feature4: '',
                        price_feature5: ''
                    };
                    this.errors = {
                        price_title: null,
                        price_desc: null,
                        price: null,
                        price_feature1: null,
                        price_feature2: null,
                        price_feature3: null,
                        price_feature4: null,
                        price_feature5: null
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
                
                editPricing(id) {
                    // Set edit mode and redirect to edit page
                    this.isEditMode = true;
                    this.formMethod = 'PUT';
                    window.location.href = `/dashboard/admin/pricing/${id}/edit`;
                },
                
                validateField(field) {
                    // Clear previous error
                    this.errors[field] = null;
                    
                    // Validate based on field type
                    switch(field) {
                        case 'price_title':
                            if (!this.formData.price_title.trim()) {
                                this.errors.price_title = 'Plan title is required';
                            } else if (this.formData.price_title.trim().length < 3) {
                                this.errors.price_title = 'Plan title must be at least 3 characters';
                            }
                            break;
                        case 'price_desc':
                            if (!this.formData.price_desc.trim()) {
                                this.errors.price_desc = 'Plan description is required';
                            }
                            break;
                        case 'price':
                            if (!this.formData.price) {
                                this.errors.price = 'Price is required';
                            } else if (isNaN(this.formData.price) || this.formData.price <= 0) {
                                this.errors.price = 'Price must be a valid positive number';
                            }
                            break;
                        case 'price_feature1':
                        case 'price_feature2':
                        case 'price_feature3':
                        case 'price_feature4':
                        case 'price_feature5':
                            if (!this.formData[field].trim()) {
                                this.errors[field] = 'Feature cannot be empty';
                            }
                            break;
                        default:
                            break;
                    }
                },
                
                validateForm() {
                    let isValid = true;
                    
                    // Validate all fields
                    const fields = [
                        'price_title', 'price_desc', 'price',
                        'price_feature1', 'price_feature2', 'price_feature3',
                        'price_feature4', 'price_feature5'
                    ];
                    
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
                        `/dashboard/admin/pricing/${this.formData.id}` : 
                        '/dashboard/admin/pricing';
                    
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
                
                deletePricing(id, name) {
                    this.deleteItemId = id;
                    this.deleteItemName = name;
                    this.isDeleteModalOpen = true;
                },
                
                confirmDelete() {
                    // Create and submit a form to delete the pricing plan
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `/dashboard/admin/pricing/${this.deleteItemId}`;
                    
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