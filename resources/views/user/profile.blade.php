<x-layout>
    <div>
        <h2 class="pl-10 m-1 mt-32 mr-5 font-bold text-center uppercase">Area privata utente</h2>
        <hr>
        <livewire:user-level />
        <div x-data="{ isProfileEditable: false}">
            <header class="flex text-center">
                <div class="hidden sm:block" aria-hidden="true">
                    <div class="py-5">
                        <div class="border-t border-gray-200"></div>
                    </div>
                </div>
                <div class="flex ml-5 space-x-2 transition duration-150 ease-in hover:text-blue-400" @click="isProfileEditable = !isProfileEditable">
                    <h4><span class="cursor-pointer select-none">Modifica profilo</span></h4>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </header>
            <div
                 x-show="isProfileEditable"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="transform opacity-0 scale-95"
                 x-transition:enter-end="transform opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-75"
                 x-transition:leave-start="transform opacity-100 scale-100"
                 x-transition:leave-end="transform opacity-0 scale-95"
                 x-cloak
                 class="p-6 mt-10 space-y-10">
                <livewire:profile-index />
            </div>
        </div>
        <h3 class="pt-6 pl-10 m-1 mr-5 text-lg text-center uppercase">Le mie attività</h3>
        <hr class="mb-5">
        <livewire:user-activity />
    </div>
</x-layout>
