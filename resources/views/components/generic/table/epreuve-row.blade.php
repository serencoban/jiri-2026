@props([
    'id',
    'name',
    'date',
    'begins_at',
    'ends_at',
    'status' => 'upcoming',
])

<div class="table-row border-b border-b-gray-200 hover:bg-gray-50 cursor-pointer" x-data @click="window.location.href='{{ route('epreuves.show', $id) }}'">
    <x-generic.table.cell>{{ $name }}</x-generic.table.cell>
    <x-generic.table.cell>{{ $date }}</x-generic.table.cell>
    <x-generic.table.cell>{{ \Carbon\Carbon::parse($begins_at)->format('H:i') }}</x-generic.table.cell>
    <x-generic.table.cell>{{ \Carbon\Carbon::parse($ends_at)->format('H:i') }}</x-generic.table.cell>
    <x-generic.table.cell>
        <x-generic.btn.dropdown
            :label="$status"
            :items="[
                ['label' => 'En cours'],
                ['label' => 'À venir'],
                ['label' => 'Terminée'],
            ]"
        />
    </x-generic.table.cell>
    <x-generic.table.cell>
        <button type="button" class="cursor-pointer" @click.stop>
            <x-svg.actions/>
        </button>
    </x-generic.table.cell>
</div>
