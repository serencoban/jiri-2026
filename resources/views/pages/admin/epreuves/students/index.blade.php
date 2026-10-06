<x-layouts.admin>
    <div class="flex gap-4 items-center pb-4">
        <h1 class="text-4xl font-medium">Les évaluateurs qui ont évalué Seren Coban</h1>
        <button @click="$dispatch('open-drawer')">
            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="none">
                <path d="M8 0.5H26C30.1421 0.5 33.5 3.85786 33.5 8V26C33.5 30.1421 30.1421 33.5 26 33.5H8C3.85786 33.5 0.5 30.1421 0.5 26V8C0.5 3.85786 3.85786 0.5 8 0.5Z" fill="#FAFAFA" stroke="#CF4345"/>
                <path d="M12.0024 20L21.5949 20L16.7987 25.4814L12.0024 20ZM11.2499 20.6585L16.0461 26.1399C16.4445 26.5952 17.1528 26.5952 17.5512 26.1399L22.3475 20.6585C22.9132 20.0119 22.4541 19 21.5949 19H12.0024C11.1433 19 10.6841 20.0119 11.2499 20.6585Z" fill="#CF4345"/>
                <path d="M21.5947 14.4814L12.0023 14.4814L16.7985 8.99998L21.5947 14.4814ZM22.3473 13.8229L17.5511 8.34147C17.1527 7.88614 16.4443 7.88614 16.0459 8.34147L11.2497 13.8229C10.6839 14.4695 11.1431 15.4814 12.0023 15.4814L21.5947 15.4814C22.4539 15.4814 22.9131 14.4695 22.3473 13.8229Z" fill="#CF4345"/>
            </svg>
        </button>
    </div>
    <div>
        <span>Côte globale de l'élève:</span>
        <span>14/20</span>
    </div>
    <section class="pt-8">
        <h2 class="sro">Les projet de Seren</h2>
        <div x-data="{ selectedTab: 'portfolio' }" class="w-full">
            <x-projects-tab/>
            <div class="border rounded-b-lg border-grey border-t-0 p-8">
                <div x-cloak x-show="selectedTab === 'portfolio'" role="tabpanel">
                    <div class="flex justify-between">
                        <div class="flex">
                            <h2>Moyenne du Portfolio</h2>
                            <span>14/20</span>
                        </div>
                        <div class="flex" >
                            <label for="order-grade">Trier par ordre</label>
                            <select class="font-semibold text-sm py-3 px-4 border border-main-red rounded-lg text-main-red block mr-2" name="order-grade" id="order-grade">
                                <option value="croissant">Croissant</option>
                                <option value="decroissant">Decroissant</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-6 gap-8">
                        @for($i=0;$i<10;$i++)
                            <x-student-evaluated-card/>
                        @endfor
                    </div>
                </div>

                <div x-cloak x-show="selectedTab === 'reproduction'" role="tabpanel">
                    <div class="flex justify-between">
                        <div class="flex">
                            <h2>Moyenne du Portfolio</h2>
                            <span>14/20</span>
                        </div>
                        <div class="flex" >
                            <label for="order-grade">Trier par ordre</label>
                            <select class="font-semibold text-sm py-3 px-4 border border-main-red rounded-lg text-main-red block mr-2" name="order-grade" id="order-grade">
                                <option value="croissant">Croissant</option>
                                <option value="decroissant">Decroissant</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-6 gap-8">
                        @for($i=0;$i<10;$i++)
                            <x-student-evaluated-card/>
                        @endfor
                    </div>
                </div>

                <div x-cloak x-show="selectedTab === 'vm'" role="tabpanel">
                    <div class="flex justify-between">
                        <div class="flex">
                            <h2>Moyenne du Portfolio</h2>
                            <span>14/20</span>
                        </div>
                        <div class="flex" >
                            <label for="order-grade">Trier par ordre</label>
                            <select class="font-semibold text-sm py-3 px-4 border border-main-red rounded-lg text-main-red block mr-2" name="order-grade" id="order-grade">
                                <option value="croissant">Croissant</option>
                                <option value="decroissant">Decroissant</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-6 gap-8">
                        @for($i=0;$i<10;$i++)
                            <x-student-evaluated-card/>
                        @endfor
                    </div>
                </div>
            </div>
        </div>

    </section>
</x-layouts.admin>
