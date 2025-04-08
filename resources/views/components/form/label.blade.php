@aware(['error'])

@props(['for', 'value'])

<span for="{{ $for ?? '' }}"
    {{ $attributes->merge([
        'class' => 'text-gray-600 font-semibold dark:text-gray-400',
        'text-red-500' => $error, //condição, caso true, mostra text-red-500
    ]) }}>{{ $value }}
</span>
