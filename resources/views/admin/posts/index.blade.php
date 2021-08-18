<x-layout>
    <x-setting heading="Modifica strumenti">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($posts as $post)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <a href="/posts/{{ $post->slug }}">
                                                        {{ $post->title }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                            <a href="/admin/posts/{{ $post->id }}/edit" class="px-5 py-3 transition duration-150 ease-in hover:bg-gray-100 text-blue-400 hover:text-blue-600">Modifica</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                            <x-button class="bg-red-400 hover:bg-red-500" wire:click="confirmDelete({{ $post->id }})">
                                                Cancella ordine
                                            </x-button>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <form wire:submit.prevent="delete">
            <x-confirmation-modal wire:model.defer="showDeleteItemModal">
                <x-slot name="title">
                    Eliminare l'articolo?
                </x-slot>
                <x-slot name="body">
                    Continuando cancellerai l'articolo.
                </x-slot>
                <x-slot name="footer">
                    <x-button class="bg-gray-500 hover:bg-gray-400" wire:click="$set('showDeleteItemModal', false)">Annulla</x-button>
                    <x-button type="submit" class="bg-red-400 hover:bg-red-500">Continua</x-button>
                </x-slot>
            </x-confirmation-modal>
        </form>
    </x-setting>
</x-layout>
