<x-guest-layout>
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

    <h2 class="text-2xl font-bold tracking-tight text-gray-900">Create your account</h2>
    <p class="mt-1.5 text-sm text-gray-500">It only takes a minute to get started.</p>

    <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-5">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1.5 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Jane Cooper" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1.5 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="you@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1.5 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" placeholder="••••••••" />

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

        <!-- Turnstile -->
        <div>
            <div class="cf-turnstile" data-sitekey="{{ config('services.turnstile.site_key') }}"></div>
            <x-input-error :messages="$errors->get('cf-turnstile-response')" class="mt-2" />
        </div>

        <x-primary-button class="w-full justify-center py-2.5">
            Create account
        </x-primary-button>

        <p class="text-center text-sm text-gray-500">
            Already have an account?
            <a href="{{ route('login') }}" class="font-medium text-[#2f855a] hover:text-[#276749]">Sign in</a>
        </p>
    </form>
</x-guest-layout>
