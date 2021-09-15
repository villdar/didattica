<x-layout>
    @include ('posts._header')

    <main class="max-w-6xl mx-auto mt-6 space-y-6 lg:mt-20">
        <div>
                <x-posts-grid :posts="$posts" />
        </div>
    </main>
</x-layout>
