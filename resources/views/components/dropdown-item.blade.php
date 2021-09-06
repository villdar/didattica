@props(['active' => false])

@php
    $classes = 'block text-left rounded-lg px-2 text-sm leading-6 hover:bg-blue-400 focus:bg-blue-500 hover:text-white focus:text-white';

    if ($active) $classes .= ' bg-blue-500 text-white';
@endphp

<a {{ $attributes(['class' => $classes]) }}
>{{ $slot }}</a>
