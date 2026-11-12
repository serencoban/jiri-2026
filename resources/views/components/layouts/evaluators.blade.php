@props(['title'])
    <!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    @livewireStyles
    @vite(['resources/css/app.css' , 'resources/js/app.js'])
</head>
<body class="text-text-black">
<div>
    <aside class="fixed top-0 left-0 z-40 w-64 h-full">
        <div class="flex flex-col justify-between h-full px-3 py-4 overflow-y-auto border border-zinc-200 ">
            <div>
                <a class="mx-auto" href="#">
                    <img class="mx-auto mb-4"  src="{{ asset('storage/jiri-logo.svg') }}" alt="Logo Jiri">
                </a>
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="{{route('evaluators')}}" class="flex items-center px-2 py-3 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand group">
                            <x-svg.epreuve/>
                            <span class="ms-3">Epreuve 27</span>
                        </a>
                    </li>
                    <li class="mt-10">
                        <a class="text-sm text-grey" href="{{route('epreuves')}}">POV Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </aside>
    <main class="p-8 ml-64">
        {{$slot}}
    </main>
</div>
<livewire:generic.drawer />
@livewireScripts
</body>
</html>
