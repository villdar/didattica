@foreach ($posts as $post)
    <div>
        <div class="flex flex-col justify-between w-full p-6">
            <div>
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="rounded-xl">
            </div>

            <div class="flex flex-col justify-between flex-1 mt-6">
                <header>
                    <div class="space-x-2">
                        <x-category-button :category="$post->category" />
                    </div>

                    <div class="mt-4">
                        <h1 class="text-3xl clamp one-line">
                            <a href="/posts/{{ $post->slug }}">
                                {{ $post->title }}
                            </a>
                        </h1>

                        <span class="block mt-2 text-xs text-gray-400">
                            Pubblicato <time>{{ $post->created_at->diffForHumans() }}</time>
                        </span>
                    </div>
                </header>

                <div class="mt-4 space-y-4 text-sm">
                    {!! $post->excerpt !!}
                </div>

                <footer class="py-2">
                    <div>
                        <a href="/posts/{{ $post->slug }}"
                           class="px-8 py-2 text-xs font-semibold transition-colors duration-300 bg-gray-200 rounded-full hover:bg-gray-300">Scopri di più</a>
                    </div>
                </footer>
            </div>
        </div>
    </div>
@endforeach
