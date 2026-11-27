@props([
    'open',
])

<div>
    <div x-cloak x-show="{{ $open }}" class="fixed inset-0 z-40 bg-black/40"></div>
    <div x-cloak x-show="{{ $open }}" class="fixed inset-0 z-50 flex items-end justify-center sm:items-center sm:p-4">
        <div
            x-show="{{ $open }}"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="translate-y-full opacity-0 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="translate-y-0 opacity-100 sm:scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="translate-y-0 opacity-100 sm:scale-100"
            x-transition:leave-end="translate-y-full opacity-0 sm:translate-y-0 sm:scale-95"
            @click.outside="$wire.close()"
            @keyup.escape.window="$wire.close()"
            class="max-h-[90vh] w-full overflow-y-auto rounded-t-2xl bg-white p-5 sm:max-w-xl sm:rounded-2xl sm:p-6"
        >
            <div class="mx-auto mb-5 h-1.5 w-12 rounded-full bg-neutral-200 sm:hidden"></div>
            {{ $slot }}
        </div>
    </div>
</div>
