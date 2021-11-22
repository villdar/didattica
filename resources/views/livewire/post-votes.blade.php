<div class="flex justify-between w-full mx-2 hover:text-gray-600">
    <div class="text-center">
        <div class="text-2xl font-semibold @if ($hasVoted) text-blue-400 @endif">{{ $votesCount }}</div>
        <div class="text-gray-500">Mi Piace</div>
    </div>
    <div>
        @if ($hasVoted)
            <button wire:click.prevent="vote" class="px-4 py-3 text-xs font-bold text-white uppercase transition duration-150 ease-in bg-blue-400 border border-blue hover:bg-blue-500 rounded-xl">Non mi piace più</button>
        @else
            <button wire:click.prevent="vote" class="px-4 py-3 text-xs font-bold uppercase transition duration-150 ease-in bg-gray-200 border border-gray-200 hover:border-gray-400 rounded-xl">Mi piace</button>
        @endif
    </div>
</div>
