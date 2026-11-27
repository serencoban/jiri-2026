@props([
    'id',
    'firstname',
    'lastname',
    'email',
    'image',
])

<div class="relative flex items-center gap-4 p-5 mb-4 bg-white border border-neutral-200 rounded-2xl transition hover:border-neutral-300 hover:shadow-sm md:table-row md:p-0 md:mb-0 md:border-0 md:rounded-none md:shadow-none">
    <div class="shrink-0 md:table-cell md:px-6 md:py-4 md:border-b md:border-neutral-100 md:align-middle">
        <img class="w-14 h-14 rounded-full object-cover md:w-10 md:h-10 md:mx-auto" src="{{ asset('storage/cat1.jpg') }}" alt="Photo de {{ $firstname }} {{ $lastname }}">
    </div>
    <div class="min-w-0 flex-1 md:table-cell md:px-6 md:py-4 md:text-center md:border-b md:border-neutral-100 md:align-middle">
        <div class="flex items-center gap-1 md:block">
            <span class="font-semibold text-lg md:text-base md:font-normal">{{ $firstname }}</span>
            <span class="font-semibold text-lg md:hidden">{{ $lastname }}</span>
        </div>
        <span class="block text-sm text-text-light truncate md:hidden">{{ $email }}</span>
    </div>


    <div class="hidden md:table-cell md:px-6 md:py-4 md:text-center md:border-b md:border-neutral-100 md:align-middle">
        {{ $lastname }}
    </div>

    <div class="hidden md:table-cell md:px-6 md:py-4 md:text-center md:border-b md:border-neutral-100 md:align-middle">
        {{ $email }}
    </div>

    <div class="absolute top-4 right-4 md:static md:table-cell md:px-6 md:py-4 md:text-center md:border-b md:border-neutral-100 md:align-middle" @click.stop>
        <livewire:generic.btn.actions
            type="contact"
            :id="$id"
        />
    </div>
</div>
