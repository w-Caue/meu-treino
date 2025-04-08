<div>
    <div class="relative">
        <a href="{{ route('dashboard') }}"
            class="sticky top-0 bg-gray-200 border-b border-gray-300 p-4 flex items-center gap-5">
            <i data-lucide="chevron-left" class="size-6 rounded-full hover:bg-gray-300 hover:cursor-pointer"></i>

            <h1 class="font-bold text-lg text-gray-600">Treinamentos</h1>
        </a>
    </div>

    <div class="p-5 grid lg:grid-cols-2 gap-2">
        <div class="w-full bg-white rounded-2xl p-2 dark:bg-gray-800">
            <h1 class=" uppercase font-bold tracking-widest text-orange-300 m-2 flex items-center gap-2">
                <i data-lucide="zap"></i>
                Inicio Rápido
            </h1>

            <div class="p-2">
                <x-form.button value="Treino Rápido" i="plus">
                </x-form.button>
            </div>
        </div>

        <div class="w-full bg-white rounded-2xl p-2 dark:bg-gray-800">
            <h1 class=" uppercase font-bold tracking-widest text-blue-300 m-2 flex items-center gap-2">
                <i data-lucide="clipboard-list"></i>
                Rotinas
            </h1>

            <div class="p-2">
                <x-form.button value="Criar Rotina" i="clipboard-plus"
                    x-on:click="$dispatch('open-modal-primary', { name : 'novoRotina' })">
                </x-form.button>
            </div>
        </div>

    </div>

    <div class="p-5">
        <div class="w-full bg-white rounded-2xl p-2 dark:bg-gray-800">
            <h1 class=" uppercase font-bold tracking-widest text-gray-600 m-2 flex items-center gap-2">
                <i data-lucide="clipboard"></i>
                Minhas Rotinas
            </h1>

            <div class="p-2 grid lg:grid-cols-3 gap-3">
                @foreach ($routines as $routine)
                    <div wire:key="{{ $routine->id }}" {{-- onclick="window.location.href='{{ route('tenant.produtos.produtos.register', ['prefix' => session()->get('prefix'), 'codSeq' => $produto->COD_SEQ]) }}'" --}}
                        class="p-2 space-y-0 rounded-xl border border-gray-300 dark:text-gray-400 dark:border-gray-700">
                        <div class="space-y-1 w-full font-bold uppercase tracking-widest">
                            <h1 class="text-md">{{ $routine->name }}</h1>

                            <x-form.link-color href="{{ route('treino.rotina', ['codigo' => $routine->id]) }}"
                                class="w-full bg-green-200 border border-green-200" value="Iniciar Rotina" i="">
                            </x-form.link-color>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <x-modal.modal-primary name="novoRotina" title="Nova" subtitle="Rotina">
        @slot('body')

            @slot('button')
                <x-form.button wire:click="createRoutine()" value="Salvar" i="clipboard-check" />
            @endslot

            <div class="mt-3">
                <div class="">
                    <x-form.label value="Título da rotina" />
                    <x-form.input wire:model="name" class="p-3" />

                    @error('name')
                        <span class="text-xs font-bold text-red-400 error uppercase">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        @endslot
    </x-modal.modal-primary>
</div>
