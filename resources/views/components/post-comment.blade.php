@props(['comment'])

<x-panel class="bg-gray-50">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <img src="{{ $comment->author->getAvatar() }}" alt="" width="60" height="60" class="rounded-xl">
            <span class="ml-1 text-xs text-gray-600">Livello {{ 1 + floor($comment->author->comments->count() * 2 + $comment->author->votes->count() * 0.5) / 100 }}</span>
        </div>
        <div>
            <header class="mb-4">
                <h3 class="font-bold"><a href="/profile/{{ $comment->author->username }}">{{ $comment->author->username }}</a></h3>

                <p class="text-xs">
                    Postato
                    <time>{{ $comment->created_at->diffForHumans() }}</time>
                </p>
            </header>

            <p class="leading-tight break-all">
                {{ $comment->body }}
            </p>
        </div>
    </article>
</x-panel>
