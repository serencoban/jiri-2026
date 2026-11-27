@props([
    'id',
    'slug',
    'name',
    'date',
    'begins_at',
    'ends_at',
    'status' => 'upcoming',
])

<div class="relative flex flex-col gap-4 p-5 mb-4 bg-white border border-neutral-200 rounded-2xl cursor-pointer transition hover:border-neutral-300 hover:shadow-sm md:table-row md:p-0 md:mb-0 md:border-0 md:rounded-none md:shadow-none"
    x-data
    @click="window.location.href='{{ route('epreuves.show', $slug) }}'"
>

    <div class="pr-12 md:table-cell md:px-6 md:py-4 md:pr-6 md:border-b md:border-neutral-100 md:align-middle">
        <span class="text-lg font-semibold md:text-base md:font-normal">
            {{ $name }}
        </span>
    </div>


    <div class="md:table-cell md:px-6 md:py-4 md:text-center md:border-b md:border-neutral-100 md:align-middle">
        <span class="text-sm text-text-light md:text-inherit">
            {{ \Carbon\Carbon::parse($date)->format('d/m/Y') }}
        </span>
    </div>

    <div class="hidden md:table-cell md:px-6 md:py-4 md:text-center md:border-b md:border-neutral-100 md:align-middle">
        {{ \Carbon\Carbon::parse($begins_at)->format('H:i') }}
    </div>

    <div class="hidden md:table-cell md:px-6 md:py-4 md:text-center md:border-b md:border-neutral-100 md:align-middle">
        {{ \Carbon\Carbon::parse($ends_at)->format('H:i') }}
    </div>

    <div class="flex items-center justify-between md:hidden">
        <div class="flex items-center gap-2 text-sm text-text-light">
            <span>{{ \Carbon\Carbon::parse($begins_at)->format('H:i') }}</span>
            <span>-</span>
            <span>{{ \Carbon\Carbon::parse($ends_at)->format('H:i') }}</span>
        </div>

        <div @click.stop>
            <x-generic.btn.dropdown
                :label="$status"
                :items="[
                    ['label' => 'En cours'],
                    ['label' => 'À venir'],
                    ['label' => 'Terminée'],
                ]"
            />
        </div>
    </div>

    <div class="hidden md:table-cell md:px-6 md:py-4 md:text-center md:border-b md:border-neutral-100 md:align-middle" @click.stop>
        <x-generic.btn.dropdown
            :label="$status"
            :items="[
                ['label' => 'En cours'],
                ['label' => 'À venir'],
                ['label' => 'Terminée'],
            ]"
        />
    </div>

    <div class="absolute top-4 right-4 md:static md:table-cell md:px-6 md:py-4 md:text-center md:border-b md:border-neutral-100 md:align-middle" @click.stop>
        <livewire:generic.btn.actions
            type="jiri"
            :id="$id"
        />
    </div>
</div>
