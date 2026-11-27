<div class="w-full">
    <label for="search" class="sr-only">{{ __('actions.search') }}</label>

    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none opacity-40">
            <x-svg.search />
        </div>

        <input
            {{ $attributes }}
            type="search"
            id="search"
            class="block w-full py-3 pl-12 pr-4 text-sm bg-white border border-neutral-200 rounded-xl outline-none transition placeholder:text-neutral-400 focus:border-main-red focus:ring-2 focus:ring-main-red/10"
            placeholder="Rechercher une épreuve..."
        />
    </div>
</div>
