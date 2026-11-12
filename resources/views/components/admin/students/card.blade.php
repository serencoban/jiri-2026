@props([
    'image',
    'contact',
    'evaluators_seen' =>0,
    'contact_view' => 'élèves'
])
<a href="{{route('students.index')}}">
    <div class="flex relative flex-col items-center border border-grey rounded-lg p-4 cursor-pointer hover:bg-light-white">
        <button class="cursor-pointer absolute top-5 right-5">
            <x-svg.actions/>
        </button>
        <img class="mb-2 w-16 h-16 rounded-full" src="{{ asset('storage/' . $image) }}" alt="">
        <span class="text-xl font-medium">{{$contact}}</span>
        <span>
            @if($contact_view === 'élèves')
                {{$evaluators_seen}}/10 élèves
            @else
                {{$evaluators_seen}}/10 évaluateurs
            @endif
        </span>
    </div>
</a>
