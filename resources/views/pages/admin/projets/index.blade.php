<x-layouts.admin>
    <div class="flex items-center justify-between mb-10">
        <h1 class="text-4xl">{{__('title.projects_list')}}</h1>
        <div class="flex" x-data>
            <x-generic.table.table-filter.search-input/>
            <button type="button" @click="$dispatch('open-modal')" class="btn-main">{{__('actions.add_project')}}</button>
        </div>
    </div>
    <div class="grid grid-cols-3 gap-8">
        <x-generic.projects.card-project title="Portfolio" :show_weighting="false" />
        <x-generic.projects.card-project title="Site reproduction" :show_weighting="false" />
        <x-generic.projects.card-project title="Le Vieux Moulin" :show_weighting="false" />
    </div>
</x-layouts.admin>
