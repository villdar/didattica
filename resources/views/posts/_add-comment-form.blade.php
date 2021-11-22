@auth
    <x-panel>
        <div x-data="{ isCommentModalVisible: false}">
            <form method="POST" action="/posts/{{ $post->slug }}/comments">
                @csrf
                <header class="flex items-center">
                    <h2 class="ml-4 transition duration-150 ease-in hover:text-blue-400"><span class="cursor-pointer select-none" @click="isCommentModalVisible = !isCommentModalVisible">Vuoi scrivere un commento? <span class="font-semibold">Clicca qui!</span></span></h2>
                </header>
                <div
                     x-show="isCommentModalVisible"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95"
                     x-cloak
                >
                    <div class="mt-6">
                        <textarea
                                  name="body"
                                  class="w-full p-3 pt-4 text-sm resize-none focus:ring-2 focus:ring-blue-600"
                                  rows="5"
                                  placeholder="Veloce! Pensa a qualcosa da dire."
                                  required
                                  @keydown.escape.window="isEditModalVisible = false"></textarea>
                        @error('body')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex justify-end mt-2 border-t border-gray-200">
                        <x-form.button>Invia</x-form.button>
                    </div>
                </div>
            </form>
        </div>
    </x-panel>
    @else
        <p class="font-semibold">
            <a href="/register" class="hover:underline">Registrati</a> oppure
            <a href="/login" class="hover:underline">Accedi</a> per lasciare un commento.
        </p>
    @endauth
