@props(['name'])

<x-form.field>
    <x-form.label name="{{ $name }}" />
    <textarea
    rows="8"
    {{ $attributes->class(['border border-gray-200 p-2 w-full rounded px-8']) }}
    name="{{ $name }}"
    {{ $attributes }}>{{ $slot ?? old($name) }}</textarea>
    <x-form.error name="{{ $name }}" />
</x-form.field>
