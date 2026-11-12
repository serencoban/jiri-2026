<form action="#">
    <div class="mr-2">
        <label for="search" class="block mb-2.5 text-sm font-medium text-heading sr-only ">{{__('actions.search')}}</label>
        <div class="relative">
            <input type="search" id="search" class="block w-full p-3 ps-4 rounded-lg border border-neutral-300 bg-neutral-100 text-heading text-sm rounded-base focus:ring-main-red" placeholder="Search" required />
            <button type="button" class="absolute bottom-1.5 right-1.5 px-3 py-2 cursor-pointer opacity-50">
                <x-svg.search/>
            </button>
        </div>
    </div>
</form>

