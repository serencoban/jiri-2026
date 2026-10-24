@props([
    'title',
    'date',
    'link',
    'link_title'
])
<div class="border border-neutral-100 rounded-lg flex flex-col p-5">
    <span class="text-xl">{{ $title }}</span>
    <time class="text-gray-400">{{ $date }}</time>
    <a href="" class="underline mt-2 hover:text-main-red" title="{{ $linkTitle }}">
        {{ $link }}
    </a>
</div>
