<?php

use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

new #[Layout('layouts::admin', ['title' => 'Épreuves'])] class extends Component
{
    use WithPagination;

    public string $search = '';

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    #[Computed]
    public function jiris()
    {
        return auth()
            ->user()
            ->jiris()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);
    }

    #[On('jiri-created')]
    public function refreshJiris(): void
    {
        $this->resetPage();
    }
};

?>

<div>
    <div class="mb-8">
        <div class="flex items-end justify-between gap-4 mb-6">
            <div>
                <h1 class="text-3xl font-semibold md:text-4xl">{{ __('title.epreuves') }}</h1>
                <p class="mt-2 text-sm text-text-light">{{ $this->jiris->total() }} épreuve(s)</p>
            </div>
        </div>

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between mb-8">
            <div class="w-full md:max-w-md">
                <x-generic.table.table-filter.search-input
                    wire:model.live.debounce.300ms="search"
                />
            </div>

            <button type="button" @click="$dispatch('open-add-jiri')" class="btn-main shrink-0">{{ __('actions.add_jiri') }}</button>
        </div>
    </div>

    <livewire:modals.epreuves.add-jiri />

    <div class="w-full md:table md:table-auto md:rounded-xl md:border md:border-neutral-200">
        <div class="hidden md:table-header-group font-semibold bg-light-white">
            <div class="table-row">
                <x-generic.table.header title="Nom" />
                <x-generic.table.header title="Date" />
                <x-generic.table.header title="Heure de début" />
                <x-generic.table.header title="Heure de fin" />
                <x-generic.table.header title="Statuts" />
                <x-generic.table.header title="Actions" />
            </div>
        </div>
        <x-admin.epreuves.list :jiris="$this->jiris" />
    </div>
    <div class="mt-8">
        {{ $this->jiris->links() }}
    </div>
</div>
