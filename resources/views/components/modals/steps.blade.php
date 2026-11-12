@props([
    'currentStep' => 1
])

@php
    $steps = [
        1 => 'Détails',
        2 => 'Évaluateurs',
        3 => 'Élèves',
        4 => 'Projets',
    ];
@endphp

<div class="flex justify-between items-center mb-8">
    <ol class="flex">
    @foreach($steps as $step => $label)
        <li class="flex flex-1 items-start">
            <div class="flex flex-col items-center">
                <div @class([
                        'w-4 h-4 rounded-full flex items-center justify-center border-2',
                        'bg-main-red border-main-red text-white' => $step < $currentStep,
                        'bg-white border-main-red text-main-red' => $step === $currentStep,
                        'bg-white border-neutral-400 text-neutral-400' => $step > $currentStep,
                    ])
                >
                </div>
                <span
                    @class([
                        'mt-2 text-sm',
                        'text-main-red' => $step <= $currentStep,
                        'text-neutral-400' => $step > $currentStep,
                    ])
                >
                    {{ $label }}
                </span>

            </div>
            @if(!$loop->last)
                <div @class([
                        'flex flex-1 px-2 items-center justify-center mt-2',
                        'text-main-red' => $step < $currentStep,
                        'text-neutral-400' => $step >= $currentStep,
                    ])
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M7 4L13 10L7 16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            @endif
        </li>
    @endforeach
</ol>
    <button @click="$wire.close()" class="block w-full cursor-pointer text-right">✕</button>
</div>
