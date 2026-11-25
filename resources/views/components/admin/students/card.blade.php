@props([
    'id',
    'image',
    'contact',
    'evaluators_seen' => 0,
    'contact_view' => 'élèves',
])

<div class="relative">

    <a href="{{ route('students.index') }}" class="block">
        <div class="flex flex-col items-center border border-grey rounded-lg p-4 cursor-pointer hover:bg-light-white">
            <img class="mb-2 w-16 h-16 rounded-full" src="{{ asset('storage/' . $image) }}" alt="">
            <span class="text-xl font-medium">{{ $contact }}</span>
            <span>
                @if ($contact_view === 'élèves')
                    {{ $evaluators_seen }}/10 élèves
                @else
                    {{ $evaluators_seen }}/10 évaluateurs
                @endif
            </span>
        </div>
    </a>

    <div class="absolute top-3 right-4">
        <livewire:generic.btn.actions
            type="contact"
            :id="$id"
            :with-border="false"
            :with-padding="false"
        />
    </div>
</div>
