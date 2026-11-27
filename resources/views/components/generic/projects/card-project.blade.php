@props([
    'project',
    'weighting' => null,
])

<div class="relative flex flex-col h-full p-5 bg-white border border-neutral-200 rounded-2xl transition hover:border-neutral-300 hover:shadow-sm">
    <div class="flex items-start justify-between gap-4 mb-4">
        <div class="min-w-0">
            <h3 class="text-xl font-semibold leading-tight">{{ $project->name }}</h3>
            @if ($weighting !== null)
                <span class="inline-block mt-2 px-3 py-1 text-sm font-medium rounded-full bg-light-white">
                    Pondération : {{ $weighting }}%
                </span>
            @endif
        </div>
        <div class="shrink-0">
            <livewire:generic.btn.actions
                type="project"
                :id="$project->id"
            />
        </div>
    </div>
    <p class="mb-5 text-sm leading-6 text-text-light">{{ $project->description }}</p>

    @if ($project->brief_url)
        <div class="mb-5">
            <a href="{{ $project->brief_url }}" class="btn-sec inline-flex">Aller vers le cahier des charges</a>
        </div>
    @endif

    <div class="mt-auto">
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm font-medium">Tâches</span>
        </div>
        <ul class="space-y-2 p-4 bg-light-white rounded-xl">
            @forelse ($project->tasks as $task)
                <li class="flex items-start gap-2 text-sm">
                    <span class="mt-2 w-1.5 h-1.5 shrink-0 rounded-full bg-main-red"></span>
                    <span>{{ $task->label }}</span>
                </li>
            @empty
                <li class="text-sm text-text-light">
                    Aucune tâche pour ce projet.
                </li>
            @endforelse
        </ul>
    </div>
</div>
