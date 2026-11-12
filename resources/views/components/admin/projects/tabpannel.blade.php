@props([
    'title',
])

<div class="grid gap-8 grid-cols-3">
    <div class="col-span-2">
        <h3 class="text-3xl font-medium pb-2">{{$title}}</h3>
        <p class="text-text-light pb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla blandit tellus leo, sit amet bibendum nulla rutrum eget. Morbi pulvinar justo et magna</p>
        <div class="flex gap-4 pb-8">
            <a href="#" class="btn-sec">Lien vers le projet</a>
            <a href="#" class="btn-sec">Lien vers le cahier de charge</a>
            <a href="#" class="btn-sec">Lien vers le repo</a>
        </div>
        <label class="block font-medium text-xl pb-3" for="comment">Commentaire</label>
        <textarea class="rounded-lg border border-grey w-full p-3 bg-light-white" placeholder="Un gentil commentaire..." name="comment" id="comment" cols="30" rows="6"></textarea>
    </div>
    <div class="col-span-1 border border-grey rounded-lg p-8 flex flex-col justify-between">
        <div>
            <div class="flex justify-between items-center pb-4">
                <span class="font-medium">L'évaluation d'Andrew Garfield</span>
                <button type="button" @click="$dispatch('open-drawer', {form: 'evaluators.students.list'})" class="cursor-pointer">
                <x-svg.up-down-arrow/>
                </button>
            </div>
            <div class="flex justify-between mt-4 text-xl">
                <span class="">Côte du Portfolio</span>
                <span>12/20</span>
            </div>
        </div>
        <a class="btn-main" href="#">Supprimer l'épreuve</a>
    </div>
</div>
