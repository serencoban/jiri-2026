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

<div>
    <div
        x-show="$wire.open"
        class="fixed inset-0 z-40 bg-black/40"
    ></div>

    <div
        x-show="$wire.open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        @click.outside="$wire.close()"
        @keyup.escape.window="$wire.close()"
        class="modal"
    >
        <form wire:submit="submit">
            <h2 class="font-semibold text-2xl mb-8">{{ __('actions.add_contact') }}</h2>
            <div class="relative">
                <img class="w-30 h-30 rounded-full mx-auto" src="{{ asset('storage/cat1.jpg') }}" alt="">
                <span class="absolute bg-main-red w-8 h-8 left-62 bottom-0.5 rounded-full"></span>
            </div>

            <div class="flex gap-2 mt-8 mb-4">
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
            <x-generic.form.input
                label="Email"
                type="email"
                name="email"
                id="email"
                placeholder="ex: jane@doe.com"
                wire:model="email"
            />
            <button type="submit" class="btn-main w-full mt-4">{{ __('actions.create_contact') }}</button>
        </form>
    </div>
</div>
