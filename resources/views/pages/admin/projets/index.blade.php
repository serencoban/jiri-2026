<x-layouts.admin>
    <h1 class="text-5xl pb-8">Liste des projets</h1>
    <div class="flex justify-end pb-4">
        <x-table-filter.search-filter-btn />
    </div>
    <div class="grid grid-cols-3 gap-8">
        @for ($i = 0; $i < 6; $i++)
            <x-card-project />
        @endfor
    </div>
</x-layouts.admin>
