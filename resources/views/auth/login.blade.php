<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 p-4">
        <div class="w-full max-w-md bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Header with Logo -->
            <div class="bg-indigo-600 py-6 px-8 text-center">
                <h1 class="mt-4 text-2xl font-bold text-white">Welcome Back</h1>
                <p class="mt-1 text-indigo-100">Sign in to your account</p>
            </div>

            <div class="p-8">
                <x-validation-errors class="mb-6 bg-red-50 p-4 rounded-lg text-red-600" />

                @session('status')
                    <div class="mb-6 bg-green-50 p-4 rounded-lg text-green-600 text-sm">
                        {{ $value }}
                    </div>
                @endsession

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                        <input id="email" 
                               type="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required 
                               autofocus 
                               autocomplete="email"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input id="password" 
                               type="password" 
                               name="password" 
                               required 
                               autocomplete="current-password"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200">
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" 
                                   name="remember" 
                                   type="checkbox"
                                   class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="remember_me" class="ml-2 block text-sm text-gray-700">Remember me</label>
                        </div>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:text-indigo-500">
                                Forgot password?
                            </a>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 px-4 rounded-lg transition duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Sign In
                    </button>
                </form>

                <!-- Additional Links -->
                <div class="mt-6 text-center text-sm text-gray-500">
                    Don't have an account? 
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                            Create one
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>