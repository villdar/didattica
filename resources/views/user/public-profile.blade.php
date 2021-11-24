<x-layout>
    <h3 class="p-10 text-center mt-30">Profilo di <span class="font-semibold text-blue-600 uppercase">{{ $user->username }}</span></h3>
    <hr>
    <h4 class="p-4 mt-10 text-xl">Riepilogo</h4>
    <div class="flex items-center flex-shrink w-4/12 p-2 space-x-2 bg-green-100 border border-green-500 border-solid shadow-xl rounded-xl">
        <img src="{{ $user->getAvatar() }}" class="rounded-xl" width="100" height="100">
        <div class="p-1 bg-green-200 rounded-xl">
            <div class="flex">
                Nome: <span class="ml-2 mr-2 font-semibold text-green-600"> {{ $user->name }}</span>
                Iscritto: <span class="ml-2 mr-2 font-semibold text-green-600">{{ $user->created_at->diffForHumans() }}</span>
            </div>
            <div class="flex">
                Numero commenti: <span class="ml-2 mr-2 font-semibold text-green-600">{{ $user->comments->count() }}</span>
                Numero di mi piace: <span class="ml-2 mr-2 font-semibold text-green-600">{{ $user->votes->count() }}</span>
            </div>
            <div class="flex items-center p-2 text-xs font-bold text-blue-300 uppercase">

                <span class="text-gray-600">Livello {{ 1 + floor($user->comments->count() * 2 + $user->votes->count() * 0.5) / 100 }}</span>

                <div class="flex-1 mx-4 bg-gray-600 rounded-full" style="height: 9px;">
                    <div wire:mode="bar" class="h-full bg-blue-300 rounded-full" style="width: {{ $user->comments->count() * 2 + (($user->votes->count() * 0.5) % 100) }}%;"></div>
                </div>
                <span class="text-gray-600">{{ $user->comments->count() * 2 + (($user->votes->count() * 0.5) % 100) }} % EXP</span>
            </div>
        </div>
    </div>
</x-layout>
