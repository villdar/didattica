@props(['heading'])

<section class="max-w-4xl py-8 mx-auto">
    <h1 class="pb-2 mb-8 text-lg font-bold border-b">
        {{ $heading }}
    </h1>

    <div class="space-y-3 lg:flex">
        <aside class="flex-shrink-0 lg:w-48">
            <h4 class="mb-4 font-semibold">Link utili</h4>

            <ul>
                <li>
                    <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">Tutti gli strumenti</a>
                </li>

                <li>
                    <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">Aggiungi nuovo strumento</a>
                </li>
                <li>
                    <a href="/admin/posts/analytics" class="{{ request()->is('admin/posts/analytics') ? 'text-blue-500' : '' }}">Statistiche applicativo</a>
                </li>
            </ul>
        </aside>

        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
