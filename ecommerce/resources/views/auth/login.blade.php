<x-guest-layout>
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

    <h2 class="text-2xl font-bold tracking-tight text-gray-900">Sign in</h2>
    <p class="mt-1.5 text-sm text-gray-500">Welcome back. Enter your details to continue.</p>

    <!-- Session Status -->
    <x-auth-session-status class="mt-6" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1.5 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="you@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <div class="flex items-center justify-between">
                <x-input-label for="password" :value="__('Password')" />
                @if (Route::has('password.request'))
                    <a class="text-xs font-medium text-[#2f855a] hover:text-[#276749]" href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                @endif
            </div>

            <x-text-input id="password" class="block mt-1.5 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" placeholder="••••••••" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <label for="remember_me" class="flex items-center gap-2 select-none">
            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-[#2f855a] shadow-sm focus:ring-[#2f855a]" name="remember">
            <span class="text-sm text-gray-600">Keep me signed in</span>
        </label>

        <!-- Turnstile -->
        <div>
            <div class="cf-turnstile" data-sitekey="{{ config('services.turnstile.site_key') }}"></div>
            <x-input-error :messages="$errors->get('cf-turnstile-response')" class="mt-2" />
        </div>

        <x-primary-button class="w-full justify-center py-2.5">
            Sign in
        </x-primary-button>

        <p class="text-center text-sm text-gray-500">
            Don't have an account?
            <a href="{{ route('register') }}" class="font-medium text-[#2f855a] hover:text-[#276749]">Sign up</a>
        </p>
    </form>
</x-guest-layout>
