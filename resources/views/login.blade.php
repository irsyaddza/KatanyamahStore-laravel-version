<x-layout>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <!-- Logo with glow effect -->
            <div class="relative w-fit mx-auto">
                <div class="absolute inset-0 bg-yellow-400 rounded-full blur-md opacity-40 animate-pulse"></div>
                <img class="relative z-10 mx-auto h-14 w-auto"
                    src="https://imgur.com/a/HUkwFCC.png" alt="KatanyamahStore">
            </div>
            <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-gray-800">Sign in to your account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="#" method="POST">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-8">Email address</label>
                    <div class="mt-2">
                        <input type="email" name="email" id="email" autocomplete="email" required
                            class="block w-full rounded-md bg-yellow-400 px-3 py-1.5 text-gray-800 border border-gray-700 focus:ring-2 focus:ring-yellow-500 focus:border-transparent shadow-sm">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium text-gray-800">Password</label>
                        <div class="text-sm">
                            <a href="#" class="font-semibold text-yellow-400 hover:text-yellow-300 transition-colors">
                                Forgot password?
                            </a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input type="password" name="password" id="password" autocomplete="current-password" required
                            class="block w-full rounded-md bg-yellow-400 px-3 py-1.5 text-gray-800 border border-gray-700 focus:ring-2 focus:ring-yellow-500 focus:border-transparent shadow-sm">
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-gray-800 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-yellow-600 transition-colors duration-200">
                        Sign in
                    </button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-gray-800">
                Not a member?
                <a href="register" class="font-semibold text-gray-600 hover:text-gray-500 transition-colors">
                    Register Now!
                </a>
            </p>
        </div>
    </div>
</x-layout>