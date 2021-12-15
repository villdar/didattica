<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-4xl">
        <span class="text-blue-500">didattic@</span>
    </h1>

    <div class="mt-4 space-y-2 lg:space-y-0 lg:space-x-4 w-max">
        <div class="relative bg-gray-100 lg:inline-flex rounded-xl">
            <x-category-dropdown />
        </div>
        <div class="relative bg-gray-100 lg:inline-flex rounded-xl">
            <x-tag-dropdown />
        </div>

        <!-- Search -->
        <div class="relative flex items-center px-3 py-2 bg-gray-100 lg:inline-flex rounded-xl">
            <form method="GET" action="/">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                <input type="text"
                       name="search"
                       placeholder="Cerca qualcosa"
                       class="text-sm font-semibold placeholder-black bg-transparent"
                       value="{{ request('search') }}"
                >
            </form>
        </div>
    </div>
</header>
