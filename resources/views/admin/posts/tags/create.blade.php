<x-layout>
    <x-setting heading="Crea nuovo Tag">
        <nav class="grid justify-center p-4 mb-5 text-xs text-gray-400 md:flex">
            <ul class="flex pb-3 space-x-10 font-semibold uppercase border-b-4">
                <li class="hover:text-blue-400 {{ request()->is('admin/posts/tags/create') ? 'text-blue-500' : '' }}">
                    <a href="{{ route('tags.create') }}" class="hover:text-blue-500">Crea</a>
                </li>
                <li class="hover:text-blue-400 {{ request()->is('admin/posts/tags/') ? 'text-blue-500' : '' }}">
                    <a href="{{ route('tags.index') }}" class="hover:text-blue-500">Indice</a>
                </li>
            </ul>
        </nav>

        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <div class="p-6">
                        <form action="{{ route('tags.store') }}" method="POST">
                            @csrf

                            <div>
                                <label for="name">Crea nuovo tag</label>
                                <input id="name" class="block w-full mt-1" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                                <span class="mt-2 text-xs text-gray-500">Maximum 200 characters</span>
                            </div>
                            <x-form.field>
                                <x-form.label name="category" />
                                <select name="category_id" id="category_id" required>
                                    @foreach ($categories as $category)
                                        <option
                                                value="{{ $category->id }}"
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                                    @endforeach
                                </select>
                                <x-form.error name="category" />
                            </x-form.field>

                            <x-button class="mt-12 bg-blue-500">
                                Crea
                            </x-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </x-setting>
</x-layout>
