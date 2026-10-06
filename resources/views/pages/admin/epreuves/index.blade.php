<x-layouts.admin>
    <h1 class="text-4xl pb-8">Liste des épreuves</h1>
    <div class="flex justify-end pb-4">
        <x-table-filter.search-filter-btn />
    </div>
    <div>
        <div class="table w-full table-auto rounded-lg overflow-hidden">
            <div class="table-header-group bg-light-white ">
                    <div class="table-row">
                        <div class="table-cell px-6 py-4 text-center">Nom</div>
                        <div class="table-cell px-6 py-4 text-center">Date</div>
                        <div class="table-cell px-6 py-4 text-center">Heure début</div>
                        <div class="table-cell px-6 py-4 text-center">Heure fin</div>
                        <div class="table-cell px-6 py-4 text-center">Statut</div>
                        <div class="table-cell px-6 py-4 text-center">Actions</div>
                    </div>
            </div>

            <div class="table-row-group">
                @for ($i = 0; $i < 15; $i++)
                    <x-epreuve-row />
                @endfor
            </div>
        </div>
    </div>

</x-layouts.admin>
