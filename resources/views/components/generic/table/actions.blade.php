<div class="table-cell px-6 py-4 text-center border-b border-b-gray-100 align-middle relative"
     x-data="{open:false}"
     @mouseenter="open =true"
     @mouseleave="open= false"
>
    <button class="cursor-pointer"
            type="button"
            @click.stop

    >
        <x-svg.actions/>
    </button>
    <div x-cloak
         x-show="open"
         x-transition
         class="absolute right-6 top-12 z-100 min-w-36 overflow-hidden rounded-lg border border-neutral-200 bg-white shadow-lg"
         @click.stop
    >
        <button type="button" class="block w-full px-4 py-3 text-left text-sm hover:bg-neutral-50">Modifier</button>
        <button type="button" class="block w-full px-4 py-3 text-left text-sm hover:bg-neutral-50">Supprimer</button>
    </div>
</div>
