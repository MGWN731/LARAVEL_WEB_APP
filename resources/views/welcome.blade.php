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
        <div class="min-h-screen">
            <header class="border-b bg-white/80 backdrop-blur border-slate-200">
                <div class="flex flex-col gap-4 px-4 py-4 mx-auto max-w-7xl sm:px-6 lg:px-8 sm:flex-row sm:items-center sm:justify-between">
                    <a href="{{ url('/') }}" class="flex items-center min-w-0 gap-3">
                        <x-application-logo class="w-auto h-8 fill-current text-slate-900" />
                        <span class="font-semibold truncate text-slate-900">{{ config('app.name', 'Laravel') }}</span>
                    </a>

                    @if (Route::has('login'))
                        <nav class="flex flex-wrap items-center gap-2 sm:justify-end sm:gap-3">
                            <a href="{{ route('about') }}"
                               class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold rounded-md text-slate-700 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                About
                            </a>

                            @auth
                                <a href="{{ url('/dashboard') }}"
                                   class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white rounded-md bg-gradient-to-r from-blue-600 to-blue-700 shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                   class="inline-flex items-center px-4 py-2 text-sm font-semibold rounded-md text-slate-700 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                       class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white rounded-md bg-gradient-to-r from-blue-600 to-blue-700 shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </div>
            </header>

            <main>
                <section class="relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-b from-blue-50 via-slate-50 to-slate-50"></div>
                    <div class="relative px-4 py-10 mx-auto max-w-7xl sm:px-6 sm:py-14 lg:px-8 lg:py-20">
                        <div class="grid items-center gap-8 lg:grid-cols-12 lg:gap-10">
                            <div class="lg:col-span-7 order-2 lg:order-1">
                                <p class="inline-flex items-center gap-2 px-3 py-1 text-xs font-semibold bg-white rounded-full text-slate-700 ring-1 ring-slate-200">
                                    <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                                    Admin-ready • Laravel 11 + Tailwind
                                </p>

                                <h1 class="mt-5 text-3xl font-semibold tracking-tight sm:text-4xl lg:text-5xl text-slate-900 max-w-2xl">
                                    Employee Management made simple.
                                </h1>
                                <p class="max-w-2xl mt-4 text-base leading-7 sm:text-lg text-slate-600">
                                    Secure login, a clean dashboard, and full CRUD for your employees — built with Laravel and a professional, responsive UI.
                                </p>

                                <div class="flex flex-col gap-3 mt-8 sm:flex-row sm:flex-wrap">
                                    @auth
                                        <a href="{{ url('/dashboard') }}"
                                           class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-semibold text-white rounded-md sm:w-auto bg-gradient-to-r from-blue-600 to-blue-700 shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                            Go to Dashboard
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}"
                                           class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-semibold text-white rounded-md sm:w-auto bg-gradient-to-r from-blue-600 to-blue-700 shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                            Log in
                                        </a>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}"
                                               class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-semibold bg-white rounded-md sm:w-auto text-slate-900 ring-1 ring-slate-200 hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                                Create account
                                            </a>
                                        @endif
                                    @endauth
                                </div>

                                <dl class="grid max-w-2xl grid-cols-1 gap-4 mt-10 sm:grid-cols-2 xl:grid-cols-3 sm:gap-6">
                                    <div class="p-4 bg-white rounded-lg ring-1 ring-slate-200">
                                        <dt class="text-sm font-semibold text-slate-900">CRUD</dt>
                                        <dd class="mt-1 text-sm text-slate-600">Create, view, edit, delete employees.</dd>
                                    </div>
                                    <div class="p-4 bg-white rounded-lg ring-1 ring-slate-200">
                                        <dt class="text-sm font-semibold text-slate-900">Secure</dt>
                                        <dd class="mt-1 text-sm text-slate-600">Auth-protected admin pages.</dd>
                                    </div>
                                    <div class="p-4 bg-white rounded-lg ring-1 ring-slate-200">
                                        <dt class="text-sm font-semibold text-slate-900">MySQL</dt>
                                        <dd class="mt-1 text-sm text-slate-600">XAMPP-ready migrations.</dd>
                                    </div>
                                </dl>
                            </div>

                            <div class="lg:col-span-5 order-1 lg:order-2">
                                <div class="overflow-hidden bg-white shadow-sm rounded-2xl ring-1 ring-slate-200 lg:sticky lg:top-8">
                                    <div class="p-6 sm:p-8">
                                        <div class="flex items-start gap-4">
                                            <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-50 ring-1 ring-blue-100">
                                                <svg class="w-5 h-5 text-blue-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                            </div>
                                            <div class="min-w-0">
                                                <h2 class="text-lg font-semibold text-slate-900">What you can do</h2>
                                                <p class="mt-1 text-sm text-slate-600">A quick overview of the admin dashboard.</p>
                                            </div>
                                        </div>

                                        <ul class="mt-6 space-y-3 text-sm text-slate-700">
                                            <li class="flex gap-3">
                                                <svg class="h-5 w-5 text-blue-600 mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                    <path d="M20 6L9 17l-5-5"></path>
                                                </svg>
                                                Add employees with contact and role details.
                                            </li>
                                            <li class="flex gap-3">
                                                <svg class="h-5 w-5 text-blue-600 mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                    <path d="M20 6L9 17l-5-5"></path>
                                                </svg>
                                                View a paginated table of records.
                                            </li>
                                            <li class="flex gap-3">
                                                <svg class="h-5 w-5 text-blue-600 mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                    <path d="M20 6L9 17l-5-5"></path>
                                                </svg>
                                                Use the quick “View” modal for details.
                                            </li>
                                        </ul>

                                        <div class="p-4 mt-8 border rounded-lg bg-slate-50 border-slate-200">
                                            <div class="text-xs font-semibold text-slate-900">Tip</div>
                                            <div class="mt-1 text-sm text-slate-600">After registering, open the Employees page from the sidebar.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="px-4 pb-16 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="grid gap-4 sm:gap-6 md:grid-cols-3">
                        <div class="p-6 bg-white rounded-xl ring-1 ring-slate-200">
                            <div class="flex items-center gap-3">
                                <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-slate-100">
                                    <svg class="w-5 h-5 text-slate-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M12 20h9"></path>
                                        <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"></path>
                                    </svg>
                                </div>
                                <h3 class="font-semibold text-slate-900">Clean forms</h3>
                            </div>
                            <p class="mt-3 text-sm text-slate-600">Simple create/edit screens with validation feedback.</p>
                        </div>

                        <div class="p-6 bg-white rounded-xl ring-1 ring-slate-200">
                            <div class="flex items-center gap-3">
                                <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-slate-100">
                                    <svg class="w-5 h-5 text-slate-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M3 3v18h18"></path>
                                        <path d="M7 14l4-4 4 4 6-6"></path>
                                    </svg>
                                </div>
                                <h3 class="font-semibold text-slate-900">Admin layout</h3>
                            </div>
                            <p class="mt-3 text-sm text-slate-600">Responsive sidebar + top bar, optimized for daily use.</p>
                        </div>

                        <div class="p-6 bg-white rounded-xl ring-1 ring-slate-200">
                            <div class="flex items-center gap-3">
                                <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-slate-100">
                                    <svg class="w-5 h-5 text-slate-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                    </svg>
                                </div>
                                <h3 class="font-semibold text-slate-900">Secure access</h3>
                            </div>
                            <p class="mt-3 text-sm text-slate-600">Protected routes behind authentication.</p>
                        </div>
                    </div>
                </section>
            </main>

            <footer class="bg-white border-t border-slate-200">
                <div class="flex flex-col items-center justify-between gap-4 px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8 sm:flex-row sm:text-left text-center">
                    <p class="text-sm text-slate-600">© {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
                    <div class="flex items-center gap-4">
                        <a href="{{ route('about') }}" class="text-sm text-slate-600 hover:text-slate-900">About</a>
                        <p class="text-sm text-slate-600">Built with Laravel + Tailwind.</p>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
