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

    #[On('open-add-projects')]
    public function open()
    {
        $this->open = true;
    }

    public function submit(){
        $this->open= false;
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
            <x-modals.steps :current-step="4" />

            <h2 class="font-semibold text-2xl mb-8">{{__('actions.add_projects')}}</h2>
            <x-generic.table.table-filter.search-input/>
            <button type="submit" class="btn-main w-full mt-4" wire:click="submit">{{__('actions.create_jiri')}}</button>
        </form>
    </div>
</div>
