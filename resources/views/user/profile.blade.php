<x-layout>
    <div>
        <h2 class="pl-10 m-1 mt-32 mr-5 font-bold text-center uppercase">Profilo utente</h2>
        <hr>
            <livewire:user-level />
        @csrf
        <div x-data="{ isProfileEditable: false}">
            <header class="flex items-center">
                <h4 class="pt-6 text-center transition duration-150 ease-in ml-36 hover:text-blue-400"><span class="cursor-pointer select-none" @click="isProfileEditable = !isProfileEditable">Modifica profilo</span></h4>
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
                 class="p-6 mt-10 ml-40 mr-40 space-y-10">
                <livewire:profile-index />
            </div>
        </div>
        <h3 class="pt-6 pl-10 m-1 mr-5 text-lg text-center uppercase">Le mie attività</h3>
        <hr class="mb-5">
        <livewire:user-activity />
    </div>
</x-layout>
