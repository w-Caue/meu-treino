<div>
    <div class="relative">
        <a href="{{ route('treino.list') }}"
            class="sticky top-0 bg-gray-200 border-b border-gray-300 p-4 flex items-center gap-5">
            <i data-lucide="chevron-left" class="size-6 rounded-full hover:bg-gray-300 hover:cursor-pointer"></i>

            <h1 class="font-bold text-lg text-gray-600">Rotina - {{ $routine->name }}</h1>
        </a>
    </div>

    <div class="p-5">
        @forelse ($exercisesRoutines as $exercise)
        @empty
            <div class="flex flex-col items-center gap-3">
                <i data-lucide="dumbbell" class="size-22 text-blue-300"></i>
                <h1 class="font-bold">Comece adicionando um exercício a sua rotina</h1>

            </div>
        @endforelse

        <div class="flex justify-center mt-3">
            <x-form.button-color value="Adicionar Exercício" i="plus"
                class="font-bold bg-blue-200 border border-blue-200"
                x-on:click="$dispatch('open-modal-main', { name : 'exercises' })" />
        </div>
    </div>

    <x-modal.modal-main name="exercises" title="Adicionar" subtitle="Exercício">
        @slot('body')

            @slot('button')
                {{-- <x-form.button wire:click="createRoutine()" value="Salvar" i="clipboard-check" /> --}}
            @endslot

            <div class="">

            </div>

            <div class="h-[37rem] overflow-y-auto">
                @foreach ($exercises as $exercise)
                    <div class="mt-3">
                        <div wire:key="{{ $exercise->id }}" {{-- onclick="window.location.href='{{ route('tenant.produtos.produtos.register', ['prefix' => session()->get('prefix'), 'codSeq' => $produto->COD_SEQ]) }}'" --}}
                            class="p-2 space-y-0 rounded-xl border border-gray-300 hover:cursor-pointer dark:text-gray-400 dark:border-gray-700">
                            <div class="flex items-end gap-3 w-full text-xs font-bold uppercase">
                                <h1 class="">{{ $exercise->name }}</h1>
                                <span class="">({{ $exercise->equipment }})</span>
                            </div>
                            <h1 class="text-xs font-bold uppercase text-gray-500">{{ $exercise->muscle }}</h1>
                        </div>
                    </div>
                @endforeach
            </div>

        @endslot
    </x-modal.modal-main>
</div>
