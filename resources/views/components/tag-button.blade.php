@props(['tags'])

@foreach ($tags as $tag)
    <a href="/?tags={{ $tag->slug }}"
    class="px-2 py-1 text-xs font-semibold uppercase border-2 border-solid rounded-full"
    style="font-size: 8px; border-color: {{ $tag->category->style }}; color: {{ $tag->category->style }};"
    >{{ $tag->name }}</a>
@endforeach
