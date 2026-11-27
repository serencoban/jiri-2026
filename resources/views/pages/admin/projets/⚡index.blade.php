<?php

use App\Models\Project;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

new #[Layout('layouts::admin', ['title' => 'Projets'])] class extends Component
{
    use WithPagination;

    public string $search = '';

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    #[Computed]
    public function projects()
    {
        return Project::query()
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query
                        ->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('description', 'like', '%' . $this->search . '%');
                });
            })
            ->paginate(6);
    }
};

?>

<div>
    <div class="mb-8">
        <div class="mb-6">
            <h1 class="text-3xl font-semibold md:text-4xl">{{ __('title.projects_list') }}</h1>
            <p class="mt-1 text-sm text-text-light">{{ $this->projects->total() }} projet(s)</p>
        </div>
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div class="w-full md:max-w-md">
                <x-generic.table.table-filter.search-input wire:model.live.debounce.300ms="search"/>
            </div>

            <button type="button" @click="$dispatch('open-add-project')" class="btn-main shrink-0">{{ __('actions.add_project') }}</button>
        </div>
    </div>
    <livewire:modals.projects.add-project />

    <div class="grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-3">
        @forelse ($this->projects as $project)
            <x-generic.projects.card-project
                :project="$project"
            />
        @empty
            <div class="col-span-full p-8 text-center border border-neutral-200 rounded-2xl">
                <p class="text-text-light">
                    Aucun projet trouvé.
                </p>
            </div>
        @endforelse
    </div>
    <div class="mt-8">
        {{ $this->projects->links() }}
    </div>
</div>
