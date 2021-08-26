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
                                            {{-- <a href="/admin/posts/{{ $post->id }}/edit" class="px-5 py-3 transition duration-150 ease-in hover:bg-gray-100 text-blue-400 hover:text-blue-600">Modifica</a> --}}
                                            {{-- <a href="/admin/posts/{{ $post->id }}/edit">
                                                <x-button class="px-5 py-3 transition duration-150 ease-in hover:bg-gray-100 text-blue-400 hover:text-blue-600">
                                                    Modifica
                                                </x-button>
                                            </a> --}}
                                            <div x-data="{ isEditModalVisible: false}">
                                                <x-button @click="isEditModalVisible = true" class="px-5 py-3 transition duration-150 ease-in hover:bg-gray-100 text-blue-400 hover:text-blue-600">
                                                    Modifica
                                                </x-button>
                                                <div
                                                     x-show="isEditModalVisible"
                                                     x-transition:enter="transition ease-out duration-200"
                                                     x-transition:enter-start="transform opacity-0 scale-95"
                                                     x-transition:enter-end="transform opacity-100 scale-100"
                                                     x-transition:leave="transition ease-in duration-75"
                                                     x-transition:leave-start="transform opacity-100 scale-100"
                                                     x-transition:leave-end="transform opacity-0 scale-95"
                                                     class="z-10 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto">
                                                    <div class="bg-gray-800 opacity-20 fixed inset-0" @click="isEditModalVisible = false"></div>
                                                    <div class="fixed inset-0 py-6 container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                                        <div class="bg-gray-50 rounded">
                                                            <div class="flex justiy-end pr-4 pt-2 px-6">
                                                                <button
                                                                        @click="isEditModalVisible = false"
                                                                        @keydown.escape.window="isEditModalVisible = false"
                                                                        class="text-3xl leading-none hover:text-gray-300">&times;</button>
                                                            </div>
                                                            <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PATCH')

                                                                <x-form.input name="title" :value="old('title', $post->title)" required />
                                                                <x-form.input name="slug" :value="old('slug', $post->slug)" required />

                                                                <div class="flex mt-6 px-4 mr-6">
                                                                    <div class="flex-1 w-2/12">
                                                                        <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
                                                                    </div>

                                                                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl mr-6" width="150">
                                                                </div>

                                                                <x-form.textarea name="excerpt" required>{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
                                                                <x-form.textarea name="body" required>{{ old('body', $post->body) }}</x-form.textarea>

                                                                <x-form.field>
                                                                    <x-form.label name="category" />

                                                                    <select name="category_id" id="category_id" required>
                                                                        @foreach (\App\Models\Category::all() as $category)
                                                                            <option
                                                                                    value="{{ $category->id }}"
                                                                                    {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                                                                        @endforeach
                                                                    </select>

                                                                    <x-form.error name="category" />
                                                                </x-form.field>

                                                                <x-form.button>Aggiorna</x-form.button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                    </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <div x-data="{ isDeleteModalVisible: false}">
                            <x-button @click="isDeleteModalVisible = true" class="px-5 py-3 transition duration-150 ease-in hover:bg-gray-100 text-red-400 hover:text-red-600">
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
                                 class="z-10 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto">
                                <div class="bg-gray-800 opacity-20 fixed inset-0" @click="isDeleteModalVisible = false"></div>
                                <div class="fixed inset-0 py-36 container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                    <div class="bg-gray-50 rounded">
                                        <div class="flex justiy-end pr-4 pt-2 px-6">
                                            <button
                                                    @click="isDeleteModalVisible = false"
                                                    @keydown.escape.window="isDeleteModalVisible = false"
                                                    class="text-3xl leading-none hover:text-gray-300">&times;</button>
                                        </div>
                                        <header class="p-6 right-0">
                                            <h3 class="text-lg font-bold">Sei sicuro?</h3>
                                        </header>
                                        <div class="modal-body px-8 py-8 grid-cols-2">
                                            <main class="px-6 mb-4">
                                                <span class="text-sm">
                                                    Continuando cancellerai definitivamente lo strumento.
                                                </span>
                                            </main>
                                            <footer class="flex justify-end px-6 py-4 bg-gray-100 rounded-b-md">
                                                <form method="POST" action="/admin/posts/{{ $post->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-button class="px-5 py-3 transition duration-150 ease-in hover:bg-gray-100 text-red-400 hover:text-red-600">
                                                        Cancella
                                                    </x-button>
                                                </form>
                                                <x-button @click="isDeleteModalVisible = false" class="px-5 py-3 transition duration-150 ease-in hover:bg-gray-100 text-gray-400 hover:text-gray-600">
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
