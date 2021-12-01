<div>
    <nav class="grid justify-center text-xs text-gray-400 md:flex">
        <ul class="flex pb-3 space-x-10 font-semibold uppercase border-b-4">
            <li class="hover:text-blue-400 @if ($ActivityFilter === "Tools") text-blue-400 @endif"><label wire:click.prevent="setFilter('Tools')">Strumenti</label></li>
            <li class="hover:text-blue-400 @if ($ActivityFilter === "Users") text-blue-400 @endif"><label wire:click.prevent="setFilter('Users')">Utenti</label></li>
        </ul>
    </nav>
    @if ($ActivityFilter === "Tools")
        <livewire:search-posts />
    @else
        <livewire:search-users />
    @endif
</div>
