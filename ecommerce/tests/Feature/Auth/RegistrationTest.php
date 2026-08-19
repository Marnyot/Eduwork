<?php

use Illuminate\Support\Facades\Http;

beforeEach(function () {
    Http::fake([
        'challenges.cloudflare.com/*' => Http::response(['success' => true]),
    ]);
});

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('new users can register', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'cf-turnstile-response' => 'test-token',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('home', absolute: false));
});
