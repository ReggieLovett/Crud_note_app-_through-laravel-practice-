<x-layout title="Register">
    <x-auth-card heading="Create your account">
        <form action="{{ route('register') }}" method="POST">
            @csrf

            <x-input-field label="Name" name="name" autocomplete="name" autofocus />
            <x-input-field label="Email" name="email" type="email" autocomplete="email" />
            <x-input-field label="Password" name="password" type="password" autocomplete="new-password" />
            <x-input-field label="Confirm Password" name="password_confirmation" type="password" autocomplete="new-password" />

            <button type="submit"
                    class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 cursor-pointer mt-2">Register</button>
        </form>

        @if (Route::has('login'))
            <p class="text-sm text-center text-gray-600 mt-6">
                Already registered?
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Log in</a>
            </p>
        @endif
    </x-auth-card>
</x-layout>
