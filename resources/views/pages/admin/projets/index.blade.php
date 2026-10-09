<x-layouts.admin>
    <h1 class="text-4xl pb-8">Liste des projets</h1>
    <div class="flex justify-end pb-8">
        <x-generic.table.table-filter.search-input/>
        <x-generic.btn.main title="Ajouter un projet"/>
    </div>
    <div class="grid grid-cols-3 gap-8">
        <x-generic.projects.card-project title="Portfolio" :show_weighting="false" />
        <x-generic.projects.card-project title="Site reproduction" :show_weighting="false" />
        <x-generic.projects.card-project title="Le Vieux Moulin" :show_weighting="false" />
    </div>
</x-layouts.admin>
