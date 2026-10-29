@props(['note'])

<div class="bg-white border border-gray-200 rounded-lg p-4 mb-3 shadow-sm">
    <h3 class="font-semibold text-lg">{{ $note->title }}</h3>
    <p class="text-gray-600 mt-1">{{ $note->body }}</p>

    <a href="{{ route('notes.edit', $note) }}"
       class="inline-block mt-3 text-sm text-blue-600 hover:underline">Edit</a>
</div>
