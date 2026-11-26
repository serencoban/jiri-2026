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
    <div class="flex items-center justify-between mb-10">
        <h1 class="text-4xl">{{ __('title.contacts') }}</h1>
        <div class="flex">
            <x-generic.table.table-filter.search-input wire:model.live.debounce.300ms="search"/>
            <button type="button" @click="$dispatch('open-add-contact')" class="btn-main">{{ __('actions.add_contact') }}</button>
        </div>
    </div>
    <livewire:modals.contacts.add-contact />
    <div>
        <div class="table w-full table-auto rounded-lg overflow-hidden">
            <div class="table-header-group font-semibold bg-light-white">
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
        <div class="mt-6">
            {{ $this->contacts->links() }}
        </div>
    </div>
</div>
