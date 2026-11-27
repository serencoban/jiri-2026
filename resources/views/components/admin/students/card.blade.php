@props([
    'id',
    'image',
    'contact',
    'seen_count' => 0,
    'seen_type' => 'évaluateurs',
])

<div class="relative h-full">
    <a href="{{ route('students.index') }}" class="block h-full">
        <div class="flex h-full flex-col items-center justify-center rounded-2xl border border-neutral-200 bg-white p-5 text-center transition hover:border-neutral-300 hover:bg-light-white">
            <img class="mb-3 h-16 w-16 rounded-full object-cover" src="{{ asset('storage/' . $image) }}" alt="Photo de {{ $contact }}">
            <span class="max-w-full truncate text-lg font-semibold">{{ $contact }}</span>
            <span class="mt-1 text-sm text-text-light">{{ $seen_count }}/10 {{ $seen_type }}</span>
        </div>
    </a>

    <div class="absolute top-3 right-3" @click.stop>
        <livewire:generic.btn.actions
            type="contact"
            :id="$id"
        />
    </div>
</div>
