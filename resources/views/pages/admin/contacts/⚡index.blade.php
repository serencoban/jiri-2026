<?php

use App\Models\Contact;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

new #[Layout('layouts::admin', ['title' => 'Contacts'])] class extends Component
{
    use WithPagination;

    public string $search = '';

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    #[Computed]
    public function contacts()
    {
        return Contact::query()
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query
                        ->where('firstname', 'like', '%' . $this->search . '%')
                        ->orWhere('lastname', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%');
                });
            })
            ->paginate(10);
    }
};

?>

<div>

    <div class="mb-8">
        <div class="mb-6">
            <h1 class="text-3xl font-semibold md:text-4xl">{{ __('title.contacts_list') }}</h1>
            <p class="mt-1 text-sm text-text-light">{{ $this->contacts->total() }} contact(s)</p>
        </div>

        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div class="w-full md:max-w-md">
                <x-generic.table.table-filter.search-input wire:model.live.debounce.300ms="search"/>
            </div>
            <button type="button" @click="$dispatch('open-add-contact')" class="btn-main shrink-0">{{ __('actions.add_contact') }}</button>
        </div>
    </div>
    <livewire:modals.contacts.add-contact />

    <div class="w-full md:table md:table-auto md:rounded-xl md:border md:border-neutral-200">
        <div class="hidden md:table-header-group font-semibold bg-light-white">
            <div class="table-row">
                <x-generic.table.header title="Photo" />
                <x-generic.table.header title="Prénom" />
                <x-generic.table.header title="Nom" />
                <x-generic.table.header title="Email" />
                <x-generic.table.header title="Actions" />
            </div>
        </div>
        <x-admin.contacts.list :contacts="$this->contacts"/>
    </div>
    <div class="mt-8">
        {{ $this->contacts->links() }}
    </div>
</div>
