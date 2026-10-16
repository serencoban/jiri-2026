@props([
    'label',
    'name',
    'type' => 'text',
])

<div>
    <label for="{{ $name }}" class="block mb-1">
        {{ $label }}
    </label>

    <input type="{{ $type }}"
           name="{{ $name }}"
           id="{{ $name }}"
           value="{{ old($name) }}"
        {{ $attributes->except(['label', 'name', 'type']) }}
        class="border border-neutral-200 rounded-md"
    >

    @error($name)
    <p class="text-red-600">
        {{ $message }}
    </p>
    @enderror
</div>
