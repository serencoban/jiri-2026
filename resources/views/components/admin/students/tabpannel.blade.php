@props([
    'title'
])

<div>
    <div class="flex flex-col gap-4 mb-6 md:flex-row md:items-center md:justify-between">
        <div>
            <h2 class="text-xl font-semibold md:text-2xl">{{ $title }}</h2>
            <div class="mt-1 flex items-center gap-2">
                <span class="text-sm text-text-light">Moyenne du projet</span>
                <span class="text-lg font-semibold text-main-red">14/20</span>
            </div>
        </div>

        <div class="w-full sm:w-auto">
            <x-generic.btn.dropdown
                label="Trier par ordre"
                :items="[
                    ['label' => 'Croissant'],
                    ['label' => 'Décroissant'],
                ]"
            />
        </div>
    </div>

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5">
        @for ($i = 0; $i < 10; $i++)
            <x-admin.students.evaluated-card />
        @endfor
    </div>
</div>
