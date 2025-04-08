@aware(['error'])

@props(['for', 'value', 'i'])

<button
    {{ $attributes->class([
        'block p-2 text-xs uppercase flex items-center justify-center gap-1 focus:border-blue-400 focus:text-blue-400 focus:outline-none focus:shadow-outline-blue form-input rounded-lg hover:cursor-pointer transition-all hover:scale-95 dark:text-white dark:border-gray-600',
        'border-red-500' => $error,
    ]) }}>
    <i data-lucide="{{ $i }}"></i>
    {{ $value }}
</button>
