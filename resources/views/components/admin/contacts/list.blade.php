@props([
    'contacts'
])

<div class="table-row-group">
    @foreach($contacts as $contact)
        <x-generic.table.contact-row
            :id="$contact->id"
            :firstname="$contact->firstname"
            :lastname="$contact->lastname"
            :email="$contact->email"
            :image="$contact->image"
        />
    @endforeach
</div>
