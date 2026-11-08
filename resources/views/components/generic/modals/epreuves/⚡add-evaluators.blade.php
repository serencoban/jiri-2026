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

    #[On('open-add-evaluators')]
    public function open()
    {
        $this->open = true;
    }

    public function nextModal(){
        $this->open= false;
        $this->dispatch('open-add-evaluated');
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
            <x-generic.modals.steps :current-step="2" />
            <h2 class="font-semibold text-2xl mb-8">{{__('actions.add_evaluators')}}</h2>
            <x-generic.table.table-filter.search-input/>
            <button type="button" class="btn-main w-full mt-4" wire:click="nextModal">{{__('actions.next')}}</button>
        </form>
    </div>
</div>
