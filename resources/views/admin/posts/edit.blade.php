<x-layout>
    <x-setting :heading="'Modifica strumento: ' . $post->title">
        <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <x-form.input name="title" :value="old('title', $post->title)" required />
            <x-form.input name="slug" :value="old('slug', $post->slug)" required />

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
                </div>

                <img src="{{ asset('storage/thumbnails' . $post->thumbnail) }}" alt="" class="w-2/4 ml-6 lg:w-2/12 rounded-xl">
            </div>

            <x-form.textarea name="excerpt" required>{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
            <div class="flex space-x-1">
                <x-form.textarea name="pros" class="summernote" required>{{ old('pros', $post->pros) }}</x-form.textarea>
                <x-form.textarea name="cons" class="summernote" required>{{ old('cons', $post->cons) }}</x-form.textarea>
            </div>
            <x-form.textarea name="body" class="summernote" required>{{ old('body', $post->body) }}</x-form.textarea>

            <x-form.field>
                <x-form.label name="category" />
                <select name="category_id" id="category_id" required>
                    @foreach ($categories as $category)
                        <option
                                value="{{ $category->id }}"
                                {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>
                <x-form.error name="category" />
            </x-form.field>
            <x-form.label name="tags" />
            <select class="w-full py-6 js-example-basic-single" name="tags[]" id="create-post" required multiple="multiple" >
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" @if (in_array($tag->id, $oldTags))
                        selected
                @endif
                >{{ $tag->name }}</option>
                @endforeach
            </select>
            <span class="mb-6 text-xs text-gray-600 uppercase">- tags dello strumento</span>

            <x-form.button>Aggiorna</x-form.button>
        </form>

    </x-setting>
</x-layout>
