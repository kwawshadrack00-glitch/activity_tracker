<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="w-full sm:max-w-2xl mt-6 px-12 py-10 bg-white shadow-2xl overflow-hidden sm:rounded-2xl border border-gray-200">
            <div class="text-center mb-6">
                <div class="flex justify-center mb-3">
                    <a href="/">
                        <x-application-logo width="100px" height="100px" />
                    </a>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Welcome Back</h2>
                <p class="text-sm text-gray-500">Support Team Activity Tracker</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Username -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-medium" />
                    <x-text-input id="email" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <div class="flex items-center justify-between">
                        <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-medium" />
                        @if (Route::has('password.request'))
                            <a class="text-sm text-indigo-600 hover:text-indigo-500" href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>
                    <x-text-input id="password" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="mt-6">
                    <button type="submit" class="w-full inline-flex justify-center items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ __('Sign In') }}
                    </button>
                </div>

                @if (Route::has('register'))
                    <div class="mt-6 text-center">
                        <a class="text-sm text-gray-600 hover:text-indigo-600" href="{{ route('register') }}">
                            {{ __('Don\'t have an account?') }} <span class="font-bold text-indigo-600">{{ __('Register') }}</span>
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>
</x-guest-layout>