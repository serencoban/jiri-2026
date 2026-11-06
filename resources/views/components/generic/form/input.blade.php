@props([
    'label',
    'name',
    'type' => 'text',
    'placeholder'=>''
])

<div>
    <label for="{{ $name }}" class="block mb-1 font-medium">
        {{ $label }}
    </label>

    <input type="{{ $type }}"
           name="{{ $name }}"
           id="{{ $name }}"
           value="{{ old($name) }}"
           placeholder="{{$placeholder}}"
        {{ $attributes->except(['label', 'name', 'type']) }}
        class="w-full border border-neutral-200 rounded-md py-2 px-3"
    >

    @error($name)
    <p class="text-red-600">
        {{ $message }}
    </p>
    @enderror
</div>
