<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-xl font-bold text-center">Accesso</h1>

                <form method="POST" action="/login" class="mt-10">
                    @csrf

                    <x-form.input name="email" type="email" required />
                    <x-form.input name="password" type="password" autocomplete="current-password" required />

                    <x-form.button>Accedi</x-form.button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
