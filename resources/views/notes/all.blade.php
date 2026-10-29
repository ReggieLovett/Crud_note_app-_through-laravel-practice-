{{-- Used in STAGE 7. Ready as-is: the N+1 lesson happens in the controller, not here. --}}
<x-layout title="Everyone's Notes">
    <h1 class="text-2xl font-bold mb-1">Everyone's Notes</h1>
    <p class="text-sm text-gray-500 mb-4">Latest notes from all users · read only</p>

    @forelse ($notes as $note)
        <div class="bg-white border border-gray-200 rounded-lg p-4 mb-3 shadow-sm">
            <div class="flex items-center justify-between">
                <h3 class="font-semibold">{{ $note->title }}</h3>
                <span class="text-xs text-gray-400">{{ $note->created_at->diffForHumans() }}</span>
            </div>
            <p class="text-gray-600 text-sm mt-1">{{ $note->body }}</p>

            {{-- the related user: this line is where N+1 happens without with('user') --}}
            <p class="text-xs text-gray-500 mt-2">by {{ $note->user->name }}</p>
        </div>
    @empty
        <p class="text-gray-500">No notes yet.</p>
    @endforelse

    {{-- only does something once the controller uses paginate() --}}
    @if (method_exists($notes, 'links'))
        <div class="mt-6">
            {{ $notes->links() }}
        </div>
    @endif
</x-layout>
