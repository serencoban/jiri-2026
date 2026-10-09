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
        <textarea class="rounded-lg border border-grey w-full p-3 bg-light-white" placeholder="Un gentil commentaire..." name="comment" id="comment" cols="20" rows="7"></textarea>
    </div>
    <div class="col-span-1 flex flex-col gap-4">
        <div class="border border-grey rounded-lg p-8">
            <label for="cote-projet">Côte du projet : <span class="font-semibold">{{$title}}</span></label>
            <input class="btn-search text-xl font-medium mt-2" type="number" name="cote-projet" id="cote-projet" placeholder="12">
        </div>
            <form class="flex flex-col gap-4 border border-grey rounded-lg p-8" action="" method="POST">
                <div class="flex">
                <div class="flex items-center h-5">
                    <input id="save-draft-radio" type="radio" name="save-option" value="draft" class="w-4 h-4 accent-main-red cursor-pointer">
                </div>
                <div class="ms-2 text-sm select-none">
                    <label for="save-draft-radio" class="font-medium mb-1 cursor-pointer">Sauvegarder en privé</label>
                    <p id="save-draft-text" class="text-xs font-normal text-text-light">Enregistrer vos points sans les envoyer aux professeurs</p>
                </div>
            </div>
                <div class="flex">
                <div class="flex items-center h-5">
                    <input id="save-send-radio" type="radio" name="save-option" value="submitted" class="w-4 h-4 accent-main-red cursor-pointer">
                </div>
                <div class="ms-2 text-sm select-none">
                    <label for="save-send-radio" class="font-medium mb-1 cursor-pointer">Sauvegarder et envoyer</label>
                    <p id="save-send-text" class="text-xs font-normal text-text-light">Enregistrer vos points et les envoyer aux professeurs</p>
                </div>
            </div>
                <button class="btn-main mt-8" type="submit">Sauvegarder</button>
            </form>
    </div>
</div>
