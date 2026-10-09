@props([
    'label',
    'items' => [],
])

<div x-data="{ isOpen: false, openedWithKeyboard: false }"
    class="relative w-fit"
     @click.stop
    x-on:keydown.esc.window="isOpen = false; openedWithKeyboard = false"
>
    <button type="button"
        class="inline-flex items-center gap-2 whitespace-nowrap rounded-lg border border-main-red px-4 py-2 text-sm font-medium text-main-red transition"
        aria-haspopup="true"
        x-on:click="isOpen = !isOpen"
        x-on:keydown.space.prevent="openedWithKeyboard = true"
        x-on:keydown.enter.prevent="openedWithKeyboard = true"
        x-on:keydown.down.prevent="openedWithKeyboard = true"
        x-bind:aria-expanded="isOpen || openedWithKeyboard"
    >
        {{ $label }}

        <svg aria-hidden="true" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
        </svg>
    </button>

    <div
        x-cloak
        x-show="isOpen || openedWithKeyboard"
        x-transition
        x-trap="openedWithKeyboard"
        x-on:click.outside="isOpen = false; openedWithKeyboard = false"
        x-on:keydown.down.prevent="$focus.wrap().next()"
        x-on:keydown.up.prevent="$focus.wrap().previous()"
        class="absolute top-11 left-0 z-20 flex justify-start min-w-48 flex-col overflow-hidden rounded-lg border border-main-red bg-light-white"
        role="menu"
    >
        @foreach($items as $item)
            <a
                href="{{ $item['href'] ?? '#' }}"
                class="px-5 py-3 text-main-red hover:bg-red-50"
                role="menuitem"
            >
                {{ $item['label'] }}
            </a>
        @endforeach
    </div>
</div>
