@aware(['error'])

@props(['for', 'value'])

<button  {{ $attributes->class([
    'block p-2 text-xs uppercase focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input rounded-lg border border-gray-300 hover:cursor-pointer dark:text-white dark:border-gray-600',
    'border-red-500' => $error,
]) }}>{{ $value }}</button>