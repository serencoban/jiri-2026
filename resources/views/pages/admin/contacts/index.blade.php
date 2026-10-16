<x-layouts.admin>
    <h1 class="text-4xl pb-8">{{__('title.contacts_list')}}</h1>
    <div class="flex justify-end pb-4">
        <x-generic.table.table-filter.search-input/>
        <x-generic.btn.main title="Ajouter un contact"/>
    </div>
    <div>
        <div class="table w-full table-auto rounded-lg overflow-hidden">
            <div class="table-header-group font-semibold bg-light-white">
                <div class="table-row">
                    <div class="table-cell px-6 py-4 text-center">{{__('table.profile')}}</div>
                    <div class="table-cell px-6 py-4 text-center">{{__('table.firstname')}}</div>
                    <div class="table-cell px-6 py-4 text-center">{{__('table.lastname')}}</div>
                    <div class="table-cell px-6 py-4 text-center">{{__('table.email')}}</div>
                    <div class="table-cell px-6 py-4 text-center">{{__('table.actions')}}</div>
                </div>
            </div>
            <x-admin.contacts.list/>
        </div>
    </div>
</x-layouts.admin>
