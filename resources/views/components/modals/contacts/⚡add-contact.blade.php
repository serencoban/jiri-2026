<?php

use App\Models\Contact;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{
    public bool $open = false;
    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';

    public function close()
    {
        $this->open = false;
    }

    #[On('open-add-contact')]
    public function open()
    {
        $this->open = true;
    }

    public function submit()
    {
        $validated = $this->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email',
        ]);

        Contact::create($validated);

        $this->reset([
            'firstname',
            'lastname',
            'email',
        ]);

        $this->open = false;
    }
};
?>

<x-modals.base open="$wire.open">
    <form wire:submit="submit">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-semibold">{{ __('actions.add_contact') }}</h2>
            <button type="button" wire:click="close" class="flex h-9 w-9 items-center justify-center rounded-lg text-text-light transition hover:bg-neutral-100 hover:text-neutral-900">✕</button>
        </div>

        <div class="relative mx-auto w-fit">
            <img class="h-24 w-24 rounded-full object-cover sm:h-28 sm:w-28" src="{{ asset('storage/cat1.jpg') }}" alt="">
            <span class="absolute bottom-0 right-1 h-7 w-7 rounded-full bg-main-red"></span>
        </div>

        <div class="grid grid-cols-1 gap-4 mt-8 sm:grid-cols-2">
            <x-generic.form.input
                label="Nom"
                name="lastname"
                id="lastname"
                placeholder="ex: Doe"
                wire:model="lastname"
            />
            <x-generic.form.input
                label="Prénom"
                name="firstname"
                id="firstname"
                placeholder="ex: Jane"
                wire:model="firstname"
            />
        </div>

        <div class="mt-4">
            <x-generic.form.input
                label="Email"
                type="email"
                name="email"
                id="email"
                placeholder="ex: jane@doe.com"
                wire:model="email"
            />
        </div>

        <button type="submit" class="btn-main mt-6 w-full">{{ __('actions.create_contact') }}</button>
    </form>
</x-modals.base>
