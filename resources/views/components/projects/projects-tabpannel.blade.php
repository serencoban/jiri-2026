@props([
    'title',
])

<div class="grid gap-8 grid-cols-3">
    <div class="col-span-2">
        <h3 class="text-3xl font-medium">{{$title}}</h3>
        <p class="text-text-light pb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla blandit tellus leo, sit amet bibendum nulla rutrum eget. Morbi pulvinar justo et magna</p>
        <div class="flex gap-4 pb-8">
            <a href="#" class="btn-sec">Lien vers le projet</a>
            <a href="#" class="btn-sec">Lien vers le cahier de charge</a>
            <a href="#" class="btn-sec">Lien vers le repo</a>
        </div>
        <label class="block font-medium text-xl pb-3" for="comment">Commentaire</label>
        <textarea class="rounded-lg border border-grey w-full p-3 bg-light-white" placeholder="Un gentil commentaire..." name="comment" id="comment" cols="30" rows="10"></textarea>
    </div>
    <div class="col-span-1 border border-grey rounded-lg p-8 flex flex-col justify-between">
        <div>
            <div class="flex gap-4 items-center pb-4">
                <span>L'évaluation d'Andrew Garfield</span>
                <button type="button" @click="$dispatch('open-drawer', {form: 'evaluators.list'})" class="cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="none">
                        <path d="M8 0.5H26C30.1421 0.5 33.5 3.85786 33.5 8V26C33.5 30.1421 30.1421 33.5 26 33.5H8C3.85786 33.5 0.5 30.1421 0.5 26V8C0.5 3.85786 3.85786 0.5 8 0.5Z" fill="#FAFAFA" stroke="#CF4345"/>
                        <path d="M12.0024 20L21.5949 20L16.7987 25.4814L12.0024 20ZM11.2499 20.6585L16.0461 26.1399C16.4445 26.5952 17.1528 26.5952 17.5512 26.1399L22.3475 20.6585C22.9132 20.0119 22.4541 19 21.5949 19H12.0024C11.1433 19 10.6841 20.0119 11.2499 20.6585Z" fill="#CF4345"/>
                        <path d="M21.5947 14.4814L12.0023 14.4814L16.7985 8.99998L21.5947 14.4814ZM22.3473 13.8229L17.5511 8.34147C17.1527 7.88614 16.4443 7.88614 16.0459 8.34147L11.2497 13.8229C10.6839 14.4695 11.1431 15.4814 12.0023 15.4814L21.5947 15.4814C22.4539 15.4814 22.9131 14.4695 22.3473 13.8229Z" fill="#CF4345"/>
                    </svg>
                </button>
            </div>
            <span class="">Côte du Portfolio</span>
            <span>12/20</span>
        </div>
        <a class="btn-main" href="#">Supprimer l'épreuve</a>
    </div>
</div>
