@props([
    'btn' => 'Envoyer',
])

<form {{ $attributes->only(['action', 'method']) }}class="flex flex-col gap-4">
    @csrf
    {{ $slot }}
    <button type="submit" class="btn-main">
        {{ $btn }}
    </button>
</form>
