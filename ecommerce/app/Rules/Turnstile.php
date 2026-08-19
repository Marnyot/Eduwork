<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Turnstile implements ValidationRule
{
    /**
     * Validate the incoming Turnstile token against Cloudflare's siteverify endpoint.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret' => config('services.turnstile.secret_key'),
            'response' => $value,
            'remoteip' => request()->ip(),
        ]);

        if ($response->failed() || ! $response->json('success', false)) {
            Log::warning('Turnstile verification failed', [
                'errors' => $response->json('error-codes', []),
                'ip' => request()->ip(),
            ]);

            $fail('Verification failed. Please try again.');
        }
    }
}
