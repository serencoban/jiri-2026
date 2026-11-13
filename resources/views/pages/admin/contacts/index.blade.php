<x-layouts.admin :title="__('title.contacts_list')">
    <div class="flex items-center justify-between mb-10">
        <h1 class="text-4xl">{{__('title.contacts_list')}}</h1>
        <div class="flex" x-data>
            <x-generic.table.table-filter.search-input/>
            <button type="button" @click="$dispatch('open-add-contact')" class="btn-main">{{__('actions.add_contact')}}</button>
        </div>
    </div>
        <livewire:modals.contacts.add-contact/>
    <div>
        <div class="table w-full table-auto rounded-lg overflow-hidden">
            <div class="table-header-group font-semibold bg-light-white">
                <div class="table-row">
                    <x-generic.table.header title="Profile" />
                    <x-generic.table.header title="Prénom" />
                    <x-generic.table.header title="Nom" />
                    <x-generic.table.header title="Email" />
                    <x-generic.table.header title="Actions" />
                </div>
            </div>
            <x-admin.contacts.list :contacts="$contacts"/>
        </div>
        <div class="mt-6">
            {{ $contacts->links() }}
        </div>
    </div>
</x-layouts.admin>
