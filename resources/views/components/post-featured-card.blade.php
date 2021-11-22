<div x-data="{ show: true }">
    <div class="z-50 lg:z-0 lg:hidden">
        <x-toggle class="lg:hidden">
            Mappa
        </x-toggle>
    </div>
    <div
        x-show="show"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="items-center w-full media-block"
        >
        <x-chord></x-chord>
    </div>
</div>
