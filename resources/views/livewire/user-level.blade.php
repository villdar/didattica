<div class="flex items-center p-5 mt-10 text-xs font-bold text-blue-300 uppercase">

    <span wire:model="level" class="text-gray-600">Livello {{ $level }}</span>

    <div class="flex-1 mx-4 bg-gray-600 rounded-full" style="height: 9px;">
        <div wire:mode="bar" class="h-full bg-blue-300 rounded-full" style="width: {{ $bar }}%;"></div>
    </div>
    <span wire:model="exp" class="text-gray-600">{{ $exp }} XP</span>
</div>
