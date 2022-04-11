<x-layout>
    <main class="max-w-full mx-auto mt-10 space-y-6 lg:mt-20">
        <article class="max-w-6xl mx-auto lg:grid lg:grid-cols-12 gap-x-6">
            <div class="col-span-3 mb-10 lg:text-center lg:pt-14">
                <img src="{{ asset('storage/thumbnails/' . $post->thumbnail) }}" alt="" class="object-scale-down w-full h-40 rounded-xl">

                <p class="block mt-4 text-xs text-gray-400">
                    Pubblicato
                    <time>{{ $post->created_at->diffForHumans() }}</time>
                </p>
            </div>

            <div class="col-span-9">
                <div class="justify-between hidden mb-6 lg:flex">
                    <a href="{{ $backUrl }}"
                       class="relative inline-flex items-center text-lg transition-colors duration-300 hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>
                        Torna indietro
                    </a>

                    <div class="space-x-2">
                        <x-category-button :category="$post->category" />
                    </div>
                </div>


                <div class="flex p-1 space-x-2">
                    <h1 class="text-3xl font-bold lg:text-4xl">
                        {{ $post->title }}
                    </h1>
                    <span class="text-sm font-semibold text-gray-500 uppercase">{{ $post->prices }}</span>
                </div>
                @admin()
                <div class="flex w-32 px-4 py-2 mt-4 mr-3 space-x-2 text-xs font-bold text-white uppercase transition-all duration-200 bg-blue-500 rounded-md hover:bg-blue-400">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    <a href="/admin/posts/{{ $post->id }}/edit" class="text-sm font-semibold uppercase">Modifica</a>
                </div>
                @endadmin
                <br>
                <hr>

                <div class="flex p-2 mt-3 mb-8 space-x-4 rounded-lg shadow-lg">
                    <div class="w-1/2">
                        <h1 class="px-1 text-green-500 bg-green-200 rounded-lg shadow-sm">Pro</h1>
                        <div class="p-3 mt-2 space-y-2">
                            @foreach (explode("\r\n", $post->pros) as $pro)
                                <div class="flex">
                                    <svg class="text-green-500 md:w-1/12 sm:w-2/12" width="50" height="50" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="mx-1 text-lg text-gray-500 md:w-11/12 sm:w-10/12">
                                        {{ $pro }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="w-1/2">
                        <h1 class="px-1 text-red-400 bg-red-200 rounded-lg shadow-sm">Contro</h1>
                        <div class="p-3 mt-2 space-y-2">
                            @foreach (explode("\r\n", $post->cons) as $con)
                                <div class="flex mt-2">
                                    <svg class="text-red-500 md:w-1/12 sm:w-2/12" width="50" height="50" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="mx-1 text-lg text-gray-500 md:w-11/12 sm:w-10/12">
                                        {{ $con }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                @foreach (explode("\r\n", $post->body) as $text)
                    <div class="m-2">
                        <div class="space-y-4 leading-loose lg:text-lg">{!! $text !!}</div>
                    </div>
                @endforeach
                <article class="py-3 mt-4 bg-white">
                    <livewire:post-votes :post="$post" :votesCount="$votesCount" />
                </article>
            </div>

            <section class="col-span-8 col-start-5 mt-10 space-y-6">
                @include('posts._add-comment-form')

                @foreach ($post->comments as $comment)
                    <x-post-comment :comment="$comment" />
                @endforeach
            </section>
        </article>
    </main>
</x-layout>
