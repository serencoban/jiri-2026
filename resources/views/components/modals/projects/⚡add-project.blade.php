<?php

use App\Models\Project;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{
    public bool $open = false;
    public string $name = '';
    public string $description = '';
    public string $brief_url = '';
    public array $tasks = [''];

    #[On('open-add-project')]
    public function open(): void
    {
        $this->open = true;
    }

    public function close(): void
    {
        $this->open = false;
    }

    public function addTask(): void
    {
        $this->tasks[] = '';
    }

    public function removeTask(int $index): void
    {
        unset($this->tasks[$index]);
        $this->tasks = array_values($this->tasks);
    }

    public function submit(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'brief_url' => ['required', 'url', 'max:255'],
            'tasks' => ['required', 'array', 'min:1'],
            'tasks.*' => ['required', 'string', 'max:255'],
        ]);

        $project = Project::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'brief_url' => $validated['brief_url'],
        ]);

        foreach ($validated['tasks'] as $task) {
            $project->tasks()->create([
                'label'=> $task,
            ]);
        }

        $this->reset([
            'name',
            'description',
            'brief_url',
        ]);

        $this->tasks = [''];
        $this->open = false;
        $this->dispatch('project-created');
    }
};

?>

<x-modals.base open="$wire.open">
    <form wire:submit="submit">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-semibold">{{ __('actions.add_project') }}</h2>
            <button type="button" wire:click="close" class="flex h-9 w-9 items-center justify-center rounded-lg text-text-light transition hover:bg-neutral-100 hover:text-neutral-900">✕</button>
        </div>

        <div class="space-y-5">
            <x-generic.form.input
                label="Nom du projet"
                name="name"
                id="name"
                placeholder="ex : Portfolio 2027"
                wire:model="name"
            />

            <div>
                <label for="description" class="mb-2 block text-sm font-medium">Description du projet</label>
                <div class="rounded-xl border border-neutral-200 overflow-hidden">
                    <div class="flex flex-wrap gap-2 border-b border-neutral-200 bg-light-white p-2">
                        <button type="button" class="rounded-lg px-3 py-1.5 text-sm font-semibold hover:bg-white">B</button>
                        <button type="button" class="rounded-lg px-3 py-1.5 text-sm italic hover:bg-white">I</button>
                        <button type="button" class="rounded-lg px-3 py-1.5 text-sm underline hover:bg-white">U</button>
                    </div>
                    <textarea wire:model="description" id="description" rows="6" class="w-full resize-none border-0 p-4 outline-none focus:ring-0" placeholder="Décrivez le projet..."></textarea>
                </div>
                @error('description')
                <p class="mt-1 text-sm text-main-red">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <x-generic.form.input
                label="Lien du cahier des charges"
                type="url"
                name="brief_url"
                id="brief_url"
                placeholder="https://..."
                wire:model="brief_url"
            />

            <div>
                <div class="mb-3 flex items-center justify-between">
                    <label class="text-sm font-medium">Tâches du projet</label>
                    <button type="button" wire:click="addTask" class="text-sm font-medium text-main-red">+ Ajouter une tâche</button>
                </div>
                <div class="space-y-3">
                    @foreach ($tasks as $index => $task)
                        <div class="flex items-center gap-2">
                            <input type="text" wire:model="tasks.{{ $index }}" class="flex-1 rounded-xl border border-neutral-200 px-4 py-3 outline-none transition focus:border-main-red focus:ring-2 focus:ring-main-red/10" placeholder="ex : Réaliser la maquette">
                            @if(count($tasks) > 1)
                                <button type="button" wire:click="removeTask({{ $index }})" class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg text-main-red transition hover:bg-red-50">✕</button>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <button type="submit" class="btn-main mt-6 w-full">{{ __('actions.create_project') }}</button>
    </form>
</x-modals.base>

