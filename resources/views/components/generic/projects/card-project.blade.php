@props([
    'project' => null,
    'title' => null,
    'description' => null,
    'show_weighting' => true,
    'weighting' => 0,
])

@php
    $projectTitle = $project?->name ?? $title;
    $projectDescription = $project?->description ?? $description;
@endphp

<div class="p-4 border rounded-lg border-grey">
    <div class="flex justify-between pb-4 items-center">
        <h3 class="text-2xl">{{ $projectTitle }}</h3>
        @if($show_weighting)
            <span class="text-xl font-medium">{{ $weighting }}%</span>
        @endif
        <button type="button" class="cursor-pointer">...</button>
    </div>
    <p class="text-text-light pb-4">{{ $projectDescription ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.' }}</p>
    <a href="#" class="btn-sec">Aller vers le cahier de charge</a>
    <div class="pt-4">
        <span class="block pb-2">Liste des tâches pour ce projet</span>
        <ul class="bg-light-white rounded-lg px-8 py-4 list-disc">
            @if($project)
                @forelse($project->tasks as $task)
                    <li class="marker:text-main-red">
                        {{ $task->label }}
                    </li>
                @empty
                    <li class="list-none text-text-light">
                        Aucune tâche.
                    </li>
                @endforelse
            @else
                <li class="marker:text-main-red">Faire ceci</li>
                <li class="marker:text-main-red">Faire cela</li>
                <li class="marker:text-main-red">Respecter le cahier des charges</li>
            @endif
        </ul>
    </div>
</div>
