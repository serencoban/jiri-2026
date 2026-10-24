<x-layouts.admin>
 <div class="grid grid-cols-12 h-screen gap-8">
     <h1 class="sr-only">Page de profile</h1>
     <section class="flex justify-between flex-col col-span-4 border border-neutral-100 rounded-lg p-8">
        <h2 class="sr-only">Details de Dominique Vilain</h2>
        <div>
            <div class="flex justify-center">
                <div class="relative mb-10">
                    <div class="h-40 w-40  bg-red-50 rounded-full">
                        <img src="" alt="">
                    </div>
                    <div class="absolute h-10 w-10 bottom-0 left-25 bg-red-200 rounded-full"></div>
                </div>
            </div>

            <x-admin.profile.user-info
                info="Nom"
                info_details="Dominique Vilain"
            />
            <x-admin.profile.user-info
                info="Email"
                info_details="dom@v.com"
            />
            <x-admin.profile.user-info
                info="Compte crée le"
                info_details="11/07/2019"
            />
            <x-admin.profile.user-info
                info="Langue"
                info_details="Français"
            />
        </div>

        <form action="{{route('logout')}}" method="POST">
            @csrf
            <button class="btn-main block" type="submit">Se déconnecter</button>
        </form>
    </section>
     <section class="col-span-8 border border-neutral-100 rounded-lg p-8">
         <h2 class="sr-only">Informations supplémentaires</h2>
         <div class="pb-8">
             <h3 class="text-2xl mb-4 font-medium">Les épreuves les plus récentes</h3>
             <div class="grid grid-cols-3 gap-5">
                 <x-admin.profile.epreuve-info
                     title="Epreuve 27"
                     date="11/09/2027"
                     link="Récapitulatif"
                     link_title="Aller vers le récapitulatif"
                 />

                 <x-admin.profile.epreuve-info
                     title="Epreuve 27"
                     date="11/09/2027"
                     link="Récapitulatif"
                     link_title="Aller vers le récapitulatif"
                 />

                 <x-admin.profile.epreuve-info
                     title="Epreuve 27"
                     date="11/09/2027"
                     link="Récapitulatif"
                     link_title="Aller vers le récapitulatif"
                 />
             </div>
         </div>
         <div>
             <h3 class="text-2xl mb-4 font-medium">Les épreuves à venir</h3>
             <div class="grid grid-cols-3 gap-5">
                 <x-admin.profile.epreuve-info
                     title="Epreuve 27"
                     date="11/09/2027"
                     link="Modifier l'épreuve"
                     link_title="Aller vers le récapitulatif"
                 />

                 <x-admin.profile.epreuve-info
                     title="Epreuve 27"
                     date="11/09/2027"
                     link="Récapitulatif"
                     link_title="Aller vers le récapitulatif"
                 />

                 <x-admin.profile.epreuve-info
                     title="Epreuve 27"
                     date="11/09/2027"
                     link="Récapitulatif"
                     link_title="Aller vers le récapitulatif"
                 />
             </div>
         </div>
     </section>
 </div>
</x-layouts.admin>
