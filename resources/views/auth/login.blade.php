<x-layouts.auth>
    <div class="bg-[url('/storage/app/public/auth-bg.png')] bg-cover bg-no-repeat col-span-7 flex items-center">
        <div class="text-white flex flex-col gap-4 items-start p-16">
            <x-icons.double-pencil/>
            <h1 class="text-5xl font-medium">{{__('auth.title_login')}}</h1>
            <p>{{__('auth.desc_login')}}</p>
        </div>
    </div>
    <div class="col-span-5 p-36 content-center">
        <x-generic.form.container
            action="{{ route('login') }}"
            method="POST"
            btn="Se connecter"
        >
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
                placeholder="Votre mot de passe"
            />
        </x-generic.form.container>
        <a class="btn-sec w-full mt-4 text-center" href="{{route('register')}}">Pas de compte ? Se créer un compte</a>
        <p class="text-center pt-2 text-sm text-text-light"><a class="underline hover:text-main-red" href="{{route('password.request')}}">{{__('auth.forgot_password')}}</a></p>
    </div>
</x-layouts.auth>
