<x-layout>
    <div class="min-h-screen flex items-center justify-center px-4 py-8 sm:py-12 bg-yellow-400">
        <div class="container mx-auto max-w-md">
            <!-- Alerts Container -->
            <div x-data="{ showSuccess: {{ session()->has('success') ? 'true' : 'false' }}, showError: {{ session()->has('loginError') ? 'true' : 'false' }} }">
                <!-- Success Alert -->
                <div 
                    x-show="showSuccess" 
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform -translate-y-4"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    class="bg-gray-800 rounded-xl shadow-lg overflow-hidden w-full mx-auto mb-6"
                >
                    @if (session()->has('success'))
                        <div class="flex items-center p-4 bg-green-500 text-white rounded-t-xl">
                            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <p>{{ session('success') }}</p>
                            <button 
                                @click="showSuccess = false" 
                                type="button" 
                                class="ml-auto text-white hover:text-gray-200 focus:outline-none"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    @endif
                </div>
                
                <!-- Error Alert -->
                <div 
                    x-show="showError" 
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform -translate-y-4"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    class="bg-gray-800 rounded-xl shadow-lg overflow-hidden w-full mx-auto mb-6"
                >
                    @if (session()->has('loginError'))
                        <div class="flex items-center p-4 bg-red-500 text-white rounded-t-xl">
                            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                            <p>{{ session('loginError') }}</p>
                            <button 
                                @click="showError = false" 
                                type="button" 
                                class="ml-auto text-white hover:text-gray-200 focus:outline-none"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Login Form Card -->
            <div class="relative bg-gray-800 rounded-xl shadow-xl overflow-hidden w-full transform transition-all duration-300 hover:shadow-2xl mx-auto border border-gray-700">
                <!-- Decorative elements -->
                <div class="absolute top-0 right-0 w-40 h-40 bg-yellow-300 rounded-full -mt-20 -mr-20 opacity-20"></div>
                <div class="absolute bottom-0 left-0 w-32 h-32 bg-yellow-300 rounded-full -mb-16 -ml-16 opacity-20"></div>
                
                <!-- Yellow accent bar -->
                <div class="h-2 bg-yellow-400"></div>
                
                <div class="p-6 sm:p-8 relative z-10">
                    <!-- Header with animated accent -->
                    <div class="text-center mb-8">
                        <h2 class="text-2xl sm:text-3xl font-bold text-white mb-2">Welcome Back</h2>
                        <div class="w-20 h-1 bg-yellow-400 mx-auto"></div>
                        <p class="mt-3 text-gray-400 text-sm">Sign in to your account</p>
                    </div>
                    
                    <form action="/login" method="POST" x-data="{ 
                        showPassword: false,
                        username: '{{ old('username') }}',
                        password: '',
                        isSubmitting: false,
                        submitForm() {
                            this.isSubmitting = true;
                            $el.submit();
                        }
                    }">
                        @csrf
                        <!-- Username Field -->
                        <div class="mb-5">
                            <label for="username" class="block text-sm font-medium text-gray-300 mb-2">Username</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-yellow-400 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input 
                                    type="text" 
                                    id="username" 
                                    name="username" 
                                    x-model="username"
                                    class="bg-gray-700 border text-white text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full pl-10 p-3 transition-all @error('username') border-red-500 @enderror" 
                                    placeholder="Enter your username"
                                    autofocus
                                    required
                                >
                                <!-- Animated focus border using Alpine states -->
                                <div class="absolute bottom-0 left-0 h-0.5 bg-yellow-400 transition-all duration-300"
                                    :class="username ? 'w-full' : 'w-0'"></div>
                            </div>
                            @error('username')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Password Field with toggle visibility -->
                        <div class="mb-6">
                            <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-yellow-400 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input 
                                    :type="showPassword ? 'text' : 'password'" 
                                    id="password" 
                                    name="password" 
                                    x-model="password"
                                    class="bg-gray-700 border text-white text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full pl-10 pr-10 p-3 transition-all @error('password') border-red-500 @enderror" 
                                    placeholder="••••••••"
                                    required
                                >
                                <button 
                                    @click.prevent="showPassword = !showPassword" 
                                    type="button"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-yellow-400 transition-colors focus:outline-none"
                                >
                                    <svg 
                                        x-show="!showPassword" 
                                        xmlns="http://www.w3.org/2000/svg" 
                                        class="h-5 w-5" 
                                        viewBox="0 0 20 20" 
                                        fill="currentColor"
                                    >
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                    </svg>
                                    <svg 
                                        x-show="showPassword" 
                                        xmlns="http://www.w3.org/2000/svg" 
                                        class="h-5 w-5" 
                                        viewBox="0 0 20 20" 
                                        fill="currentColor"
                                    >
                                        <path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd" />
                                        <path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
                                    </svg>
                                </button>
                                <!-- Animated focus border using Alpine states -->
                                <div class="absolute bottom-0 left-0 h-0.5 bg-yellow-400 transition-all duration-300"
                                    :class="password ? 'w-full' : 'w-0'"></div>
                            </div>
                            @error('password')
                                <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Forgot Password -->
                        <div class="flex flex-wrap items-center justify-end mb-6">
                            <a href="#" class="text-sm font-medium text-yellow-400 hover:text-yellow-300 hover:underline transition-colors">Forgot password?</a>
                        </div>
                        
                        <!-- Login Button with loading state -->
                        <button 
                            type="submit" 
                            @click="submitForm()"
                            :disabled="isSubmitting"
                            class="w-full bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-600 focus:ring-opacity-50 text-gray-900 font-bold rounded-lg text-sm px-5 py-3.5 text-center transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98] disabled:opacity-70 disabled:cursor-not-allowed flex justify-center items-center"
                        >
                            <span x-show="!isSubmitting">Sign In</span>
                            <svg x-show="isSubmitting" class="animate-spin -ml-1 mr-3 h-5 w-5 text-gray-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span x-show="isSubmitting">Processing...</span>
                        </button>
                    </form>
                    
                    <!-- Improved divider -->
                    <div class="my-6 flex items-center">
                        <div class="flex-grow border-t border-gray-600"></div>
                        <span class="mx-4 text-gray-400 text-sm">or continue with</span>
                        <div class="flex-grow border-t border-gray-600"></div>
                    </div>
                    
                    <!-- Social sign up option - Google only -->
                    <div class="flex justify-center">
                        <!-- Google Sign Up Button with hover effect -->
                        <button type="button" class="w-full bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-4 py-3 text-center inline-flex items-center justify-center space-x-2 transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 48 48">
                                <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path>
                                <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path>
                                <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path>
                                <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
                            </svg>
                            <span>Sign in with Google</span>
                        </button>
                    </div>
                    
                    <!-- Register Link with improved styling -->
                    <div class="mt-8 text-center">
                        <p class="text-sm text-gray-300">
                            Don't have an account? 
                            <a href="register" class="font-medium text-yellow-400 hover:text-yellow-300 hover:underline transition-all">Sign up</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>