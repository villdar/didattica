@props(['category'])

<a href="/?category={{ $category->slug }}"
   class="px-8 py-1 text-xs font-semibold uppercase border-2 border-solid rounded-full"
   style="font-size: 10px; border-color: {{ $category->style }}; color: {{ $category->style }};"
>{{ $category->name }}</a>
