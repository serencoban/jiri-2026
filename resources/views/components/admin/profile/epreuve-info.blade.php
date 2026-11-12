@props([
    'title',
    'date',
    'link',
    'link_title'
])

<div
    class="group flex min-h-40 flex-col justify-between rounded-xl border border-neutral-200 bg-neutral-50 p-5 transition hover:-translate-y-1 hover:border-neutral-300 hover:bg-white hover:shadow-md"
>
    <div>
        <span class="block text-lg font-semibold">
            {{ $title }}
        </span>

        <time class="mt-1 block text-sm text-neutral-400">
            {{ $date }}
        </time>
    </div>

    <a
        href=""
        class="mt-6 text-sm font-medium underline underline-offset-4 transition hover:text-main-red"
        title="{{ $link_title }}"
    >
        {{ $link }}
    </a>
</div>
