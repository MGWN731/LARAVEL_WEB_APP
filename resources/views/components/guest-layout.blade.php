<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-slate-50 text-slate-900">
        @if (session('status'))
            <script>window.__FLASH_STATUS__ = @json(session('status'));</script>
        @endif

        <div class="min-h-screen flex items-center justify-center px-4 py-10">
            <div class="w-full max-w-md">
                <div class="flex items-center justify-center mb-6">
                    <a href="{{ url('/') }}" class="inline-flex items-center gap-3">
                        <x-application-logo class="h-9 w-auto text-slate-900" />
                        <span class="font-semibold">{{ config('app.name', 'Laravel') }}</span>
                    </a>
                </div>

                <div class="bg-white rounded-xl ring-1 ring-slate-200 shadow-sm p-6">
                    {{ $slot }}
                </div>

                <p class="mt-6 text-center text-xs text-slate-500">© {{ date('Y') }} {{ config('app.name', 'Laravel') }}</p>
            </div>
        </div>
    </body>
</html>
