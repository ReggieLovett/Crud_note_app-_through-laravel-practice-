<x-layout title="Log in">
    <x-auth-card heading="Log in to My Notes">
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <x-input-field label="Email" name="email" type="email" autocomplete="email" autofocus />
            <x-input-field label="Password" name="password" type="password" autocomplete="current-password" />

            <label class="flex items-center gap-2 mb-6 text-sm text-gray-700">
                <input type="checkbox" name="remember" value="1" @checked(old('remember'))
                       class="rounded border-gray-300">
                Remember me
            </label>

            <button type="submit"
                    class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 cursor-pointer">Log in</button>
        </form>

        @if (Route::has('register'))
            <p class="text-sm text-center text-gray-600 mt-6">
                No account yet?
                <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Create one</a>
            </p>
        @endif
    </x-auth-card>
</x-layout>
