<x-layouts.admin title="Les côtes de Seren">

    <div class="pb-8">
        <div class="flex items-center gap-3">
            <h1 class="text-3xl font-semibold md:text-4xl">Les évaluateurs qui ont évalué Seren Coban</h1>
            <button type="button" @click="$dispatch('open-drawer')" class="flex h-9 w-9 items-center justify-center rounded-lg transition hover:bg-neutral-100" aria-label="Changer d'étudiant">
                <x-svg.up-down-arrow />
            </button>
        </div>
        <div class="mt-4 flex items-center gap-2">
            <span class="text-base text-text-light">Côte globale de l’élève :</span>
            <span class="text-xl font-semibold text-main-red">16/20</span>
        </div>
    </div>

    <section>
        <h2 class="sr-only">{{ __('title.students_projects') }}</h2>
        <div x-data="{ selectedTab: 'portfolio' }" class="w-full">
            <div class="overflow-x-auto">
                <x-generic.projects.projects-tab />
            </div>
            <div class="rounded-b-2xl border border-t-0 border-neutral-200 bg-white p-4 sm:p-6 lg:p-8">
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
