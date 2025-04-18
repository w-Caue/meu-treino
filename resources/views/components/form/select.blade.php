@aware(['error'])

@props(['value', 'name', 'for'])

<select
    {{ $attributes->class([
        'block p-2 text-xs uppercase tracking-widest w-full focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input rounded-md border border-gray-300 dark:text-white dark:bg-gray-900 dark:border-gray-600',
        'border-red-500' => $error,
    ]) }}
    @isset($name) name="{{ $name }}" @endif
    @isset($value) value="{{ $value }}" @endif
    {{ $attributes }}>
    {{ $slot }}
</select>
