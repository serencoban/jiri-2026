<x-layouts.admin :title="__('title.epreuves')">
    <div class="flex items-center justify-between mb-10">
        <h1 class="text-4xl">{{__('title.epreuves')}}</h1>
        <div class="flex" x-data>
            <x-generic.table.table-filter.search-input/>
            <button type="button" @click="$dispatch('open-add-jiri')" class="btn-main">{{__('actions.add_jiri')}}</button>
        </div>
    </div>
        <livewire:modals.epreuves.add-jiri />
        <livewire:modals.epreuves.add-evaluators/>
        <livewire:modals.epreuves.add-evaluated/>
        <livewire:modals.epreuves.add-projects/>
    <div>
        <div class="table w-full table-auto rounded-lg overflow-hidden">
            <div class="table-header-group font-semibold bg-light-white ">
                <div class="table-row">
                    <x-generic.table.header title="Nom" />
                    <x-generic.table.header title="Date" />
                    <x-generic.table.header title="Heure de début" />
                    <x-generic.table.header title="Heure de fin" />
                    <x-generic.table.header title="Statuts" />
                    <x-generic.table.header title="Actions" />
                </div>
            </div>
            <x-admin.epreuves.list :jiris="$jiris"/>
        </div>
        <div class="mt-6">
            {{ $jiris->links() }}
        </div>
    </div>
</x-layouts.admin>

