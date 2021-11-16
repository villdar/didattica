@props(['name'])

<x-form.field>
    <x-form.label name="{{ $name }}" />

    <input class="w-full p-2 px-4 border border-gray-200 rounded"
           name="{{ $name }}"
           id="{{ $name }}"
           {{ $attributes(['value' => old($name)]) }}>

    <x-form.error name="{{ $name }}" />
</x-form.field>
