<x-layouts.auth>
    <div class="bg-[url('/storage/app/public/auth-bg.png')] bg-cover bg-no-repeat col-span-7 flex items-center">
        <div class="text-white flex flex-col gap-4 items-start p-16">
            <x-icons.double-pencil/>
            <h1 class="text-5xl font-medium">{{__('auth.title_register')}}</h1>
            <p>{{__('auth.desc_register')}}</p>
        </div>
    </div>
    <div class="col-span-5 p-36 content-center">
        <x-generic.form.container
            action="{{ route('login') }}"
            method="POST"
            btn="Se créer un compte"
        >
            <x-generic.form.input
                label="Nom"
                name="name"
                placeholder="Votre nom"
            />

            <x-generic.form.input
                label="Email"
                name="email"
                type="email"
                placeholder="Votre email"
            />

            <x-generic.form.input
                label="Mot de passe"
                name="password"
                type="password"
                placeholder="Au moins 8 caractères"

            />

            <x-generic.form.input
                label="Répéter le mot de passe"
                name="password_confirm"
                type="password"
                placeholder="Au moins 8 caractères"

            />
        </x-generic.form.container>
        <a class="btn-sec w-full mt-4 text-center" href="{{route('login')}}">Déjà un compte ? Se connecter</a>
    </div>
</x-layouts.auth>
