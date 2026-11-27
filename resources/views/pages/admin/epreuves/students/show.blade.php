<x-layouts.admin title="Les projets de Seren">
    <div class="pb-8">
        <div class="flex flex-col gap-4 md:flex-row md:items-start md:justify-between">
            <div>
                <div class="flex items-center gap-3">
                    <h1 class="text-3xl font-semibold md:text-4xl">{{ __('title.student_evaluation') }}</h1>
                    <div x-data>
                        <button type="button" @click="$dispatch('open-drawer', { form: 'evaluators.students.list' })" class="flex h-9 w-9 items-center justify-center rounded-lg transition hover:bg-neutral-100" aria-label="Changer d'élève">
                            <x-svg.up-down-arrow />
                        </button>
                    </div>
                </div>

                <div class="mt-4 flex items-center gap-2">
                    <span class="text-base text-text-light">Côte globale de l'élève :</span>
                    <span class="text-xl font-semibold text-main-red">14/20</span>
                </div>
            </div>
            <a href="#" class="btn-main shrink-0">{{ __('actions.add_project') }}</a>
        </div>
    </div>

    <section>
        <h2 class="sr-only">{{ __('title.students_projects') }}</h2>
        <div x-data="{ selectedTab: 'portfolio' }" class="w-full">
            <x-generic.projects.projects-tab />
            <div class="rounded-b-2xl border border-t-0 border-neutral-200 bg-white p-4 sm:p-6 lg:p-8">
                <div x-cloak x-show="selectedTab === 'portfolio'" role="tabpanel">
                    <x-admin.projects.tabpannel title="Portfolio" />
                </div>

                <div x-cloak x-show="selectedTab === 'reproduction'" role="tabpanel">
                    <x-admin.projects.tabpannel title="Site reproduction" />
                </div>

                <div x-cloak x-show="selectedTab === 'vm'" role="tabpanel">
                    <x-admin.projects.tabpannel title="Le Vieux Moulin" />
                </div>
            </div>
        </div>
    </section>
</x-layouts.admin>
