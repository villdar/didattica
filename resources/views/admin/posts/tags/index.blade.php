<x-layout>
    <x-setting heading="Tag">
        <a href="{{ route('tags.create') }}" class="hover:text-blue-500">Crea</a>
        <div class="py-4">
            <div class="mx-auto sm:px-6">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <table class="w-full divide-y divide-gray-200">
                        <thead class="font-bold bg-gray-50">
                            <tr>
                                <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                    Nome
                                </th>

                                <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                    Categoria
                                </th>

                                <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                    Slug
                                </th>
                                <th class="px-2 py-3 text-xs tracking-wider text-left uppercase">
                                    Azioni
                                </th>
                            </tr>
                        </thead>

                        <tbody class="text-xs bg-white divide-y divide-gray-200">
                            @foreach ($tags as $tag)

                                <tr>
                                    <td class="px-2 py-4 whitespace-nowrap">
                                        {{ $tag->name }}
                                    </td>

                                    <td class="px-2 py-4 whitespace-nowrap">
                                        {{ $tag->category_id }}
                                    </td>

                                    <td class="px-2 py-4 whitespace-nowrap">
                                        {{ $tag->slug }}
                                    </td>

                                    <td class="px-2 py-4 text-sm text-gray-500 whitespace-nowrap">

                                        <div class="flex justify-start space-x-1">

                                            <a href="{{ route('tags.edit', $tag) }}" class="p-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 text-gray-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </a>

                                            <form action="{{ route('tags.delete', $tag) }}" method="POST">
                                                @csrf
                                                @method('Delete')
                                                <button type="submit" class="p-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 text-red-500">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-setting>
</x-layout>
