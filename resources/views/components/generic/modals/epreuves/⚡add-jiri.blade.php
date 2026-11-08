<?php

use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{
    public bool $open = false;

    public function close()
    {
        $this->open = false;
    }

    #[On('open-add-jiri')]
    public function open()
    {
        $this->open = true;
    }

    public function nextModal(){
        $this->open= false;
        $this->dispatch('open-add-evaluators');
    }
};
?>
<div>
    <div x-show="$wire.open" class="fixed inset-0 z-40 bg-black/40"></div>
    <div x-show="$wire.open"
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
        <form action="" method="get">
            <x-generic.modals.steps :current-step="1" />

            <h2 class="font-semibold text-2xl mb-8">{{__('actions.add_jiri')}}</h2>
            <x-generic.form.input
                label="Nom du jiri"
                name="name"
                type="text"
                placeholder="ex : Design Web - Juin 2021"
                class="mb-4"
            />
            <x-generic.form.input
                label="Date du jiri"
                name="date"
                type="date"
                placeholder="ex : Design Web - Juin 2021"
                class="mb-4"
            />
            <div class="flex gap-2 mb-4">
                <x-generic.form.input
                    label="Début du jiri"
                    name="begins_at"
                    type="text"
                    placeholder="ex : 8h30"
                />
                <x-generic.form.input
                    label="Fin du jiri"
                    name="ends_at"
                    type="text"
                    placeholder="ex : 17h30"
                />
            </div>
            <button type="button" class="btn-main w-full mt-4" wire:click="nextModal">{{__('actions.next')}}</button>
        </form>
    </div>
</div>
