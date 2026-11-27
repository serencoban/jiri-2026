@props([
    'contacts'
])

<div class="md:table-row-group">
    @forelse ($contacts as $contact)
        <x-generic.table.contact-row
            :id="$contact->id"
            :firstname="$contact->firstname"
            :lastname="$contact->lastname"
            :email="$contact->email"
            :image="$contact->image"
        />
    @empty
        <div class="p-8 text-center border border-neutral-200 rounded-2xl md:table-row">
            <p class="text-text-light">Aucun contact trouvé.</p>
        </div>
    @endforelse
</div>
