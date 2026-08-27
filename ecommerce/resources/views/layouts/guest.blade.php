<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="{{ asset('css/theme.css') }}" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/css/fonts.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-dvh flex flex-col lg:flex-row">
            <!-- Brand panel -->
            <div class="relative overflow-hidden shrink-0 lg:w-[42%] lg:max-w-xl px-8 py-10 lg:p-12 flex flex-col justify-between text-white"
                 style="background: linear-gradient(155deg, #2f855a 0%, #1f5d3f 100%);">

                <!-- decorative texture -->
                <div class="pointer-events-none absolute inset-0 opacity-[0.14]"
                     style="background-image: radial-gradient(circle, #ffffff 1px, transparent 1px); background-size: 18px 18px;"></div>
                <div class="pointer-events-none absolute -right-24 -top-24 w-72 h-72 rounded-full"
                     style="background: radial-gradient(closest-side, rgba(217,119,6,0.35), transparent);"></div>
                <div class="pointer-events-none absolute -left-16 bottom-0 w-64 h-64 rounded-full"
                     style="background: radial-gradient(closest-side, rgba(255,255,255,0.10), transparent);"></div>

                <a href="{{ route('home') }}" class="relative flex items-center gap-3">
                    <x-application-logo class="w-10 h-10 shrink-0" />
                    <span class="text-lg font-bold tracking-tight">{{ config('app.name') }}</span>
                </a>

                <div class="relative mt-10 lg:mt-0">
                    <h1 class="text-3xl lg:text-[2.25rem] font-extrabold leading-[1.15] tracking-tight text-balance">
                        Quality products, straightforward prices.
                    </h1>
                    <p class="mt-4 text-white/75 text-sm leading-relaxed max-w-sm">
                        Sign in to track orders, save your details, and check out faster next time.
                    </p>

                    <ul class="hidden lg:block mt-8 space-y-3 text-sm text-white/85">
                        <li class="flex items-center gap-2.5">
                            <span class="flex items-center justify-center w-5 h-5 rounded-full bg-white/15 shrink-0">
                                <svg class="w-3 h-3" viewBox="0 0 12 12" fill="none"><path d="M2 6.2l2.6 2.6L10 3" stroke="#fff" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            Curated product catalog
                        </li>
                        <li class="flex items-center gap-2.5">
                            <span class="flex items-center justify-center w-5 h-5 rounded-full bg-white/15 shrink-0">
                                <svg class="w-3 h-3" viewBox="0 0 12 12" fill="none"><path d="M2 6.2l2.6 2.6L10 3" stroke="#fff" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            Transparent checkout, no surprise fees
                        </li>
                        <li class="flex items-center gap-2.5">
                            <span class="flex items-center justify-center w-5 h-5 rounded-full bg-white/15 shrink-0">
                                <svg class="w-3 h-3" viewBox="0 0 12 12" fill="none"><path d="M2 6.2l2.6 2.6L10 3" stroke="#fff" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </span>
                            Every order tracked in one place
                        </li>
                    </ul>
                </div>

                <p class="relative hidden lg:block text-xs text-white/50">
                    &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                </p>
            </div>

            <!-- Form panel -->
            <div class="flex-1 flex items-center justify-center px-6 py-12 sm:py-16" style="background: var(--edu-bg, #f7f5f0);">
                <div class="w-full sm:max-w-sm">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
