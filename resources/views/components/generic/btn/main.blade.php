@props([
    'title',
    'type' => 'button',
])

<button type="{{ $type }}" {{ $attributes->merge(['class' => 'btn-main']) }}>
    {{ $title }}
</button>
