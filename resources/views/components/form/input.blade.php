@aware(['error'])

@props(['value', 'name', 'for', 'title'])


<input
    {{ $attributes->class([
        'block p-2 text-xs font-bold uppercase tracking-widest w-full focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input rounded-md border border-gray-300 dark:text-white dark:border-gray-600',
        'border-red-500' => $error,
    ]) }}
    @isset($name) name="{{ $name }}" @endif
        type="text"
        @isset($value) value="{{ $value }}" @endif
    {{ $attributes }} />
