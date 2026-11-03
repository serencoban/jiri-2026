<x-layouts.auth>
    <div class="col-span-12 flex min-h-screen items-center justify-center bg-neutral-50 px-4">

        <form action="{{ route('password.email') }}"
            method="POST"
            class="w-full max-w-md rounded-2xl border border-neutral-200 bg-white p-8 shadow-xs"
        >
            @csrf
            <div class="mb-6">
                <h2 class="mb-2 text-2xl font-semibold">{{__('auth.title_request')}}</h2>
                <p class="text-sm text-neutral-500">{{__('auth.desc_request')}}</p>
            </div>
            <div class="flex flex-col gap-4">
                <x-generic.form.input
                    label="Email"
                    name="email"
                    id="email"
                    type="email"
                    value="{{ old('email') }}"
                    placeholder="Votre email"
                />

                @error('email')
                <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror

                <button type="submit" class="btn-main w-full">Envoyer le lien</button>
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('login') }}" class="text-sm text-neutral-500 underline hover:text-main-red">Retour à la connexion</a>
            </div>
        </form>

    </div>
</x-layouts.auth>
