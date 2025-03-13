<x-guest-layout>
    <!-- حالة الجلسة -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="text-right">
        @csrf

        <!-- البريد الإلكتروني -->
        <div>
            <x-input-label for="email" :value="__('auth.email')" class="text-right" />
            <x-text-input id="email" class="block mt-1 w-full text-right" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-right" />
        </div>

        <!-- كلمة المرور -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('auth.password')" class="text-right" />

            <x-text-input id="password" class="block mt-1 w-full text-right"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-right" />
        </div>

        <!-- تذكرني -->
        <div class="block mt-4 text-right">
            <label for="remember_me" class="inline-flex items-center">
                <span class="ms-2 text-sm text-gray-600 m-2">{{ __('auth.remember_me') }}</span>
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:ring-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('auth.forgot_password') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('auth.login') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
