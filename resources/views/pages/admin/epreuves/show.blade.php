<x-layouts.admin>
    <div class="flex justify-between pb-20">
        <h1 class="text-4xl font-medium">Bienvenue sur Épreuve 27</h1>
        <x-generic.btn.main title="Clôturer l'épreuve"/>
    </div>
    <section class="pb-20">
        <div class="flex justify-between">
            <h2 class="text-3xl font-medium">Liste des élèves</h2>
            <div class="flex pb-4">
                <x-generic.table.table-filter.search-input/>
                <x-generic.btn.main title="Ajouter une épreuve"/>
            </div>
        </div>
        <x-generic.epreuves.students.cards/>
    </section>
    <section class="pb-20">
        <div class="flex justify-between">
            <h2 class="text-3xl font-medium">Liste des évaluateurs</h2>
            <div class="flex pb-4">
                <x-generic.table.table-filter.search-input/>
                <x-generic.btn.main title="Ajouter un évaluateur"/>
            </div>
        </div>
        <x-generic.epreuves.evaluators.cards/>
    </section>
    <section class="pb-20">
        <div class="flex justify-between mb-2">
            <div class="flex gap-4 items-center">
                <h2 class="text-3xl font-medium">Liste des projets</h2>
                <div class="tooltip-ponderation">
                    <x-generic.projects.tooltip/>
                </div>
            </div>
            <div class="flex pb-4">
                <x-generic.table.table-filter.search-input/>
                <x-generic.btn.main title="Ajouter un projet"/>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-8">
            @for($i = 0; $i < 4; $i++)
                <x-generic.projects.card-project/>
            @endfor
        </div>
    </section>
</x-layouts.admin>
