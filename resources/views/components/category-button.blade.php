@props(['category'])

<a href="/?category={{ $category->slug }}"
   class="px-8 py-1 text-xs font-semibold text-white uppercase border border-gray-400 rounded-full"
   style="font-size: 10px; background-color: {{ $category->style }};"
>{{ $category->name }}</a>
