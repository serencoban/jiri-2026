<x-layouts.admin title="Les côtes de Seren">
    <div class="flex gap-4 items-center pb-4">
        <h1 class="text-4xl font-medium">{{__('title.evaluated_student')}}</h1>
        <button @click="$dispatch('open-drawer')">
            <x-svg.up-down-arrow/>
        </button>
    </div>
    <div>
        <span>Côte globale de l'élève:</span>
        <span>16/20</span>
    </div>
    <section class="pt-8">
        <h2 class="sr-only">{{__('title.students_projects')}}</h2>
        <div x-data="{ selectedTab: 'portfolio' }" class="w-full">
            <x-generic.projects.projects-tab/>
            <div class="border rounded-b-lg border-grey border-t-0 p-8">
                <div x-cloak x-show="selectedTab === 'portfolio'" role="tabpanel">
                    <x-admin.students.tabpannel title="Portfolio" />
                </div>
                <div x-cloak x-show="selectedTab === 'reproduction'" role="tabpanel">
                    <x-admin.students.tabpannel title="Site reproduction" />
                </div>
                <div x-cloak x-show="selectedTab === 'vm'" role="tabpanel">
                    <x-admin.students.tabpannel title="Le Vieux Moulin" />
                </div>
            </div>
        </div>
    </section>
</x-layouts.admin>
