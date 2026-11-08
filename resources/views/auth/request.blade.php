<x-layouts.auth title="Changement de mot de passe">
    <div class="col-span-12 flex flex-col min-h-screen items-center justify-center bg-neutral-50 px-4">
        <span>
            <img class="mx-auto mb-4"  src="{{ asset('storage/jiri-logo.svg') }}" alt="Logo Jiri">
        </span>
        <form action="{{ route('password.email') }}"
            method="POST"
            class="w-full max-w-md rounded-2xl border border-neutral-200 bg-white p-8 shadow-xs"
        >
            @csrf
            <div class="mb-6">
                <h2 class="mb-1 text-2xl font-semibold">{{__('auth.title_request')}}</h2>
                <p class="font-light text-neutral-500">{{__('auth.desc_request')}}</p>
            </div>
            <div class="flex flex-col gap-4">
                <x-generic.form.input
                    label="Email"
                    name="email"
                    id="email"
                    type="email"
                    value="{{ old('email') }}"
                    placeholder="ex: nom@xyz.com"
                />
                @error('email')
                <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
                <button type="submit" class="btn-main w-full">{{__('auth.send_link')}}</button>
            </div>
            <div class="mt-6 text-center">
                <a href="{{ route('login') }}" class="text-sm text-neutral-500 underline hover:text-main-red">{{__('auth.back')}}</a>
            </div>
        </form>
    </div>
</x-layouts.auth>
