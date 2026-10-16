<x-layouts.auth>
    <div class="bg-[url('/storage/app/public/auth-bg.png')] bg-cover bg-no-repeat col-span-7 flex items-center">
        <div class="text-white flex flex-col gap-4 items-start p-16">
            <x-icons.double-pencil/>
            <h1 class="text-5xl font-medium">Heureux de vous revoir sur Jiri!</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eget cocnsequat eros. Mauris sollicitudin mattis risus et pellentesque. Suspendisse potenti. Mauris tristique velit at tristique lobortis.</p>
        </div>
    </div>
    <div class="col-span-5">
        <x-generic.form.container
            action="{{ route('login') }}"
            method="POST"
            btn="Se connecter"
        >
            <x-generic.form.input
                label="Email"
                name="email"
                type="email"
            />

            <x-generic.form.input
                label="Mot de passe"
                name="password"
                type="password"
            />
        </x-generic.form.container>
        <div>
            <p><a class="underline" href="{{route('password.request')}}">J'ai oublié mon mot de passe</a></p>
        </div>
    </div>
</x-layouts.auth>
