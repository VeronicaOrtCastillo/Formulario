@php
    $classes = "text-sm text-gray-500 hover:text-gray-900 font-bold uppercase"
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>