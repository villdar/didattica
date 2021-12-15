@props(['heading'])

<section class="py-8 mx-auto lg:ml-12">
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
                <li>
                    <a href="/admin/posts/tags" class="{{ request()->is('admin/posts/tags') ? 'text-blue-500' : '' }}">Tag</a>
                </li>
            </ul>
        </aside>

        <main class="flex-1 max-w-6xl">
            <x-panel>
                {{ $slot }}

                <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
                <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

                <script type="text/javascript">
                    $('.js-example-basic-single').select2({
                        placeholder: 'Seleziona i tag'
                    });
                </script>
            </x-panel>
        </main>
    </div>
</section>
