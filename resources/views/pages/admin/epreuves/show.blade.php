<x-layouts.admin>
    <div class="flex justify-between pb-20">
        <h1 class="text-5xl ">Bienvenue sur l'épreuve x</h1>
        <button class="btn-main">Clôturée l'épreuve</button>
    </div>
    <section class="pb-20">
        <div class="flex justify-between">
            <h2 class="text-3xl font-medium">Liste des élèves</h2>
            <div class="flex pb-4">
                <x-table-filter.search-input/>
                <a href="#" class="btn-main">Ajouter un élève</a>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-8">
            @for($i = 0; $i < 10; $i++)
                <x-student-card/>
            @endfor
        </div>
    </section>
    <section class="pb-20">
        <div class="flex justify-between">
            <h2 class="text-3xl font-medium">Liste des évaluateurs</h2>
            <div class="flex pb-4">
                <x-table-filter.search-input/>
                <a href="#" class="btn-main">Ajouter un évaluateur</a>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-8">
            @for($i = 0; $i < 10; $i++)
                <x-student-card/>
            @endfor
        </div>
    </section>
    <section class="pb-20">
        <div class="flex justify-between">
            <h2 class="text-3xl font-medium">Liste des projets</h2>
            <div class="flex pb-4">
                <x-table-filter.search-input/>
                <a href="#" class="btn-main">Ajouter un projet</a>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-8">
            @for($i = 0; $i < 4; $i++)
            <x-card-project/>

            @endfor
        </div>
    </section>
</x-layouts.admin>
