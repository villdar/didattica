@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf

            <header class="flex items-center">

                <h2 class="ml-4">Vuoi partecipare?</h2>
            </header>

            <div class="mt-6">
                <textarea
                    name="body"
                    class="w-full p-4 text-sm focus:outline-none focus:ring"
                    rows="5"
                    placeholder="Veloce! Pensa a qualcosa da dire."
                    required></textarea>

                @error('body')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end pt-4 mt-2 border-t border-gray-200">
                <x-form.button>Invia</x-form.button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Registrati</a> oppure
        <a href="/login" class="hover:underline">Accedi</a> per lasciare un commento.
    </p>
@endauth
