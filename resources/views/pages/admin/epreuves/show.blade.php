<x-layouts.admin :title="$jiri->name">
    <div class="flex justify-between pb-20">
        <h1 class="text-4xl font-medium"> {{ $jiri->name }}</h1>
        <form action="{{route('send-invitation')}}" method="post">
            @csrf
            <button type="submit">{{__('actions.send_invitation')}}</button>
        </form>
        <x-generic.btn.main title="Clôturer l'épreuve"/>
    </div>
    <section class="pb-20">
        <div class="flex justify-between">
            <h2 class="text-3xl font-medium">{{__('title.students_list')}}</h2>
            <div class="flex pb-4">
                <x-generic.table.table-filter.search-input/>
                <button type="button" @click="$dispatch('open-add-student')" class="btn-main">{{__('actions.add_student')}}</button>
                <livewire:modals.epreuves.students.add-student/>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-8">
            @foreach ($jiri->evaluated as $evaluated)
                <x-admin.students.card
                    image="cat2.jpg"
                    :contact="$evaluated->firstname , $evaluated->lastname"
                    evaluators_seen="7"
                    contact_view="élèves"
                />
            @endforeach
        </div>
    </section>
    <section class="pb-20">
        <div class="flex justify-between">
            <h2 class="text-3xl font-medium">{{__('title.evaluators_list')}}</h2>
            <div class="flex pb-4">
                <x-generic.table.table-filter.search-input/>
                <button type="button" @click="$dispatch('open-add-evaluator')" class="btn-main">{{__('actions.add_evaluator')}}</button>
                <livewire:modals.epreuves.evaluators.add-evaluator/>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-8">
        @foreach ($jiri->evaluators as $evaluator)
            <x-admin.students.card
                image="andrew.jpg"
                :contact="$evaluator->firstname , $evaluator->lastname "
                evaluators_seen="7"
                contact_view="élèves"
            />
        @endforeach
        </div>
    </section>
    <section class="pb-20">
        <div class="flex justify-between mb-2">
            <div class="flex gap-4 items-center">
                <h2 class="text-3xl font-medium">{{__('title.projects_list')}}</h2>
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
            <x-generic.projects.card-project title="Portfolio" :show_weighting="true" weighting="33" />
            <x-generic.projects.card-project title="Site reproduction" :show_weighting="true" weighting="33" />
            <x-generic.projects.card-project title="Le Vieux Moulin" :show_weighting="true" weighting="33" />
        </div>
    </section>
</x-layouts.admin>
