<x-layouts.auth title="S'enregistrer">
    <div class="bg-[url('/storage/app/public/auth-bg.png')] bg-cover bg-no-repeat col-span-7 flex items-center">
        <div class="text-white flex flex-col gap-4 items-start p-16">
            <x-svg.double-pencil/>
            <h1 class="text-5xl font-medium">{{__('auth.title_register')}}</h1>
            <p>{{__('auth.desc_register')}}</p>
        </div>
    </div>
    <div class="col-span-5 p-36 content-center">
        <x-generic.form.container
            action="{{ route('register') }}"
            method="POST"
            btn="Se créer un compte"
        >
            <x-generic.form.input
                label="Nom"
                name="name"
                placeholder="ex : Doe"
            />

            <x-generic.form.input
                label="Prénom"
                name="prenom"
                placeholder="ex : Jane"
            />

            <x-generic.form.input
                label="Email"
                name="email"
                type="email"
                placeholder="ex : nom@xyz.com"
            />

            <x-generic.form.input
                label="Mot de passe"
                name="password"
                type="password"
                placeholder="Au moins 8 caractères"

            />

            <x-generic.form.input
                label="Confirmer le mot de passe"
                name="password_confirmation"
                type="password"
                placeholder="Au moins 8 caractères"

            />
        </x-generic.form.container>
        <a class="btn-sec w-full mt-4 text-center" href="{{route('login')}}">Déjà un compte ? Se connecter</a>
    </div>
</x-layouts.auth>
