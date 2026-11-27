<?php

use App\Enums\EnumsAttendanceRole;
use App\Models\Contact;
use App\Models\Jiri;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component {

    public bool $open = false;
    public string $jiriId;
    public string $search = '';
    public array $selectedContacts = [];

    #[On('open-add-evaluator')]
    public function open(): void
    {
        $this->reset('search', 'selectedContacts');
        $this->open = true;
    }

    public function close(): void
    {
        $this->open = false;
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
            ->limit(10)
            ->get();
    }

    public function submit(): void
    {
        if (empty($this->selectedContacts)) {
            return;
        }
        $jiri = Jiri::findOrFail($this->jiriId);
        $contacts = [];

        foreach ($this->selectedContacts as $contactId) {
            $contacts[$contactId] = [
                'role' => EnumsAttendanceRole::Evaluator->value,
            ];
        }

        $jiri->contacts()->syncWithoutDetaching($contacts);
        $this->reset('search', 'selectedContacts');
        $this->open = false;
        $this->dispatch('contact-added');
    }
};

?>

<x-modals.base open="$wire.open">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-semibold">Ajouter des évaluateurs</h2>
        <button type="button" wire:click="close" class="flex h-9 w-9 items-center justify-center rounded-lg text-text-light transition hover:bg-neutral-100 hover:text-neutral-900">✕</button>
    </div>
    <x-generic.table.table-filter.search-input wire:model.live.debounce.300ms="search" />

    <div class="mt-4 max-h-[50vh] space-y-2 overflow-y-auto">
        @forelse ($this->contacts as $contact)
            <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-neutral-200 p-3 transition hover:bg-light-white">
                <input type="checkbox" wire:model.live="selectedContacts" value="{{ $contact->id }}">
                <img src="{{ asset('storage/' . $contact->image) }}" alt="Photo de {{ $contact->firstname }} {{ $contact->lastname }}" class="h-10 w-10 rounded-full object-cover">
                <div class="min-w-0">
                    <span class="block font-medium">{{ $contact->firstname }} {{ $contact->lastname }}</span>
                    <span class="block truncate text-sm text-text-light">{{ $contact->email }}</span>
                </div>
            </label>
        @empty
            <p class="py-6 text-center text-sm text-text-light">Aucun contact trouvé.</p>
        @endforelse
    </div>

    <button type="button" wire:click="submit" class="btn-main mt-6 w-full" @disabled(empty($selectedContacts))>Ajouter les évaluateurs</button>
</x-modals.base>
