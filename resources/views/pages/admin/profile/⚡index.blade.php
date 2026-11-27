<?php

use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::admin', ['title' => 'Profil'])] class extends Component
{
};

?>

<div class="grid grid-cols-1 gap-6 min-h-[calc(100vh-4rem)] lg:grid-cols-12 lg:gap-8">
    <h1 class="sr-only">{{ __('title.profile_page') }}</h1>
    <section class="flex flex-col justify-between rounded-2xl border border-neutral-200 bg-white p-5 shadow-xs sm:p-6 lg:col-span-4 lg:p-8">
        <h2 class="sr-only">{{ __('title.profile_details') }}</h2>
        <div>
            <div class="flex justify-center mb-8 lg:mb-10">
                <div class="relative">
                    <div class="flex h-28 w-28 items-center justify-center rounded-full bg-red-50 text-3xl font-semibold text-main-red sm:h-32 sm:w-32 lg:h-36 lg:w-36 lg:text-4xl">
                        {{ strtoupper(substr(auth()->user()->firstname, 0, 1)) }}
                        {{ strtoupper(substr(auth()->user()->lastname, 0, 1)) }}
                    </div>
                    <div class="absolute bottom-1 right-1 h-7 w-7 rounded-full border-4 border-white bg-red-200 lg:right-2 lg:h-8 lg:w-8"></div>
                </div>
            </div>

            <div class="rounded-xl">
                <x-admin.profile.user-info
                    info="Nom"
                    :info_details="auth()->user()->firstname . ' ' . auth()->user()->lastname"
                />
                <x-admin.profile.user-info
                    info="Email"
                    :info_details="auth()->user()->email"
                />
                <x-admin.profile.user-info
                    info="Compte créé le"
                    :info_details="auth()->user()->created_at->format('d/m/Y')"
                />
                <div class="flex flex-col gap-3 border-b border-neutral-200 py-4 sm:flex-row sm:items-center sm:justify-between">
                    <span class="text-sm text-neutral-500">Langue</span>
                    <div class="flex w-fit rounded-lg bg-neutral-100 p-1">
                        <button type="button" class="rounded-md bg-white px-3 py-1 text-sm font-medium shadow-xs">FR</button>
                        <button type="button" class="rounded-md px-3 py-1 text-sm text-neutral-500 hover:text-neutral-900">EN</button>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ route('logout') }}" method="POST" class="mt-8 lg:mt-10">
            @csrf
            <button class="btn-main w-full" type="submit">{{ __('auth.logout') }}</button>
        </form>
    </section>

    <section class="rounded-2xl border border-neutral-200 bg-white p-5 shadow-xs sm:p-6 lg:col-span-8 lg:p-8">
        <h2 class="sr-only">{{ __('title.profile_supp') }}</h2>
        <div class="pb-8">
            <div class="mb-5 sm:mb-6">
                <h3 class="text-xl font-semibold sm:text-2xl">{{ __('title.recent_jiri') }}</h3></div>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3 xl:gap-5">
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

        <div class="pt-8 lg:pt-10">
            <div class="mb-5 sm:mb-6">
                <h3 class="text-xl font-semibold sm:text-2xl">{{ __('title.upcoming_jiri') }}</h3>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3 xl:gap-5">
                <x-admin.profile.epreuve-info
                    title="Epreuve 27"
                    date="11/09/2027"
                    link="Modifier l'épreuve"
                    link_title="Modifier l'épreuve"
                />
                <x-admin.profile.epreuve-info
                    title="Epreuve 27"
                    date="11/09/2027"
                    link="Modifier l'épreuve"
                    link_title="Modifier l'épreuve"
                />
                <x-admin.profile.epreuve-info
                    title="Epreuve 27"
                    date="11/09/2027"
                    link="Modifier l'épreuve"
                    link_title="Modifier l'épreuve"
                />
            </div>
        </div>
    </section>
</div>
