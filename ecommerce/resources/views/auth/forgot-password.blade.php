<x-guest-layout>
    <h2 class="text-2xl font-bold tracking-tight text-gray-900">Reset your password</h2>
    <p class="mt-1.5 text-sm text-gray-500">
        {{ __('Enter your email and we\'ll send you a link to reset your password.') }}
    </p>

    <!-- Session Status -->
    <x-auth-session-status class="mt-6" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="mt-8 space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1.5 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="you@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <x-primary-button class="w-full justify-center py-2.5">
            {{ __('Email password reset link') }}
        </x-primary-button>

        <p class="text-center text-sm text-gray-500">
            <a href="{{ route('login') }}" class="font-medium text-[#2f855a] hover:text-[#276749]">Back to sign in</a>
        </p>
    </form>
</x-guest-layout>
