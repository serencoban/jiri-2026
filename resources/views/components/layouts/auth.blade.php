@props([
    'title',

    ])
    <!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    @livewireStyles
    @vite(['resources/css/app.css' , 'resources/js/app.js'])
</head>
<body class="text-text-black">
<main class="h-screen grid grid-cols-12">
    {{$slot}}
</main>
<livewire:generic.drawer/>
@livewireScripts
</body>
</html>


