<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo" class="">
            <a href="/" class="">
                {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
                <img src="{{ asset('storage/logo/logo.png') }}" alt="Logo da loja E Ai Docinho" class="img-fluid mx-auto" style="width: 30%">
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" class="fs-3" :value="__('Email')" />

                <x-input id="email" class="fs-3 block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" class="fs-3" :value="__('Password')" />

                <x-input id="password" class="fs-3 block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4 fs-4">
                <label for="remember_me" class="fs-4 inline-flex items-center">
                    <input id="remember_me" type="checkbox" style="width:1.4rem;height:1.4rem;" class="rounded border-gray-300 text-indigo-600 -sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="fs-4 ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4 fs-4">
                @if (Route::has('password.request'))
                    <a class="fs-4 underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3 fs-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
