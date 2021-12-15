<x-layout>
    <x-setting heading="Modifica strumenti">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
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

                                        <td class="px-4 py-4 text-sm font-medium text-center whitespace-nowrap">
                                            <a href="/admin/posts/{{ $post->id }}/edit" class="text-blue-500 hover:text-blue-600">Modifica</a>
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium text-center whitespace-nowrap">
                                            <div x-data="{ isDeleteModalVisible: false}">
                                                <x-button @click="isDeleteModalVisible = true" class="px-5 py-3 text-red-400 transition duration-150 ease-in hover:bg-gray-100 hover:text-red-600">
                                                    Cancella
                                                </x-button>

                                                <div
                                                     x-show="isDeleteModalVisible"
                                                     x-transition:enter="transition ease-out duration-200"
                                                     x-transition:enter-start="transform opacity-0 scale-95"
                                                     x-transition:enter-end="transform opacity-100 scale-100"
                                                     x-transition:leave="transition ease-in duration-75"
                                                     x-transition:leave-start="transform opacity-100 scale-100"
                                                     x-transition:leave-end="transform opacity-0 scale-95"
                                                     class="fixed top-0 left-0 z-10 flex items-center w-full h-full overflow-y-auto shadow-lg"
                                                     x-cloak>
                                                    <div class="fixed inset-0 bg-gray-800 opacity-20" @click="isDeleteModalVisible = false"></div>
                                                    <div class="container fixed inset-0 mx-auto overflow-y-auto rounded-lg py-36 lg:px-32">
                                                        <div class="rounded bg-gray-50">
                                                            <div class="flex px-6 pt-2 pr-4 justiy-end">
                                                                <button
                                                                        @click="isDeleteModalVisible = false"
                                                                        @keydown.escape.window="isDeleteModalVisible = false"
                                                                        class="text-3xl leading-none hover:text-gray-300">&times;</button>
                                                            </div>
                                                            <header class="right-0 p-6">
                                                                <h3 class="text-lg font-bold">Sei sicuro?</h3>
                                                            </header>
                                                            <div class="grid-cols-2 px-8 py-8 modal-body">
                                                                <main class="px-6 mb-4">
                                                                    <span class="text-sm">
                                                                        Continuando cancellerai definitivamente lo strumento.
                                                                    </span>
                                                                </main>
                                                                <footer class="flex justify-end px-6 py-4 bg-gray-100 rounded-b-md">
                                                                    <form method="POST" action="/admin/posts/{{ $post->id }}">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <x-button class="px-5 py-3 text-red-400 transition duration-150 ease-in hover:bg-gray-100 hover:text-red-600">
                                                                            Cancella
                                                                        </x-button>
                                                                    </form>
                                                                    <x-button @click="isDeleteModalVisible = false" class="px-5 py-3 text-gray-400 transition duration-150 ease-in hover:bg-gray-100 hover:text-gray-600">
                                                                        Annulla
                                                                    </x-button>
                                                                </footer>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-setting>
</x-layout>
