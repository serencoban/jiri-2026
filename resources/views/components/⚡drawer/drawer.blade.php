<div>
    <div x-show="$wire.open"
        class="fixed top-0 bottom-0 left-0 right-0 bg-gray-800 opacity-30"
    ></div>

    <div class="drawer"
        x-show="$wire.open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"

        @click.outside="$wire.close()"
        @keyup.escape.window="$wire.close()"

    >

        <button @click="$wire.close()" class="block w-full cursor-pointer text-right">✕</button>

        @if($form)
            <livewire:dynamic-component
                :is="$form"
                :id="$id"
            />
        @endif

    </div>
</div>
