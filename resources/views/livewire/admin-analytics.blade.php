<div>
    <nav class="grid justify-center text-xs text-gray-400 md:flex">
        <ul class="flex pb-3 space-x-10 font-semibold uppercase border-b-4">
            <li class="hover:text-blue-400"><label wire:click="$toggle('toggleA')">Strumenti</label></li>
            <li class="hover:text-blue-400"><label wire:click="$toggle('toggleA')">Utenti</label></li>
        </ul>
    </nav>
    @if ($toggleA)
        <livewire:search-posts />
    @else
        <livewire:search-users />
    @endif
</div>
