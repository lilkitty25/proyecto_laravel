<x-layouts.layout>
    <!-- Session Status -->
    <div class="flex flex-flow justify-center min-h-full bg-gradient-to-r from-pink-100 via-red-100 to-pink-300 py-10">
        <div class="bg-white p-8 rounded-xl shadow-xl max-w-sm w-full">
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1 class="text-2xl font-bold text-center text-pink-600 mb-6">{{ __('Welcome Back!') }}</h1>

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-red-600" />
                    <x-text-input id="email" class="block mt-1 w-full bg-pink-50 border-2 border-pink-300 focus:ring-2 focus:ring-pink-400 focus:outline-none" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="text-red-600" />

                    <x-text-input id="password" class="block mt-1 w-full bg-pink-50 border-2 border-pink-300 focus:ring-2 focus:ring-pink-400 focus:outline-none"
                                  type="password"
                                  name="password"
                                  required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
                </div>


                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded bg-pink-50 border-red-300 text-pink-600 shadow-sm focus:ring-pink-500 dark:focus:ring-pink-600" name="remember">
                        <span class="ms-2 text-sm text-red-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-red-600 hover:text-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-3 bg-pink-600 hover:bg-pink-700 focus:ring-4 focus:ring-pink-500">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.layout>
