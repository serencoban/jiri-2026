<x-layouts.evaluators>
    <div class="flex justify-between pb-20">
        <h1 class="text-4xl font-medium">Bienvenue sur l'épreuve 27</h1>
    </div>
    <section class="pb-20">
        <div class="flex justify-between">
            <h2 class="text-3xl font-medium">Liste des élèves</h2>
            <div class="flex pb-4">
                <x-generic.table.table-filter.search-input/>
            </div>
        </div>
        <x-evaluators.epreuves.cards/>
    </section>
    <section class="pb-20">
        <div class="flex justify-between">
            <h2 class="text-3xl font-medium">Liste des projets</h2>
            <div class="flex pb-4">
                <x-generic.table.table-filter.search-input/>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-8">
            @for($i = 0; $i < 4; $i++)
                <x-generic.projects.card-project/>

            @endfor
        </div>
    </section>
</x-layouts.evaluators>
