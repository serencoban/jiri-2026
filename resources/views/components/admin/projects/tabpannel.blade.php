@props([
    'title',
])

<div class="grid grid-cols-1 gap-6 lg:grid-cols-3 lg:gap-8">
    <div class="lg:col-span-2">
        <h3 class="text-2xl font-semibold md:text-3xl">{{ $title }}</h3>
        <p class="mt-2 text-sm leading-6 text-text-light md:text-base">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla blandit tellus leo, sit amet bibendum nulla rutrum eget.</p>

        <div class="mt-6 flex flex-wrap gap-3">
            <a href="#" class="btn-sec">Lien vers le projet</a>
            <a href="#" class="btn-sec">Cahier des charges</a>
            <a href="#" class="btn-sec">Repo</a>
        </div>

        <div class="mt-8">
            <label class="mb-3 block text-lg font-medium" for="comment">Commentaire</label>
            <textarea class="w-full rounded-xl border border-neutral-200 bg-light-white p-4 outline-none transition focus:ring-2 focus:ring-main-red/10" placeholder="Un gentil commentaire..." name="comment" id="comment" rows="6"></textarea>
        </div>
    </div>

    <aside class="flex h-full flex-col justify-between rounded-2xl border border-neutral-200 bg-white p-5 lg:col-span-1 lg:p-6">
        <div>
            <div class="flex items-start justify-between gap-4">
                <div>
                    <span class="block text-sm text-text-light">Évaluateur</span>
                    <span class="mt-1 block text-lg font-semibold">Andrew Garfield</span>
                </div>
                <button type="button" @click="$dispatch('open-drawer', { form: 'evaluators.students.list' })" class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg transition hover:bg-neutral-100" aria-label="Changer d'évaluateur">
                    <x-svg.up-down-arrow />
                </button>
            </div>
            <div class="mt-8">
                <span class="block text-sm text-text-light">Côte du {{ $title }}</span>
                <span class="mt-1 block text-3xl font-semibold text-main-red">12/20</span>
            </div>
        </div>
            <a href="#" class="btn-main">Supprimer le projet</a>
    </aside>
</div>
