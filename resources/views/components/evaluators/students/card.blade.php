@props([
    'image',
    'student',
    'evaluators_seen'=>0,
    'status' => 'not_started',
])

<a href="{{ route('evaluators.show') }}">
    <div class="relative flex flex-col items-center border border-grey rounded-lg p-4 cursor-pointer hover:bg-light-white transition">
        <div class="absolute top-3 right-3">
            @if($status === 'not_started')
                <div class="w-6 h-6 rounded-full border border-text-light"></div>

            @elseif($status === 'draft')
                <div class="w-6 h-6 rounded-full border border-main-red flex items-center justify-center text-main-red">
                    <x-svg.pending/>
                </div>

            @elseif($status === 'submitted')
                <div class="w-6 h-6 rounded-full bg-main-red flex items-center justify-center text-white text-sm">
                    ✓
                </div>
            @endif
        </div>

        <img class="mb-2 w-16 h-16 rounded-full" src="{{ asset('storage/' . $image) }}" alt="Photo de l'élève">
        <span class="text-xl font-medium">{{$student}}</span>
        <span>{{$evaluators_seen}}/10 évaluateurs </span>
    </div>
</a>
