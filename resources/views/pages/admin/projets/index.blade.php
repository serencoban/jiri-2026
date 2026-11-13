<x-layouts.admin :title="__('title.projects_list')">
    <div class="flex items-center justify-between mb-10">
        <h1 class="text-4xl">{{__('title.projects_list')}}</h1>
        <div class="flex" x-data>
            <x-generic.table.table-filter.search-input/>
            <button type="button" @click="$dispatch('open-add-project')" class="btn-main">{{__('actions.add_project')}}</button>
        </div>
    </div>
        <livewire:modals.projects.add-project/>
    <div class="grid grid-cols-3 gap-8">
        @foreach($projects as $project)
            <x-generic.projects.card-project
                :project="$project"
                :show-weighting="false"
            />
        @endforeach
    </div>
    <div class="mt-6">
        {{ $projects->links() }}
    </div>
</x-layouts.admin>
