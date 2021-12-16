@props(['tags'])
<div class="space-y-1" x-data="{ isOpen: false }">
    @foreach ($tags as $tag)
        @if ($loop->index < 3)
            <a href="/?tags={{ $tag->slug }}"
               class="px-2 py-1 text-xs font-semibold uppercase border-2 border-solid rounded-full"
               style="font-size: 8px; border-color: {{ $tag->category->style }}; color: {{ $tag->category->style }};">{{ $tag->name }}</a>
        @endif
        @if ($loop->index >= 3)

            <a
               x-cloak
               x-show="isOpen"
               @click.away="isOpen = false"
               @keydown.escape.window="isOpen = false"
               href="/?tags={{ $tag->slug }}"
               class="px-2 py-1 text-xs font-semibold uppercase border-2 border-solid rounded-full"
               style="font-size: 8px; border-color: {{ $tag->category->style }}; color: {{ $tag->category->style }};">{{ $tag->name }}</a>

        @endif
    @endforeach
        <button
                class="px-3 py-2 transition duration-150 ease-in bg-gray-100 border rounded-full hover:bg-gray-200 h-7"
                @click="isOpen = !isOpen">
            <svg fill="currentColor" width="24" height="6">
                <path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)">
            </svg>
        </button>
</div>
