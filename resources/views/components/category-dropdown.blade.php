<x-dropdown>
    <x-slot name="trigger">
        <button class="flex w-full py-2 pl-3 text-sm font-semibold text-left pr-9 lg:w-48 lg:inline-flex">
            {{ isset($currentCategory) ? $currentCategory->name : 'Categorie' }}

            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"/>
        </button>
    </x-slot>

    <x-dropdown-item
        href="/?{{ http_build_query(request()->except('category', 'page')) }}"
        :active="request()->routeIs('home') && is_null(request()->getQueryString())"
    >
        Tutti
    </x-dropdown-item>

    @foreach ($categories as $category)
        <x-dropdown-item
            href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
            :active='request()->fullUrlIs("*?category={$category->slug}*")'
        >
            {{ $category->name }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>
