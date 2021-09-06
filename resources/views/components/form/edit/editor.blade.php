@props(['name'])

<x-form.field>
    <x-form.label name="{{ $name }}" />

    <textarea
        {{ $attributes->class(['border border-gray-200 p-2 w-10/12 rounded px-8']) }}
        {{-- class="w-10/12 p-2 px-8 border border-gray-200 rounded" --}}
        name="{{ $name }}"
        id="{{ $name }}"
        required
        {{ $attributes }}
    >{{ $slot ?? old($name) }}</textarea>

    <x-form.error name="{{ $name }}" />
</x-form.field>
