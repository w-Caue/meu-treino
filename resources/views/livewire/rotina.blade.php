<div>
    <div class="relative">
        <a href="{{ route('treino.list') }}"
            class="sticky top-0 bg-gray-200 border-b border-gray-300 p-4 flex items-center gap-5">
            <i data-lucide="chevron-left" class="size-6 rounded-full hover:bg-gray-300 hover:cursor-pointer"></i>

            <h1 class="font-bold text-lg text-gray-600">Rotina - {{ $routine->name }}</h1>
        </a>
    </div>

    <div class="p-5">
        <div class="flex flex-col items-center gap-3">
            <i data-lucide="dumbbell" class="size-22 text-blue-300"></i>
            <h1 class="font-bold">Comece adicionando um exercício a sua rotina</h1>

            <x-form.button-color value="Adicionar Exercício" i="plus" class="font-bold bg-blue-200 border border-blue-200"/>
        </div>
    </div>
</div>
