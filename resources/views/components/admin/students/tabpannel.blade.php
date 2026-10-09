@props([
    'title'
])
<div class="flex justify-between mb-4">
    <div class="flex items-center">
        <h2 class="text-2xl font-medium pr-2">Moyenne du {{$title}} :</h2>
        <span class="text-2xl">14/20</span>
    </div>
    <div class="flex gap-2 items-center" >
        <x-generic.btn.dropdown
            label="Trier par ordre"
            :items="[
              ['label' => 'Croissant'],
              ['label' => 'Décroissant'],
            ]"
        />
    </div>
</div>
<div class="grid grid-cols-6 gap-8">
    @for($i=0;$i<10;$i++)
        <x-admin.students.evaluated-card/>
    @endfor
</div>
