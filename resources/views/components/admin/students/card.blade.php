@props([
    'image',
    'contact',
    'evaluators_seen' =>0,
    'contact_view' => 'élèves'
])
<a href="{{route('students.index')}}">
    <div class="flex relative flex-col items-center border border-grey rounded-lg p-4 cursor-pointer hover:bg-light-white">
        <div class="cursor-pointer absolute top-3 right-4"
             x-data="{open:false}"
             @mouseenter="open =true"
             @mouseleave="open= false"
        >
            <button class="cursor-pointer"
                    type="button"
                    @click.stop

            >
                <x-svg.actions/>
            </button>
            <div x-cloak
                 x-show="open"
                 x-transition
                 class="absolute left-4 top-4 z-100 min-w-36 overflow-hidden rounded-lg border border-neutral-200 bg-white shadow-lg"
                 @click.stop
            >
                <button type="button" class="block w-full px-4 py-3 text-left text-sm hover:bg-neutral-50">Modifier</button>
                <button type="button" class="block w-full px-4 py-3 text-left text-sm hover:bg-neutral-50">Supprimer</button>
            </div>
        </div>

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
