<x-layout>
    <main class="max-w-6xl mx-auto mt-10 space-y-6 lg:mt-20">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 mb-10 lg:text-center lg:pt-14">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl">

                <p class="block mt-4 text-xs text-gray-400">
                    Pubblicato
                    <time>{{ $post->created_at->diffForHumans() }}</time>
                </p>
            </div>

            <div class="col-span-8">
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

                <h1 class="mb-10 text-3xl font-bold lg:text-4xl">
                    {{ $post->title }}
                </h1>

                <div class="flex p-2 m-3 mb-8 space-x-4 text-center rounded-lg shadow-lg">
                    <div class="left-0 w-1/2 space-y-4 ">
                        <h1 class="text-green-500 bg-green-200 rounded-lg shadow-sm">Pro</h1>
                        <div class="flex">
                            <svg class="w-6 h-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="pl-2 text-sm text-gray-500">
                                {!! $post->pros !!}
                            </span>
                        </div>
                    </div>
                    <div class="right-0 w-1/2 space-y-4 ">
                        <h1 class="text-red-400 bg-red-200 rounded-lg shadow-sm">Contro</h1>
                        <div class="flex">
                            <svg class="w-6 h-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="pl-2 text-sm text-gray-500">
                                {!! $post->cons !!}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="space-y-4 leading-loose lg:text-lg">{!! $post->body !!}</div>
                <article class="py-3 mt-4 bg-white">
                    <livewire:post-votes :post="$post" :votesCount="$votesCount"/>
                </article>
            </div>

            <section class="col-span-8 col-start-5 mt-10 space-y-6">
                @include ('posts._add-comment-form')

                @foreach ($post->comments as $comment)
                    <x-post-comment :comment="$comment" />
                @endforeach
            </section>
        </article>
    </main>
</x-layout>
