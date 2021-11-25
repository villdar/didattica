<div>
    <nav class="flex justify-center text-xs text-gray-400 md:flex">
        <ul class="flex pb-3 space-x-10 font-semibold uppercase border-b-4">
            <li class="hover:text-blue-400"><label wire:click="$toggle('toggleA')">Commenti</label></li>
            <li class="hover:text-blue-400"><label wire:click="$toggle('toggleA')">Mi Piace</label></li>
        </ul>
    </nav>
    <div class="flex justify-center pt-6 mt-2">
        @if ($toggleA)
        <div>
            <livewire:user-votes />
        </div>
        @else
        <div>
            <livewire:user-comments />
        </div>
        @endif
    </div>
</div>
