@props(['posts'])
{{-- {{ $attributes->merge(['class' => --}}

<article
         class="mb-4 space-y-2 transition-colors duration-300 border border-black border-opacity-0 hover:bg-gray-100 hover:border-opacity-5 rounded-xl">
    <div id="chord_id">
        <x-article :posts='$posts'></x-article>
    </div>
</article>
