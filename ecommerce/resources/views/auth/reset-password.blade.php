<x-guest-layout>
    <h2 class="text-2xl font-bold tracking-tight text-gray-900">Set a new password</h2>
    <p class="mt-1.5 text-sm text-gray-500">Choose a strong password you haven't used before.</p>

    <form method="POST" action="{{ route('password.store') }}" class="mt-8 space-y-5">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1.5 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('New password')" />
            <x-text-input id="password" class="block mt-1.5 w-full" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm password')" />

            <x-text-input id="password_confirmation" class="block mt-1.5 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <x-primary-button class="w-full justify-center py-2.5">
            {{ __('Reset password') }}
        </x-primary-button>
    </form>
</x-guest-layout>
