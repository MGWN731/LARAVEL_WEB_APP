<x-guest-layout>
    <h1 class="text-lg font-semibold text-slate-900">Forgot password</h1>
    <p class="mt-1 text-sm text-slate-600">We’ll email you a reset link.</p>

    <form method="POST" action="{{ route('password.email') }}" class="mt-6 space-y-4">
        @csrf

        <div>
            <label class="text-sm font-semibold text-slate-700" for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                   class="mt-1 block w-full rounded-md border-slate-300 focus:border-blue-500 focus:ring-blue-500" />
            @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="w-full inline-flex items-center justify-center rounded-md bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Send reset link</button>

        <div class="text-sm">
            <a href="{{ route('login') }}" class="font-semibold text-blue-700 hover:underline">Back to login</a>
        </div>
    </form>
</x-guest-layout>
