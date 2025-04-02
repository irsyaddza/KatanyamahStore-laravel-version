<x-layout>
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="container mx-auto max-w-md">
            <!-- Register Form Card -->
            <div class="bg-gray-800 rounded-xl shadow-lg overflow-hidden w-full transform transition-all duration-300 hover:shadow-2xl mx-auto">
                <div class="h-2 bg-gray-700"></div>
                <div class="p-8">
                    <h2 class="text-2xl font-bold text-gray-50 mb-6 text-center">Create an Account</h2>
                    
                    <form action="/register" method="POST">
                        @csrf
                        <!-- Username Field -->
                        <div class="mb-4">
                            <label for="username" class="block text-sm font-medium text-gray-50 mb-2">Username</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                                <input 
                                    type="text" 
                                    id="username" 
                                    name="username" 
                                    class="bg-gray-700 border @error('username') border-red-500 @enderror text-white text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full pl-10 p-2.5" 
                                    placeholder="" 
                                    value="{{ old('username') }}"
                                    required
                                >
                            </div>
                            @error('username')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Email Field -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-50 mb-2">Email Address</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                                <input 
                                    type="email" 
                                    id="email" 
                                    name="email" 
                                    class="bg-gray-700 border @error('email') border-red-500 @enderror text-white text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full pl-10 p-2.5" 
                                    placeholder="" 
                                    value="{{ old('email') }}"
                                    required
                                >
                            </div>
                            @error('email')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Password Field -->
                        <div class="mb-6">
                            <label for="password" class="block text-sm font-medium text-gray-50 mb-2">Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <input 
                                    type="password" 
                                    id="password" 
                                    name="password" 
                                    class="bg-gray-700 border @error('password') border-red-500 @enderror text-white text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full pl-10 p-2.5" 
                                    placeholder="" 
                                    required
                                >
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                                    <i class="fas fa-eye text-gray-400 hover:text-gray-300"></i>
                                </div>
                            </div>
                            @error('password')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Remember Me Checkbox -->
                        <div class="flex items-start mb-6">
                            <div class="flex items-center h-5">
                                <input id="remember" name="remember" type="checkbox" class="w-4 h-4 border border-gray-600 rounded bg-gray-700 focus:ring-3 focus:ring-yellow-300 accent-yellow-400">
                            </div>
                            <label for="remember" class="ml-2 text-sm font-medium text-gray-50">Remember me</label>
                        </div>
                        
                        <!-- Register Button -->
                        <button type="submit" class="w-full bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 text-gray-800 font-bold rounded-lg text-sm px-5 py-3 text-center transition-all duration-300 hover:scale-105">
                            Create Account
                        </button>
                    </form>
                    
                    <!-- Divider -->
                    <div class="my-6 flex items-center">
                        <div class="flex-grow border-t border-gray-600"></div>
                        <span class="mx-4 text-gray-100">or</span>
                        <div class="flex-grow border-t border-gray-600"></div>
                    </div>
                    
                    <!-- Google Sign Up Button -->
                    <button type="button" class="w-full bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-3 text-center flex items-center justify-center space-x-3 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 48 48">
                            <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path>
                            <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path>
                            <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path>
                            <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
                        </svg>
                        <span>Sign up with Google</span>
                    </button>
                    
                    <!-- Login Link -->
                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-100">
                            Already have an account? 
                            <a href="login" class="font-medium text-yellow-400 hover:text-yellow-300">Sign in</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    
        <script>
            // Toggle password visibility
            document.querySelectorAll('.fa-eye').forEach(icon => {
                icon.addEventListener('click', function() {
                    const input = this.closest('.relative').querySelector('input');
                    if (input.type === 'password') {
                        input.type = 'text';
                        this.classList.remove('fa-eye');
                        this.classList.add('fa-eye-slash');
                    } else {
                        input.type = 'password';
                        this.classList.remove('fa-eye-slash');
                        this.classList.add('fa-eye');
                    }
                });
            });
        </script>
    </div>
</x-layout>