<x-guest-layout>
    <h1 class="text-lg font-semibold text-slate-900">Create account</h1>
    <p class="mt-1 text-sm text-slate-600">Register to access the dashboard.</p>

    <form method="POST" action="{{ route('register') }}" class="mt-6 space-y-4">
        @csrf

        <div>
            <label class="text-sm font-semibold text-slate-700" for="name">Name</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
                   class="mt-1 block w-full rounded-md border-slate-300 focus:border-blue-500 focus:ring-blue-500" />
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="text-sm font-semibold text-slate-700" for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required
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

        <div>
            <label class="text-sm font-semibold text-slate-700" for="password_confirmation">Confirm password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required
                   class="mt-1 block w-full rounded-md border-slate-300 focus:border-blue-500 focus:ring-blue-500" />
        </div>

        <button type="submit" class="w-full inline-flex items-center justify-center rounded-md bg-gradient-to-r from-blue-600 to-blue-700 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Register</button>

        <div class="text-sm text-slate-700">
            Already have an account?
            <a href="{{ route('login') }}" class="font-semibold text-blue-700 hover:underline">Log in</a>
        </div>
    </form>
</x-guest-layout>
