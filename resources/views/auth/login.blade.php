<x-guest-layout>

    
    <div class="flex items-center justify-center">
        <a href="{{ route('posts.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
            Home
        </a>
    </div>
    <div class="flex items-center justify-center">
        <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
            Register
        </a>
    </div>
    <h2 class="text-2xl font-bold mb-6 text-center text-white">Welcome Back 👋</h2>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-white text-sm text-center" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" class="text-white" />
            <x-text-input id="email" class="block mt-1 w-full bg-white/90 text-black" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-200" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" class="text-white" />
            <x-text-input id="password" class="block mt-1 w-full bg-white/90 text-black" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-200" />
        </div>

        <!-- Remember Me -->
        <div class="block mb-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-white">{{ __('Remember me') }}</span>
            </label>
        </div>

        <!-- Login Button -->
        <div class="flex items-center justify-center">
            <x-primary-button class="w-full justify-center">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        

        <div class="text-center mt-4">
            <a class="text-sm text-blue-200 hover:underline" href="{{ route('register') }}">Don't have an account?</a>
        </div>
    </form>
</x-guest-layout>
