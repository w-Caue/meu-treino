<div>
    <div class="relative">
        <a href="{{ route('treino.list') }}"
            class="sticky top-0 bg-gray-200 border-b border-gray-300 p-4 flex items-center gap-5">
            <i data-lucide="chevron-left" class="size-6 rounded-full hover:bg-gray-300 hover:cursor-pointer"></i>

            <h1 class="font-bold text-lg text-gray-600">Rotina - {{ $routine->name }}</h1>
        </a>
    </div>

    <div class="p-5">
        <div class="grid lg:grid-cols-2">
            @forelse ($exercisesRoutines as $exercise)
                <div wire:key="{{ $exercise->id }}"
                    class="p-2 mt-3 space-y-0 rounded-lg border bg-white hover:cursor-pointer dark:text-gray-400 dark:border-gray-700">
                    <a href="{{ route('exercicio_detalhe') }}"
                        class="flex items-end gap-3 w-full text-xs font-bold uppercase">
                        <h1 class="">{{ $exercise->name }}</h1>
                        <span class="">({{ $exercise->equipment }})</span>
                    </a>

                    <div class="relative overflow-x-auto sm:rounded-lg mt-2">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs font-bold text-gray-500 uppercase">
                                <tr>
                                    <th scope="col" class="px-2 py-1">
                                        Série
                                    </th>
                                    <th scope="col" class="px-2 py-1">
                                        kg
                                    </th>
                                    <th scope="col" class="px-2 py-1">
                                        reps
                                    </th>
                                    <th scope="col" class="px-2 py-1">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($series as $serie)
                                    @if ($serie->routine_exercise_id == $exercise->id)
                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800">
                                            <td class="px-3 py-1 ">
                                                <h1>{{ $serie->series }}</h1>
                                            </td>
                                            <td class="px-3 py-1">
                                                <h1>{{ $serie->kg }}</h1>
                                            </td>
                                            <td class="px-3 py-1">
                                                <h1>{{ $serie->reps }}</h1>
                                            </td>
                                            <td class="px-3 py-1">

                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <x-form.button value="Adicionar Série" i="" wire:click="getSeries('{{ $exercise->id }}')" />
                </div>
            @empty
                <div class="flex flex-col items-center gap-3">
                    <i data-lucide="dumbbell" class="size-22 text-blue-300"></i>
                    <h1 class="font-bold text-center">Comece adicionando um exercício a sua rotina</h1>
                </div>
            @endforelse
        </div>

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

            <div class=" mb-5">
                <div class="relative w-full">
                    <input wire:model.live="search"
                        class="block p-3 pl-10 text-xs font-bold uppercase tracking-widest w-full focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input rounded-lg border border-gray-300 dark:text-white dark:border-gray-600"
                        placeholder="Procure pelo o exercício">

                    <button class="absolute top-0 left-0 m-2 text-sm text-gray-500 font-medium rounded transition-all">
                        <i data-lucide="search"></i>
                    </button>
                </div>
            </div>

            <div class="h-[30rem] overflow-y-auto">
                @forelse ($exercises as $exercise)
                    <div class="mt-3">
                        <div wire:key="{{ $exercise->id }}" wire:click="getExercise({{ $exercise->id }})"
                            class="p-2 space-y-0 rounded-lg border border-gray-300 hover:cursor-pointer dark:text-gray-400 dark:border-gray-700">
                            <div class="flex items-end gap-3 w-full text-xs font-bold uppercase">
                                <h1 class="">{{ $exercise->name }}</h1>
                                <span class="">({{ $exercise->equipment }})</span>
                            </div>
                            <h1 class="text-xs font-bold uppercase text-gray-500">{{ $exercise->muscle }}</h1>
                        </div>
                    </div>
                @empty
                    <div class="flex flex-col items-center justify-center gap-3 h-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="size-22 text-red-300"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-dumbbell-icon lucide-dumbbell">
                            <path d="M14.4 14.4 9.6 9.6" />
                            <path
                                d="M18.657 21.485a2 2 0 1 1-2.829-2.828l-1.767 1.768a2 2 0 1 1-2.829-2.829l6.364-6.364a2 2 0 1 1 2.829 2.829l-1.768 1.767a2 2 0 1 1 2.828 2.829z" />
                            <path d="m21.5 21.5-1.4-1.4" />
                            <path d="M3.9 3.9 2.5 2.5" />
                            <path
                                d="M6.404 12.768a2 2 0 1 1-2.829-2.829l1.768-1.767a2 2 0 1 1-2.828-2.829l2.828-2.828a2 2 0 1 1 2.829 2.828l1.767-1.768a2 2 0 1 1 2.829 2.829z" />
                        </svg>

                        <h1 class="font-bold text-center uppercase text-sm text-red-400">Exercício não encontrado</h1>
                    </div>
                @endforelse
            </div>

        @endslot
    </x-modal.modal-main>
</div>
