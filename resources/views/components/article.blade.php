@foreach ($posts as $post)
    <div class="mt-16">
        <!-- Versione 1 -->
        {{-- <article class="py-6 mb-4 space-y-6 transition-colors duration-300 border border-black border-opacity-0 bg-gray-50 hover:bg-gray-100 hover:border-opacity-5 rounded-xl">
            <div class="w-full p-6 ">
                <div>
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="rounded-xl">
                </div>
                <div class="flex flex-col justify-between flex-1 mt-6">
                    <header class="space-x-4">
                        <div>
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
                    <div class="mt-4 ml-4 space-y-4 text-sm">
                        {!! $post->excerpt !!}
                    </div>
                    <footer class="py-6">
                        <div>
                            <a href="/posts/{{ $post->slug }}"
                               class="px-8 py-2 text-xs font-semibold transition-colors duration-300 bg-gray-200 rounded-full hover:bg-gray-300">Scopri di più</a>
                        </div>
                    </footer>
                </div>
            </div>
        </article> --}}
        <!-- Versione 2 -->
        <article class="py-6 mb-4 space-y-6 transition-colors duration-300 border border-black border-opacity-0 bg-gray-50 hover:bg-gray-100 hover:border-opacity-5 rounded-xl">
            <div class="flex flex-col justify-between w-full mx-2 md:mx-4">
                <div class="justify-between md:flex">
                    <h4 class="mt-2 text-xl font-semibold md:mt-0">
                        <a href="/posts/{{ $post->slug }}" class="hover:underline">{{ $post->title }}</a>
                    </h4>
                    <div class="mt-2 md:mr-5">
                        <x-category-button :category="$post->category" />
                    </div>
                </div>
                <div x-data="{ excerpt: false}" class="m-2">
                    <div
                         x-show="!excerpt"
                         x-cloak
                         class="p-1 mt-3 mr-1 text-gray-600 line-clamp-3" @click="excerpt = !excerpt">
                        {{ $post->excerpt }}
                    </div>
                    <div
                         x-if="!excerpt"
                         x-cloak
                         class="p-1 mt-3 text-gray-600"
                        >
                        {{ $post->excerpt }}
                    </div>
                </div>
                <div class="flex flex-col justify-between mt-6 md:flex-row md:items-center">
                    <div class="flex items-center space-x-0.5 text-xs font-semibold text-gray-400 md:space-x-1">
                        <div>{{ $post->created_at->diffForHumans() }}</div>
                        <div>&bull;</div>
                        <div class="font-semibold text-blue-400">piace a <span class="text-sm">{{ $post->votes->count() }}</span> persone</div>
                        <div>&bull;</div>
                        <div wire:ignore class="text-gray-900">{{ $post->comments->count() }} commenti</div>
                    </div>
                    <div class="mt-8 md:mt-0">
                        <a href="/posts/{{ $post->slug }}"
                           class="px-8 py-2 mr-5 text-xs font-semibold text-gray-400 transition-colors duration-300 bg-gray-200 rounded-full hover:bg-gray-300">Scopri di più</a>
                    </div>
                </div>
            </div>
        </article>
    </div>
@endforeach
