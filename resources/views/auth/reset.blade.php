<x-layouts.auth title="Changement du mot de passe">
    <div class="col-span-12 flex min-h-screen items-center justify-center bg-neutral-50 px-4">

        <form
            action="{{ route('password.update') }}"
            method="POST"
            class="w-full max-w-md rounded-2xl border border-neutral-200 bg-white p-8 shadow-sm"
        >
            @csrf

            <input type="hidden" name="token" value="{{ request()->route('token') }}">
            <div class="mb-6">
                <h2 class="mb-2 text-2xl font-semibold">{{__('auth.title_reset')}}</h2>
                <p class="text-sm text-neutral-500">{{__('auth.desc_reset')}}</p>
            </div>
            <div class="flex flex-col gap-4">
                <x-generic.form.input
                    label="Email"
                    name="email"
                    type="email"
                    value="{{ request('email') }}"
                    placeholder="Votre email"
                />

                <x-generic.form.input
                    label="Nouveau mot de passe"
                    name="password"
                    type="password"
                    placeholder="Au moins 8 caractères"
                />

                <x-generic.form.input
                    label="Confirmer le mot de passe"
                    name="password_confirmation"
                    type="password"
                    placeholder="Confirmez votre mot de passe"
                />

                <button
                    type="submit"
                    class="btn-main w-full"
                >
                    Modifier le mot de passe
                </button>
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('login') }}" class="text-sm text-neutral-500 underline hover:text-main-red">Retour à la connexion</a>
            </div>
        </form>
    </div>
</x-layouts.auth>
