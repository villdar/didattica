<div wire:model="comments">
    @if (empty($comments))
        Ancora nessun commento
    @else
        @foreach ($comments as $comment)
            <div class="p-5 border-l-2 border-blue-300 border-dotted">
                <a class="p-2 text-lg hover:text-blue-400" href="/posts/{{ $comment->post->slug }}">{{ $comment->post->title }}</a>
                <x-panel class="w-full mt-6 bg-gray-50">
                    <article class="flex space-x-4">
                        <div class="flex-shrink-0">
                            <img src="{{ $comment->author->getAvatar() }}" alt="{{ $comment->author->name }}" width="60" height="60" class="rounded-xl">
                        </div>
                        <div>
                            <header class="mb-4">
                                <h3 class="font-bold"><a href="/profile/{{ $comment->author->username }}">{{ $comment->author->username }}</a></h3>
                                <p class="text-xs">
                                    Postato
                                    <time>{{ $comment->created_at->diffForHumans() }}</time>
                                </p>
                            </header>
                            <p class="leading-tight break-all line-clamp-2">
                                {{ $comment->body }}
                            </p>
                        </div>
                    </article>
                </x-panel>
            </div>
        @endforeach
    @endif
</div>
