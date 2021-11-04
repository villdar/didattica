@props(['posts'])
{{-- {{ $attributes->merge(['class' => --}}

<article class="mb-24">
    <div id="chord_id">
        <x-article :posts='$posts'></x-article>
    </div>
</article>
