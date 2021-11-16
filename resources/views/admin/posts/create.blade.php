<x-layout>
    <x-setting heading="Aggiungi un nuovo strumento">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <x-form.input name="title" required />
            <span class="mb-6 text-xs text-gray-600 uppercase">- il nome dello strumento</span>
            <x-form.input name="slug" required />
            <span class="mb-6 text-xs text-gray-600 uppercase">- url dello strumento</span>
            <x-form.input name="thumbnail" type="file" required />
            <span class="mb-6 text-xs text-gray-600 uppercase">- immagine dello strumento</span>
            <x-form.textarea name="excerpt" required />
            <span class="mb-6 text-xs text-gray-600 uppercase">- percorso didattico dello strumento</span>
            <div class="flex space-x-2">
                <x-form.edit.editor name="pros" class="summernote" required />
                <x-form.edit.editor name="cons" class="summernote" required />
            </div>
            <span class="mb-6 text-xs text-gray-600 uppercase">- pro e contro dello strumento</span>

            <x-form.textarea name="body" id="summernote" required />
            <span class="mb-6 text-xs text-gray-600 uppercase">- testo dello strumento</span>

            <x-form.field>
                <x-form.label name="category" />

                <select name="category_id" id="category_id" required>
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                                value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category" />
            </x-form.field>
            <span class="mb-6 text-xs text-gray-600 uppercase">- categoria dello strumento</span>


            <x-form.button>Pubblica</x-form.button>
        </form>
    </x-setting>
</x-layout>
