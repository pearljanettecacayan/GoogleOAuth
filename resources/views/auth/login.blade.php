<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="custom-background flex justify-center items-center justify-center">
        <form method="POST" action="{{ route('login') }}" class="bg-transparent p-8 w-96">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" style="color: white;"/>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-6">
                <x-input-label for="password" :value="__('Password')" style="color: white;"/>
                <x-text-input id="password" class="block mt-1 w-full"
                     type="password"
                    name="password"
                    required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-6">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-purple-300 text-purple-900  shadow-sm focus:ring-purple-500" name="remember">
                    <span class="ms-2 text-sm text-purple-900 ">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-8">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-purple-900 hover:text-purple-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ms-3 bg-purple-900">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>

            <!-- Continue with Google -->
            <div class="mt-6 flex justify-center">
                <a href="{{ route('google-auth') }}" class="inline-flex items-center px-4 py-2 bg-purple-900  border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black-500">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M23.5 12.275c0-.85-.075-1.675-.212-2.475H12v4.695h6.455a5.52 5.52 0 0 1-2.39 3.63v2.99h3.855c2.26-2.08 3.58-5.15 3.58-8.84z" fill="#4285F4"/>
                        <path d="M12 24c3.24 0 5.96-1.07 7.94-2.9l-3.855-2.99c-1.08.72-2.45 1.15-4.085 1.15a7.62 7.62 0 0 1-7.19-5.18H1.78v3.07A12.01 12.01 0 0 0 12 24z" fill="#34A853"/>
                        <path d="M4.81 14.08a7.26 7.26 0 0 1 0-4.16v-3.07H1.78a12.01 12.01 0 0 0 0 10.3l3.03-3.07z" fill="#FBBC05"/>
                        <path d="M12 4.78c1.76 0 3.36.62 4.61 1.84l3.455-3.455C17.96 1.07 15.24 0 12 0A12.01 12.01 0 0 0 1.78 6.85L4.81 9.92A7.62 7.62 0 0 1 12 4.78z" fill="#EA4335"/>
                    </svg>
                    Continue with Google
                </a>
            </div>
        </form>
    </div>

</x-guest-layout>

<style>
    .custom-background {
        background: linear-gradient(to bottom, #3b0a45, #8e44ad, #1abc9c);
        height: 80vh; 
        width: 100%; 
    }
</style>

