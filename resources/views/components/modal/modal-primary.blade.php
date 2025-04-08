<div class="flex justify-center">
    <div x-data="{ primary: false, name: '{{ $name }}' }" x-show="primary" x-cloak
        x-on:open-modal-primary.window="primary = ($event.detail.name === name)"
        x-on:close-modal-primary.window="primary = false" x-on:keydown.escape.window="primary = false"
        x-on:escape.window="primary = false" x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex items-end sm:items-center sm:justify-center">
        <div x-on:click="primary = false" class="fixed">
        </div>
        <div
            class="w-full px-4 py-4 overflow-hidden bg-white rounded-t-lg border border-gray-300 sm:rounded-2xl sm:m-4 sm:max-w-xl">
            <div class="flex justify-between items-center py-1">
                <div class="flex items-center gap-7">
                    <button
                        class="inline-flex items-center justify-center text-gray-600 rounded-lg hover:cursor-pointer hover:bg-gray-200 dark:text-white dark:bg-gray-700"
                        aria-label="close" x-on:click="primary = false">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                            <path
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </button>

                    <h1 class="text-lg font-bold uppercase text-blue-400">{{ $title }}
                        {{ $subtitle }}</h1>
                </div>

                {{ $button }}

            </div>
            {{ $body }}
        </div>
    </div>
</div>
