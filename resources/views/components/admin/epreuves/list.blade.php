@props([
    'jiris'
])

<div class="table-row-group">
    @foreach($jiris as $jiri)
        <x-generic.table.epreuve-row
            :id="$jiri->id"
            :name="$jiri->name"
            :date="$jiri->date"
            :begins_at="$jiri->begins_at"
            :ends_at="$jiri->ends_at"
            :status="$jiri->status"
        />
    @endforeach
</div>
