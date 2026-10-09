@props([
    'title'
])
<div class="flex justify-between mb-4">
    <div class="flex items-center">
        <h2 class="text-2xl font-medium pr-2">Moyenne du {{$title}} :</h2>
        <span class="text-2xl">14/20</span>
    </div>
    <div class="flex gap-2 items-center" >
        <label for="order-grade">Trier par ordre</label>
        <select class="font-semibold text-sm py-3 px-4 border border-main-red rounded-lg text-main-red block mr-2" name="order-grade" id="order-grade">
            <option value="croissant">Croissant</option>
            <option value="decroissant">Decroissant</option>
        </select>
    </div>
</div>
<div class="grid grid-cols-6 gap-8">
    @for($i=0;$i<10;$i++)
        <x-admin.students.evaluated-card/>
    @endfor
</div>
