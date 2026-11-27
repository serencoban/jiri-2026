@props([
    'title' => config('app.name'),
])

    <!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="text-text-black">
<div x-data="{ menuOpen: false }" class="min-h-screen">

    <aside class="hidden md:block fixed top-0 left-0 z-40 w-64 h-full bg-white">
        <div class="flex flex-col justify-between h-full px-3 py-4 overflow-y-auto border-r border-zinc-200">
            <div>
                <a class="block mx-auto" href="{{ route('epreuves') }}">
                    <img class="mx-auto mb-4" src="{{ asset('storage/jiri-logo.svg') }}" alt="Logo Jiri">
                </a>
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="{{ route('epreuves') }}" class="flex items-center px-2 py-3 rounded-base transition hover:text-main-red hover:bg-neutral-tertiary">
                            <x-svg.epreuve />
                            <span class="ms-3">Épreuves</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contacts') }}" class="flex items-center px-2 py-3 rounded-base transition hover:text-main-red hover:bg-neutral-tertiary">
                            <x-svg.contacts />
                            <span class="ms-3">Contacts</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('projects') }}" class="flex items-center px-2 py-3 rounded-base transition hover:text-main-red hover:bg-neutral-tertiary">
                            <x-svg.projects />
                            <span class="ms-3">Projets</span>
                        </a>
                    </li>

                    <li class="mt-10">
                        <a class="text-sm text-grey hover:text-main-red" href="{{ route('evaluators') }}">
                            POV Évaluateur
                        </a>
                    </li>
                </ul>
            </div>

            <a href="{{ route('profile') }}" class="flex items-center gap-4 hover:text-main-red">
                <x-svg.profile />
                <span class="font-medium text-sm">{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</span>
            </a>
        </div>
    </aside>

    <header class="md:hidden flex items-center px-6 pt-8 pb-4 bg-white">
        <button type="button" @click="menuOpen = true" aria-label="Ouvrir le menu" class="cursor-pointer">
            <x-svg.mobile-menu class="w-10 h-10" />
        </button>
    </header>

    <div x-cloak x-show="menuOpen" x-transition.opacity @click="menuOpen = false" class="md:hidden fixed inset-0 z-40 bg-black/40"></div>

    <aside x-cloak x-show="menuOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" @keyup.escape.window="menuOpen = false" class="md:hidden fixed top-0 left-0 z-50 w-72 max-w-[85vw] h-full bg-white border-r border-zinc-200 shadow-xl">
        <div class="flex flex-col justify-between h-full px-5 py-6">
            <div>
                <div class="flex items-center justify-between mb-8">
                    <a href="{{ route('epreuves') }}">
                        <img src="{{ asset('storage/jiri-logo.svg') }}" alt="Logo Jiri" class="h-10">
                    </a>
                    <button type="button" @click="menuOpen = false" aria-label="Fermer le menu" class="text-3xl leading-none cursor-pointer">×</button>
                </div>
                <nav>
                    <ul class="space-y-2 font-medium">
                        <li>
                            <a href="{{ route('epreuves') }}" class="flex items-center gap-3 px-3 py-3 rounded-lg hover:bg-light-white hover:text-main-red">
                                <x-svg.epreuve />
                                <span>Épreuves</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('contacts') }}" class="flex items-center gap-3 px-3 py-3 rounded-lg hover:bg-light-white hover:text-main-red">
                                <x-svg.contacts />
                                <span>Contacts</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('projects') }}" class="flex items-center gap-3 px-3 py-3 rounded-lg hover:bg-light-white hover:text-main-red">
                                <x-svg.projects />
                                <span>Projets</span>
                            </a>
                        </li>

                        <li class="pt-8">
                            <a href="{{ route('evaluators') }}" class="text-sm text-grey">
                                POV Évaluateur
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <a href="{{ route('profile') }}" class="flex items-center gap-4 py-3 hover:text-main-red">
                <x-svg.profile />
                <span class="font-medium text-sm">
                    {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}
                </span>
            </a>
        </div>
    </aside>

    <main class="px-6 pb-8 md:p-8 md:ml-64">
        {{ $slot }}
    </main>

</div>
<livewire:generic.drawer />
@livewireScripts
</body>
</html>
