@props([
    'info',
    'info_details',
])

<div class="flex items-center justify-between border-b border-neutral-200 py-4 last:border-b-0">
    <span class="text-sm text-neutral-500">
        {{ $info }}
    </span>

    <span class="text-sm font-medium text-neutral-900">
        {{ $info_details }}
    </span>
</div>
