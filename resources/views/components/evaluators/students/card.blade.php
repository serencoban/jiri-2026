@props([
    'status' => 'not_started',
])

<a href="{{ route('evaluators.show') }}">
    <div class="relative flex flex-col items-center border border-grey rounded-lg p-4 cursor-pointer hover:bg-light-white transition">
        <div class="absolute top-3 right-3">
            @if($status === 'not_started')
                <div class="w-6 h-6 rounded-full border border-text-light"></div>

            @elseif($status === 'draft')
                <div class="w-6 h-6 rounded-full border border-main-red flex items-center justify-center text-main-red">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="14" viewBox="0 0 12 14" fill="none">
                        <path d="M0 0.5C0 0.223858 0.223858 0 0.5 0H11.5C11.7761 0 12 0.223858 12 0.5C12 0.776142 11.7761 1 11.5 1H10.5V2C10.5 3.7901 9.45472 5.33509 7.94345 6.05972C7.65355 6.19872 7.5 6.43685 7.5 6.64919V7.35083C7.5 7.56317 7.65355 7.8013 7.94345 7.9403C9.45472 8.66493 10.5 10.2099 10.5 12V13L11.5 13C11.7761 13 12 13.2239 12 13.5C12 13.7761 11.7761 14 11.5 14L0.5 14C0.223858 14 0 13.7762 0 13.5C0 13.2239 0.223858 13 0.5 13H1.5V12C1.5 10.2099 2.54528 8.66493 4.05655 7.9403C4.34645 7.8013 4.5 7.56317 4.5 7.35083V6.64919C4.5 6.43685 4.34645 6.19872 4.05655 6.05972C2.54528 5.33509 1.5 3.7901 1.5 2V1H0.5C0.223858 1 0 0.776142 0 0.5ZM2.5 1V2C2.5 3.39097 3.31139 4.59342 4.4889 5.15802C5.02187 5.41357 5.5 5.94896 5.5 6.64919V7.35083C5.5 8.05106 5.02187 8.58646 4.4889 8.842C3.31139 9.40661 2.5 10.609 2.5 12V13H9.5V12C9.5 10.609 8.68861 9.40661 7.5111 8.842C6.97813 8.58646 6.5 8.05106 6.5 7.35083V6.64919C6.5 5.94896 6.97813 5.41357 7.5111 5.15802C8.68861 4.59342 9.5 3.39097 9.5 2V1H2.5Z" fill="#CF4345"/>
                    </svg>
                </div>

            @elseif($status === 'submitted')
                <div class="w-6 h-6 rounded-full bg-main-red flex items-center justify-center text-white text-sm">
                    ✓
                </div>
            @endif
        </div>

        <img class="mb-2 w-16 h-16 rounded-full" src="{{ asset('storage/cat1.jpg') }}" alt="Photo de l'élève">
        <span class="text-xl font-medium">Coban Seren</span>
        <span>6/10 évaluateurs</span>
    </div>
</a>
