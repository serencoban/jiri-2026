@props([
    'firstname',
    'lastname',
    'email',
    'image',
])

<div
    {{ $attributes->merge(['class' => 'table-row border-b border-b-gray-200 hover:bg-gray-50']) }}
>
    <div class="table-cell px-6 py-4 border-b border-b-gray-100">
        <img
            class="w-10 h-10 rounded-full mx-auto"
            src="{{asset('storage/cat1.jpg') }}"
            alt="Photo de {{ $firstname }} {{ $lastname }}"
        >
    </div>

    <div class="table-cell px-6 py-4 text-center border-b border-b-gray-100 align-middle">
        {{ $firstname }}
    </div>

    <div class="table-cell px-6 py-4 text-center border-b border-b-gray-100 align-middle">
        {{ $lastname }}
    </div>

    <div class="table-cell px-6 py-4 text-center border-b border-b-gray-100 align-middle">
        {{ $email }}
    </div>

    <div class="table-cell px-6 py-4 text-center border-b border-b-gray-100 align-middle">
        <button class="cursor-pointer">
            <x-svg.actions/>
        </button>
    </div>
</div>
