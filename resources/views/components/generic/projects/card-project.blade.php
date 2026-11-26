@props([
    'project',
    'weighting' => null,
])

<div class="p-4 border rounded-lg border-grey">
    <div class="flex justify-between pb-4 items-center">
        <h3 class="text-2xl">{{ $project->name }}</h3>
        <div class="flex items-center gap-4">
            @if ($weighting !== null)
                <span class="text-xl font-medium">{{ $weighting }}%</span>
            @endif
            <livewire:generic.btn.actions
                type="project"
                :id="$project->id"
                :with-border="false"
                :with-padding="false"
            />
        </div>
    </div>
    <p class="text-text-light pb-4">{{ $project->description }}</p>
    @if ($project->brief_url)
        <a href="{{ $project->brief_url }}" class="btn-sec">Aller vers le cahier des charges</a>
    @endif

    <div class="pt-4">
        <span class="block pb-2">Liste des tâches pour ce projet</span>
        <ul class="bg-light-white rounded-lg px-8 py-4 list-disc">
            @foreach ($project->tasks as $task)
                <li class="marker:text-main-red">{{ $task->label }}</li>
            @endforeach
        </ul>
    </div>
</div>
