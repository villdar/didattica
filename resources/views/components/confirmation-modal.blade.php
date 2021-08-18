<div {{ $attributes }}
    x-data="{ show: @entangle($attributes->wire('model')) }"
    x-show="show"
    @keydown.escape.window="show = false"
    style="display: none"
>
    <div class="fixed inset-0 bg-gray-900 opacity-50" @click="show = false">
    </div>
        <div class="fixed inset-0 h-48 max-w-sm m-auto bg-gray-100 rounded-md shadow-md">
            <div class="flex flex-col justify-between h-full">
                <header class="p-6">
                    <h3 class="text-lg font-bold">
                        {{ $title }}
                    </h3>
                </header>
                <main class="px-6 mb-4">
                    {{ $body }}
                </main>
                <footer class="flex justify-end px-6 py-4 bg-gray-200 rounded-b-md">
                    {{ $footer }}
                </footer>
            </div>
        </div>
</div>
