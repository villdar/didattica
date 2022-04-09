<x-layout>
    <x-setting heading="Aggiungi un nuovo strumento">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <x-form.input name="title" required />
            <span class="mb-6 text-xs text-gray-600 uppercase">- il nome dello strumento</span>
            {{-- <x-form.input name="slug" required />
                <span class="mb-6 text-xs text-gray-600 uppercase">- url dello strumento</span> --}}
            <x-form.input name="thumbnail" type="file" required />
            <span class="mb-6 text-xs text-gray-600 uppercase">- immagine dello strumento</span>
            <x-form.input name="prices" />
            <span class="mb-6 text-xs text-gray-600 uppercase">- Free, Freemium o Premium</span>
            <x-form.textarea name="excerpt" required />
            <span class="mb-6 text-xs text-gray-600 uppercase">- percorso didattico dello strumento</span>
            <div class="flex space-x-2">
                <x-form.textarea cols="60" name="pros" required />
                <x-form.textarea cols="60" name="cons" required />
            </div>
            <span class="mb-6 text-xs text-gray-600 uppercase">- pro e contro dello strumento, dividerli andando a capo.</span>
            <div class="mt-3" x-data="{ text: '' }">
                <table class="min-w-full p-3 text-base text-gray-500 align-middle bg-gray-100 border-gray-400 border-solid rounded-md">
                    <thead>
                        <tr>
                            <th scope="col" class="font-semibold hover:text-black" x-on:click="text += '<b></b>'">B</th>
                            <th scope="col" class="italic font-semibold hover:text-black" x-on:click="text += '<i></i>'">I</th>
                            <th scope="col" class="font-semibold underline hover:text-black" x-on:click="text += '<u></u>'">U</th>
                            <th scope="col" class="font-semibold hover:text-black" x-on:click="text += '<h1></h1>'">H1</th>
                            <th scope="col" class="font-semibold hover:text-black" x-on:click="text += '<h2></h2>'">H2</th>
                            <th scope="col" class="font-semibold hover:text-black" x-on:click="text += '<h3></h3>'">H3</th>
                            <th scope="col" class="font-semibold hover:text-black" x-on:click="text += '<hr></hr>'"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg></th>
                            <th scope="col" class="font-semibold hover:text-black" x-on:click="text += '<a href=&quot&quot class=&quot text-blue-600 hover:text-blue-400 underline italic&quot></a>'"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                </svg></th>
                            <th scope="col" class="font-semibold hover:text-black" x-on:click="text += '<img class=&quot w-1/2 rounded-md border &quot src=&quot&quot />'"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg></th>
                            <th scope="col" class="font-semibold hover:text-black" x-on:click="text += '<ul>\n<li>1</li>\n<li>2</li>\n<li>3</li>\n</ul>'"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                </svg></th>
                        </tr>
                    </thead>
                </table>

                <x-form.textarea name="body" required x-model="text" />

                <span class="block mb-2 text-xs font-bold text-gray-700 uppercase">Anteprima</span>
                <div class="p-4 whitespace-pre bg-gray-100 border-gray-400 border-solid rounded-md h-max" x-html="text"></div>
            </div>
            <span class="mb-6 text-xs text-gray-600 uppercase">- testo dello strumento</span>
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
            <span class="mb-6 text-xs text-gray-600 uppercase">- categoria dello strumento</span>
            <x-form.field>
                <x-form.label name="tags" />
                <select class="w-full py-6 js-example-basic-single" name="tags[]" id="create-post" required multiple="multiple">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ ucwords($tag->name) }}</option>
                    @endforeach
                </select>
                <x-form.error name="tags" />
                <br>
                <span class="mb-6 text-xs text-gray-600 uppercase">- tags dello strumento</span>
            </x-form.field>
            <div class="flex py-2">
                <x-form.button>Pubblica</x-form.button>
            </div>
        </form>
    </x-setting>
</x-layout>
