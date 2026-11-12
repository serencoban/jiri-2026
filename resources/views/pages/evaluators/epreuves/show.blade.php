<x-layouts.evaluators title="La fiche de cotation de Seren">
    <div class="flex justify-between pb-4">
        <div class="flex gap-4 items-center">
            <h1 class="text-4xl font-medium">Evaluation de Seren Coban</h1>
            <button type="button" @click="$dispatch('open-drawer', {form: 'students.list'})" class="cursor-pointer">
                <x-svg.up-down-arrow/>
            </button>
        </div>
    </div>
    <section class="pt-8">
        <h2 class="sr-only">Les projet de Seren</h2>
        <div x-data="{ selectedTab: 'portfolio' }" class="w-full">
            <x-generic.projects.projects-tab/>
            <div class="border rounded-b-lg border-grey border-t-0 p-8">
                <div  x-cloak x-show="selectedTab === 'portfolio'" role="tabpanel">
                    <x-evaluators.projects.tabpannel title="Portfolio"/>
                </div>

                <div x-cloak x-show="selectedTab === 'reproduction'" role="tabpanel">
                    <x-evaluators.projects.tabpannel title="Site reproduction"/>
                </div>

                <div x-cloak x-show="selectedTab === 'vm'" role="tabpanel">
                    <x-evaluators.projects.tabpannel title="Le Vieux Moulin"/>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-8 border rounded-lg border-grey p-8 grid grid-cols-[1fr_2fr] gap-8">
        <div>
            <label for="cote-global" class="text-3xl font-medium pb-2">Cote globale</label>
            <p class="text-text-light text-sm pt-2">Un texte explicatif</p>
            <input class="btn-search mt-4" type="number" name=cote-global"" id="cote-global" placeholder="14">
        </div>
        <div>
            <label class="block font-medium text-xl pb-3" for="comment">Commentaire</label>
            <textarea class="rounded-lg border border-grey w-full p-3 bg-light-white" placeholder="Un gentil commentaire..." name="comment" id="comment" cols="30" rows="10"></textarea>
        </div>
    </section>
</x-layouts.evaluators>
