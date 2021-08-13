@props(['posts'])


<div class="space-x-6 lg:grid lg:grid-cols-2">
    <article>
        <x-post-featured-card />
    </article>
    <article>
        @foreach ($posts as $post)
            <x-post-card
                :post="$post"
                class="space-y-2"
            />
        @endforeach
    </article>
    </div>
