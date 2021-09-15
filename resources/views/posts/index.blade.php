<x-layout>
    @include ('posts._header')

    <main class="max-w-6xl mx-auto mt-6 space-y-6 lg:mt-20">
        <div>
            @if ($posts->count())
                {{-- <script>
                    console.log({{ $posts->first() }})
                </script> --}}
                <x-posts-grid :posts="$posts" />
                {{ $posts->links() }}
            @else
                <p class="text-center">Nessuno strumento trovato. Riprova più tardi.</p>
            @endif
        </div>
    </main>
</x-layout>
