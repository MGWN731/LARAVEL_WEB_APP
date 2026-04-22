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

    <body class="font-sans antialiased bg-slate-50 text-slate-900" x-data="adminShell">
        @if (session('status'))
            <script>window.__FLASH_STATUS__ = @json(session('status'));</script>
        @endif

        <div class="min-h-screen">
            <header class="border-b bg-white/80 backdrop-blur border-slate-200">
                <div class="px-4 py-4 mx-auto max-w-7xl sm:px-6 lg:px-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <a href="{{ url('/dashboard') }}" class="flex items-center min-w-0 gap-3">
                        <x-application-logo class="w-auto h-8 fill-current text-slate-900" />
                        <span class="font-semibold truncate text-slate-900">{{ config('app.name', 'Laravel') }}</span>
                    </a>

                    <nav class="flex flex-wrap items-center gap-2 sm:justify-end sm:gap-3">
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold rounded-md text-slate-700 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Dashboard</a>
                        <a href="{{ route('employees.index') }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold rounded-md text-slate-700 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Employees</a>
                        <a href="{{ route('profile.edit') }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold rounded-md text-slate-700 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Profile</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-white rounded-md bg-gradient-to-r from-blue-600 to-blue-700 shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Log out</button>
                        </form>
                    </nav>
                </div>
            </header>

            @isset($header)
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="bg-white rounded-xl ring-1 ring-slate-200 shadow-sm p-5">
                        {{ $header }}
                    </div>
                </div>
            @endisset

            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
