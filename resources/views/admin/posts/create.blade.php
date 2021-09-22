<x-layout>
    <x-setting heading="Aggiungi un nuovo strumento">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <x-form.input name="title" required />
            <x-form.input name="slug" required />
            <x-form.input name="thumbnail" type="file" required />
            <x-form.textarea name="excerpt" required />
            <div class="flex space-x-2">
                <x-form.edit.editor name="pros" class="summernote" required />
                <x-form.edit.editor name="cons" class="summernote" required />
            </div>
            <x-form.textarea name="body" id="summernote" required/>


            <x-form.field>
                <x-form.label name="category"/>

                <select name="category_id" id="category_id" required>
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category"/>
            </x-form.field>

            <x-form.button>Pubblica</x-form.button>
        </form>
    </x-setting>
</x-layout>
