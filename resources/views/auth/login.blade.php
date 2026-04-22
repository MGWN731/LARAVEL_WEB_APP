<x-guest-layout>
    <h1 class="text-lg font-semibold text-slate-900">Log in</h1>
    <p class="mt-1 text-sm text-slate-600">Sign in to manage employees.</p>

    <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-4">
        @csrf

        <div>
            <label class="text-sm font-semibold text-slate-700" for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                   class="mt-1 block w-full rounded-md border-slate-300 focus:border-blue-500 focus:ring-blue-500" />
            @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="text-sm font-semibold text-slate-700" for="password">Password</label>
            <input id="password" name="password" type="password" required
                   class="mt-1 block w-full rounded-md border-slate-300 focus:border-blue-500 focus:ring-blue-500" />
            @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <label class="flex items-center gap-2 text-sm text-slate-700">
            <input type="checkbox" name="remember" value="1" class="rounded border-slate-300 text-blue-600 focus:ring-blue-500" />
            Remember me
        </label>

        <button type="submit" class="w-full inline-flex items-center justify-center rounded-md bg-gradient-to-r from-blue-600 to-blue-700 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Log in</button>

        <div class="flex items-center justify-between text-sm">
            <a href="{{ route('password.request') }}" class="font-semibold text-blue-700 hover:underline">Forgot password?</a>
            <a href="{{ route('register') }}" class="font-semibold text-slate-700 hover:underline">Create account</a>
        </div>
    </form>
</x-guest-layout>
