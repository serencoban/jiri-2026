<?php

use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component {
    public bool $open = false;

    public function close()
    {
        $this->open = false;
    }

    #[On('open-add-project')]
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
            <h2 class="font-semibold text-2xl mb-8">{{__('actions.add_project')}}</h2>
            <form action="" method="POST">
                <x-generic.form.input
                    label="Nom du projet"
                    name="name"
                    id="name"
                    placeholder="ex: Examen d'anglais 2025"
                />
                <div class="my-4">
                    <label class="block mb-1 font-medium" for="description">Description du projet</label>
                    <textarea class="w-full border border-neutral-200 rounded-md py-2 px-3" name="description" id="description" cols="5" rows="5" placeholder="Voici une jolie description..."></textarea>
                </div>
                <x-generic.form.input
                    label="Ajouter les tâches du projet"
                    name="tasks"
                    id="tasks"
                    placeholder="ex: faire ceci"
                />
                <button type="submit" class="btn-main w-full mt-4" wire:click="submit">{{__('actions.create_project')}}</button>
            </form>
        </form>
    </div>
</div>

