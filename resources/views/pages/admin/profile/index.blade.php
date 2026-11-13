<x-layouts.admin :title="__('title.profile_page')">
    <div class="grid grid-cols-12 gap-8 min-h-[calc(100vh-4rem)]">
        <h1 class="sr-only">{{ __('title.profile_page') }}</h1>
        <section class="col-span-4 flex flex-col justify-between rounded-2xl border border-neutral-200 bg-white p-8 shadow-s">
            <h2 class="sr-only">{{ __('title.profile_details') }}</h2>
            <div>
                <div class="flex justify-center mb-10">
                    <div class="relative">
                        <div class="flex h-36 w-36 items-center justify-center rounded-full bg-red-50 text-4xl font-semibold text-main-red"></div>
                        <div class="absolute bottom-1 right-2 h-8 w-8 rounded-full border-4 border-white bg-red-200"></div>
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
                    <div class="flex items-center justify-between border-b border-neutral-200 py-4">
                        <span class="text-sm text-neutral-500">Langue</span>
                        <div class="flex rounded-lg bg-neutral-100 p-1">
                            <button type="button" class="rounded-md bg-white px-3 py-1 text-sm font-medium shadow-sm">FR</button>
                            <button type="button" class="rounded-md px-3 py-1 text-sm text-neutral-500 hover:text-neutral-900">EN</button>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST" class="mt-10">
                @csrf
                <button class="btn-main w-full" type="submit">{{ __('auth.logout') }}</button>
            </form>
        </section>
        <section class="col-span-8 rounded-2xl border border-neutral-200 bg-white p-8 shadow-s">
            <h2 class="sr-only">{{ __('title.profile_supp') }}</h2>
            <div class="pb-8">
                <div class="mb-6">
                    <h3 class="text-2xl font-semibold">{{ __('title.recent_jiri') }}</h3>
                </div>
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
            <div class="pt-10">
                <div class="mb-6">
                    <h3 class="text-2xl font-semibold">{{ __('title.upcoming_jiri') }}</h3>
                </div>

                <div class="grid grid-cols-3 gap-5">
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
</x-layouts.admin>
