<x-dropdown>
    <x-slot name="trigger">
        <button class="flex w-full py-2 pl-3 text-sm font-semibold text-left pr-9 lg:w-48 lg:inline-flex">
            {{ isset($currentTag) ? $currentTag->name : 'Tags' }}

            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"/>
        </button>
    </x-slot>

    <x-dropdown-item
        href="/?{{ http_build_query(request()->except('tags', 'page')) }}"
        :active="request()->routeIs('home') && is_null(request()->getQueryString())"
    >
        Tutti
    </x-dropdown-item>

    @foreach ($tags as $tag)
        <x-dropdown-item
            href="/?tags={{ $tag->slug }}&{{ http_build_query(request()->except('tags', 'page')) }}"
            :active='request()->fullUrlIs("*?tags={$tag->slug}*")'
        >
            {{ $tag->name }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>
