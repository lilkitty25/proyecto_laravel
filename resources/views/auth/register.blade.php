<x-layouts.layout>
    <div class="flex justify-center items-center min-h-screen bg-gradient-to-r from-pink-100 via-red-100 to-pink-300 py-10">
        <div class="bg-white p-8 rounded-xl shadow-xl max-w-md w-full">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Title -->
                <h2 class="text-2xl font-semibold text-center text-pink-600 mb-6">{{ __('Create an Account') }}</h2>

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="text-pink-600" />
                    <x-text-input id="name" class="block mt-1 w-full bg-pink-50 border-2 border-pink-300 focus:ring-2 focus:ring-pink-500 focus:outline-none" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" class="text-pink-600" />
                    <x-text-input id="email" class="block mt-1 w-full bg-pink-50 border-2 border-pink-300 focus:ring-2 focus:ring-pink-500 focus:outline-none" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="text-pink-600" />

                    <x-text-input id="password" class="block mt-1 w-full bg-pink-50 border-2 border-pink-300 focus:ring-2 focus:ring-pink-500 focus:outline-none"
                                  type="password"
                                  name="password"
                                  required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-pink-600" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full bg-pink-50 border-2 border-pink-300 focus:ring-2 focus:ring-pink-500 focus:outline-none"
                                  type="password"
                                  name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
                </div>

                <div class="flex items-center justify-between mt-6">
                    <div class="text-sm">
                        <a class="underline text-pink-600 hover:text-pink-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500" href="{{ route('login') }}">
                            {{ __('Already have an account? Log in') }}
                        </a>
                    </div>

                    <x-primary-button class="bg-pink-600 hover:bg-pink-700 text-white focus:ring-4 focus:ring-pink-500">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.layout>
