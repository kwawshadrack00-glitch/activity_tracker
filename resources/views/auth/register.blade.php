<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="w-full sm:max-w-2xl mt-6 px-8 py-6 bg-white shadow-2xl overflow-hidden sm:rounded-2xl border border-gray-200">
            <div class="text-center mb-6">
                <div class="flex justify-center mb-3">
                    <a href="/">
                        <x-application-logo width="100px" height="100px" />
                    </a>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Create Account</h2>
                <p class="text-sm text-gray-500">Join the Support Team Activity Tracker</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="grid grid-cols-1 gap-4">
                    <!-- Username -->
                    <div>
                        <x-input-label for="username" :value="__('Username')" class="text-gray-700 font-medium" />
                        <x-text-input id="username" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" type="text" name="username" :value="old('username')" required autofocus />
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <!-- First Name -->
                        <div>
                            <x-input-label for="first_name" :value="__('First Name')" class="text-gray-700 font-medium" />
                            <x-text-input id="first_name" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" type="text" name="first_name" :value="old('first_name')" required />
                            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                        </div>

                        <!-- Last Name -->
                        <div>
                            <x-input-label for="last_name" :value="__('Last Name')" class="text-gray-700 font-medium" />
                            <x-text-input id="last_name" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" type="text" name="last_name" :value="old('last_name')" required />
                            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-medium" />
                        <x-text-input id="email" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" type="email" name="email" :value="old('email')" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-medium" />
                        <x-text-input id="password" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 font-medium" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" type="password" name="password_confirmation" required />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="w-full inline-flex justify-center items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ __('Create Account') }}
                    </button>
                </div>

                <div class="mt-6 text-center">
                    <a class="text-sm text-gray-600 hover:text-indigo-600" href="{{ route('login') }}">
                        {{ __('Already have an account?') }} <span class="font-bold text-indigo-600">{{ __('Log in') }}</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>