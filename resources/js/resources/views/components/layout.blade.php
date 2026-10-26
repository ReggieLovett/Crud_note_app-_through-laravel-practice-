@props(['title' => 'My Notes'])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="max-w-2xl mx-auto p-6">
        <header class="flex items-center justify-between mb-6">
            <a href="{{ route('notes.index') }}" class="text-xl font-bold text-gray-900">My Notes</a>

            <nav class="flex items-center gap-4 text-sm">
                {{-- Shown only when a user is logged in --}}
                @auth
                    <span class="text-gray-600">Hi, {{ auth()->user()->name }}</span>

                    @if (Route::has('logout'))
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="text-gray-600 hover:text-gray-900 hover:underline cursor-pointer">Log out</button>
                        </form>
                    @endif
                @endauth

                {{-- Shown only to visitors who are not logged in --}}
                @guest
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900 hover:underline">Log in</a>
                    @endif
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="bg-blue-600 text-white px-3 py-1.5 rounded-lg hover:bg-blue-700">Register</a>
                    @endif
                @endguest
            </nav>
        </header>

        @if (session('success'))
            <x-alert>{{ session('success') }}</x-alert>
        @endif

        {{ $slot }}
    </div>
</body>
</html>
