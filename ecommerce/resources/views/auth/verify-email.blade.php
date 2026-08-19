<x-guest-layout>
    <h2 class="text-2xl font-bold tracking-tight text-gray-900">Verify your email</h2>
    <p class="mt-1.5 text-sm text-gray-500">
        {{ __('Thanks for signing up. Please verify your email by clicking the link we just sent you. Didn\'t get it? We can send another one.') }}
    </p>

    @if (session('status') == 'verification-link-sent')
        <div class="mt-4 text-sm font-medium text-[#2f855a]">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-8 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-primary-button>
                {{ __('Resend verification email') }}
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm font-medium text-gray-500 hover:text-gray-900">
                {{ __('Log out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
