<x-layouts.admin>
    <h1 class="text-4xl pb-8">Liste des projets</h1>
    <div class="flex justify-end pb-8">
        <x-generic.table.table-filter.search-filter-btn />
    </div>
    <div class="grid grid-cols-3 gap-8">
        @for ($i = 0; $i < 6; $i++)
            <x-generic.projects.card-project />
        @endfor
    </div>
</x-layouts.admin>
