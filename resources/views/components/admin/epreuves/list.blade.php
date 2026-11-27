@props([
    'jiris'
])

<div class="md:table-row-group">
    @forelse ($jiris as $jiri)
        <x-generic.table.epreuve-row
            :id="$jiri->id"
            :slug="$jiri->slug"
            :name="$jiri->name"
            :date="$jiri->date"
            :begins_at="$jiri->begins_at"
            :ends_at="$jiri->ends_at"
            :status="$jiri->status"
        />
    @empty
        <div class="p-8 text-center border border-neutral-200 rounded-2xl md:table-row">
            <p class="text-text-light">Aucune épreuve trouvée.</p>
        </div>
    @endforelse
</div>
