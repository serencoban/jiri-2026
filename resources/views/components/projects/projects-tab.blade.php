<div x-on:keydown.right.prevent="$focus.wrap().next()"
     x-on:keydown.left.prevent="$focus.wrap().previous()" class="flex overflow-x-auto border-b border-grey" role="tablist">
    <button x-on:click="selectedTab = 'portfolio'"
            x-bind:aria-selected="selectedTab === 'portfolio'"
            x-bind:tabindex="selectedTab === 'portfolio' ? '0' : '-1'"
            x-bind:class="selectedTab === 'portfolio' ? 'border rounded-tl-lg border-grey border-b-0 bg-gray-100': 'border rounded-tl-lg border-grey border-b-0'" class="h-min px-4 py-2 text-sm" type="button" role="tab">Portfolio
    </button>
    <button x-on:click="selectedTab = 'reproduction'"
            x-bind:aria-selected="selectedTab === 'reproduction'"
            x-bind:tabindex="selectedTab === 'reproduction' ? '0' : '-1'"
            x-bind:class="selectedTab === 'reproduction' ? 'border border-grey border-l-0 border-b-0 bg-gray-100' : 'border border-grey border-l-0 border-b-0'" class="h-min px-4 py-2 text-sm" type="button" role="tab">Site reproduction
    </button>
    <button x-on:click="selectedTab = 'vm'"
            x-bind:aria-selected="selectedTab === 'vm'"
            x-bind:tabindex="selectedTab === 'vm' ? '0' : '-1'"
            x-bind:class="selectedTab === 'vm' ? 'border rounded-tr-lg border-grey border-l-0 border-b-0 bg-gray-100' : 'border rounded-tr-lg border-grey border-l-0 border-b-0'" class="h-min px-4 py-2 text-sm" type="button" role="tab">Le Vieux Moulin
    </button>
</div>
