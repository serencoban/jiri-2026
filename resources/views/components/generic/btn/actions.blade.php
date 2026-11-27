<?php

use App\Models\Contact;
use App\Models\Jiri;
use App\Models\Project;
use Livewire\Component;

new class extends Component {

    public string $type;
    public string $id;

    private const MAP = [ // Tableau qui fait le lien entre une clé et la classe Eloquent correspondante.
        'jiri' => Jiri::class,
        'contact' => Contact::class,
        'project' => Project::class,
    ];

    public function delete(): void // Méthode appelée par Livewire quand on fait wire:click="delete"
    {
        $modelClass = self::MAP[$this->type]; // On regarde dans MAP quelle classe correspond au type reçu.
        $item = $modelClass::findOrFail($this->id); // On utilise la classe récupérée pour chercher l'élément en DB.
        $item->delete();  // Supprime l'élément trouvé dans la base de données.
        $this->redirect(url()->previous());
    }
};

?>

<div
    class="relative inline-block text-center"
    x-data="{ open: false }"
    @mouseenter="open = true"
    @mouseleave="open = false"
>
    <button type="button" class="inline-flex items-center justify-center cursor-pointer" @click.stop>
        <x-svg.actions />
    </button>

    <div x-cloak x-show="open" x-transition class="absolute right-0 top-full mt-1 z-50 min-w-36 overflow-hidden rounded-lg border border-neutral-200 bg-white shadow-lg" @click.stop>
        <a href="#" class="block w-full px-4 py-3 text-left text-sm hover:bg-neutral-50">Modifier</a>
        <button type="button" wire:click="delete" class="block w-full px-4 py-3 text-left text-sm hover:bg-neutral-50">Supprimer</button>
    </div>
</div>
