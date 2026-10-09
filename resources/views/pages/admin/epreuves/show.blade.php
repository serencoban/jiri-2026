@props([
    'ponderation' =>'uncomplete'
])
<x-layouts.admin>
    <div class="flex justify-between pb-20">
        <h1 class="text-4xl font-medium">Bienvenue sur Épreuve 27</h1>
        <button class="btn-main">Clôturée l'épreuve</button>
    </div>
    <section class="pb-20">
        <div class="flex justify-between">
            <h2 class="text-3xl font-medium">Liste des élèves</h2>
            <div class="flex pb-4">
                <x-generic.table.table-filter.search-input/>
                <a href="#" class="btn-main">Ajouter un élève</a>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-8">
            @for($i = 0; $i < 10; $i++)
                <x-admin.students.card/>
            @endfor
        </div>
    </section>
    <section class="pb-20">
        <div class="flex justify-between">
            <h2 class="text-3xl font-medium">Liste des évaluateurs</h2>
            <div class="flex pb-4">
                <x-generic.table.table-filter.search-input/>
                <a href="#" class="btn-main">Ajouter un évaluateur</a>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-8">
            @for($i = 0; $i < 10; $i++)
                <x-admin.students.card/>
            @endfor
        </div>
    </section>
    <section class="pb-20">
        <div class="flex justify-between mb-2">
            <div class="flex gap-4 items-center">
                <h2 class="text-3xl font-medium">Liste des projets</h2>
                <div class="tooltip-ponderation">
                    <div x-data="{open: false, trigger: 'hover focus',}" class="relative inline-block">
                        <div x-on:mouseenter="(trigger === 'hover focus') ? open = true : null"
                              x-on:mouseleave="(trigger === 'hover focus') ? open = false : null"
                              x-on:focus="(trigger === 'hover focus') ? open = true : null"
                              x-on:blur="(trigger === 'hover focus') ? open = false : null"
                              x-on:click="(trigger === 'click') ? open = !open : null"
                        >
                            @if($ponderation === "complete")
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                    <path d="M14 26.25C7.23451 26.25 1.75 20.7655 1.75 14C1.75 7.23451 7.23451 1.75 14 1.75C20.7655 1.75 26.25 7.23451 26.25 14C26.25 20.7655 20.7655 26.25 14 26.25ZM14 28C21.732 28 28 21.732 28 14C28 6.26801 21.732 0 14 0C6.26801 0 0 6.26801 0 14C0 21.732 6.26801 28 14 28Z" fill="#15800F"/>
                    <path d="M19.1969 8.69692C19.1845 8.7093 19.1729 8.72241 19.1621 8.73618L13.0854 16.4793L9.42178 12.8156C8.90922 12.3031 8.07819 12.3031 7.56563 12.8156C7.05306 13.3282 7.05306 14.1592 7.56563 14.6718L12.1969 19.3031C12.7095 19.8156 13.5405 19.8156 14.0531 19.3031C14.0645 19.2917 14.0753 19.2796 14.0853 19.267L21.0717 10.5341C21.5656 10.0202 21.5593 9.2032 21.0531 8.69692C20.5405 8.18436 19.7095 8.18436 19.1969 8.69692Z" fill="#15800F"/>
                </svg>
                                </span>
                            @elseif($ponderation === "uncomplete")
                                <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                                    <path d="M14 26.25C7.23451 26.25 1.75 20.7655 1.75 14C1.75 7.23451 7.23451 1.75 14 1.75C20.7655 1.75 26.25 7.23451 26.25 14C26.25 20.7655 20.7655 26.25 14 26.25ZM14 28C21.732 28 28 21.732 28 14C28 6.26801 21.732 0 14 0C6.26801 0 0 6.26801 0 14C0 21.732 6.26801 28 14 28Z" fill="#CF4345"/>
                                    <path d="M12.2527 19.25C12.2527 18.2835 13.0362 17.5 14.0027 17.5C14.9692 17.5 15.7527 18.2835 15.7527 19.25C15.7527 20.2165 14.9692 21 14.0027 21C13.0362 21 12.2527 20.2165 12.2527 19.25Z" fill="#CF4345"/>
                                    <path d="M12.4241 8.74132C12.3309 7.809 13.063 7 14 7C14.937 7 15.6691 7.809 15.5759 8.74131L14.9621 14.8793C14.9126 15.3736 14.4967 15.75 14 15.75C13.5033 15.75 13.0874 15.3736 13.0379 14.8793L12.4241 8.74132Z" fill="#CF4345"/>
                                </svg>
                            </span>
                            @endif
                        </div>
                        <div x-cloak
                             x-show="open"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="opacity-0 translate-y-2"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="opacity-100 translate-y-0"
                             x-transition:leave-end="opacity-0 -translate-y-10"
                             class="absolute start-1/2 bottom-full z-10 -ms-20 flex w-80 origin-bottom flex-col items-center justify-center pb-0.5 will-change-transform"
                        >
                            @if($ponderation === "complete")
                                <div class="flex flex-col items-start rounded-lg bg-green-50 px-4 py-4 text-center text-xs font-semibold dark:bg-zinc-700">
                                    <bold class="pb-1 text-base font-bold">100%</bold>
                                    La pondération est bien complété.
                                </div>
                            @elseif($ponderation === "uncomplete")
                                <div class="flex flex-col items-start rounded-lg bg-red-100 px-4 py-4 text-center text-xs font-semibold dark:bg-zinc-700">
                                    <bold class="pb-1 text-base font-bold">90%</bold>
                                    La pondération n'est toujours pas complète.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex pb-4">
                <x-generic.table.table-filter.search-input/>
                <a href="#" class="btn-main">Ajouter un projet</a>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-8">
            @for($i = 0; $i < 4; $i++)
            <x-generic.projects.card-project/>

            @endfor
        </div>
    </section>
</x-layouts.admin>
